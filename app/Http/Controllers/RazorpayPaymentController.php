<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Razorpay\Api\Api;
use App\Models\service;
use App\Models\User;
use App\Models\category;
use App\Models\verifiedUser;
use Session;
use Exception;

class RazorpayPaymentController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index(Request $request)
    {
        $service_id = $request->ser_id;
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
