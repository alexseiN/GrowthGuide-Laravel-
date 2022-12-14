<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Razorpay\Api\Api;
use App\Models\service;
use App\Models\User;
use App\Models\category;
use App\Models\verifiedUser;
use Illuminate\Support\Facades\{Validator, Mail};
use App\{Form, FormField, Allcustomer};
use Session;
use Exception;
use App\Mail\FormSubmitted;

class RazorpayPaymentController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index(Request $request)
    {

        // $validator = Validator::make($request->all(), [
        //     'form_id' => 'required|integer|exists:forms,id',
        //     'field_ids' => 'required|string',
        // ]);

        // abort_if($validator->fails(), 422, "Data error");

        // generating validation rules based on dynamic field config data
        $field_map_ids = explode(",", $request->input('field_ids'));

        $field_required_rules = collect($field_map_ids)->mapWithKeys(function($id){
            $field_options = FormField::findOrFail($id)->options;
            if($field_options->validation->required == 1) {
                $rules = ['required'];
                if(isset($field_options->type) && $field_options->type == "email") $rules[] = 'email';

                return [
                    'field_'. $id => implode("|", $rules)
                ];
            }
            else {
                return ['field_'. $id => 'nullable'];
            }
        });

        // validation based on dynamic data
        // $dynamic_validator = Validator::make($request->all(), $field_required_rules->toArray(), [
        //     'required' => "field can't be left blank",
        //     'email' => 'field must be a valid email address'
        // ]);

        // if ($dynamic_validator->fails()) {
        //     return redirect()->back()
        //                 ->withErrors($dynamic_validator)
        //                 ->withInput();
        // }

        // gather the form data as field_name => [ label, data ]
        $form_data = collect($field_map_ids)->mapWithKeys(function($id) use ($request){
            $field_options = FormField::findOrFail($id)->options;
            $field_name = 'field_'. $id;
            return [
                $field_options->label => $request[strtolower($field_options->label)]
            ];
        });
        $service_id = $request->ser_id;
        $customer = new Allcustomer;
        $customer->service_id = $service_id;
        $customer->info = $form_data;
        $customer->save();

        // Mail::to("kumawat.k@shim-bi.com")->send(new FormSubmitted($form_data));



        $service_price = service::where('id', $service_id)->pluck('price')[0];
        $service_name = service::where('id', $service_id)->pluck('service_name')[0];
        $services = service::all();
        $categories = category::all();
        $data = $request;
        Session::put('service_id', $service_id);
        return view('razorpayView', $data, ['categories'=>$categories,'services'=>$services, 'service_price'=>$service_price, 'service_name'=>$service_name]);
    }

    public function response(Request $request)
    {
        $email = Session::get('email');
        $service_id = Session::get('service_id');
        verifiedUser::updateOrCreate(['email' => $email], ['provider_id' => $service_id]);
        User::updateOrCreate(['email' => $email] ,['provider_id' => $service_id, 'password' => md5("123456") ,'name' => 'username']);
        return view('auth.login');
    }


    /**
     * Write code on Method
     *
     * @return response()
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

        $payment = $api->payment->fetch($input['razorpay_payment_id']);
        Session::put('email', $payment->email);

        if(count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount']));

            } catch (Exception $e) {
                return  $e->getMessage();
                Session::put('error',$e->getMessage());
                return redirect()->back();
            }
        }

        Session::put('success', 'Payment successful');
        return redirect()->back();
    }
}
