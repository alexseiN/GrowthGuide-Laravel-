<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;
use App\Models\service;
use App\Models\category;
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
        return view('razorpayView', $data, ['categories'=>$categories,'services'=>$services, 'service_price'=>$service_price, 'service_name'=>$service_name]);
    }

    public function response()
    {
        $service_id = 1;
        $service_price = service::where('id', $service_id)->pluck('price')[0];
        $service_name = service::where('id', $service_id)->pluck('service_name')[0];
        $services = service::all();
        $categories = category::all();
        return view('razorpayView', ['categories'=>$categories,'services'=>$services, 'service_price'=>$service_price, 'service_name'=>$service_name]);
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
