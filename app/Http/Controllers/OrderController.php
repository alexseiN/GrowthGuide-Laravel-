<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\{Form, DbFormField};
use App\Models\File;
use App\Models\Order;
use App\Models\OrderReponse;
use App\Models\Customer;

class OrderController extends Controller
{
    /**
     * show the admin
     */

    public function placeOrder(Request $request) {
        $service_id = $request->service_id;
        $form_id = Form::where('service_id', $service_id)->pluck('id')[0];
        $options = DbFormField::where('form_id', $form_id)->pluck('options');
        $user = Auth::user();
        foreach($options as $option) {
            $field_name = strtolower($option->label);
            $field_type = $option->type;
            $value = null;
            if ($field_type === "file" && is_null($request[$field_name]) == false) {
                $fileName = $field_name.'_'.time().'.'.$request[$field_name]->extension();
                $value = 'uploads/'.$fileName;
                $request[$field_name]->move(public_path('uploads'), $fileName);
            }
            else {
                $value = $request[$field_name];
            }
            Order::updateOrCreate(['user_id' => $user->id, 'field_name' => $field_name, 'field_type'=>$field_type], ['field_value' => $value]);
        }
        Order::updateOrCreate(['user_id' => $user->id, 'field_name' => 'reference', 'field_type'=>'file'], ['field_value' => null]);
        Order::updateOrCreate(['user_id' => $user->id, 'field_name' => 'message', 'field_type'=>'textarea'], ['field_value' => null]);
        $status = 1;
        $orders = Order::where('user_id', $user->id)->get();
        Customer::updateOrCreate(['user_id' => $user->id], ['status' => 1]);
        return view('myorder', ['status' => $status, 'orders' => $orders, 'admin' => false]);
    }

    public function showMyOrder() {
        $user = Auth::user();
        $finduser = Customer::where('user_id', $user->id)->exists();
        $status = 0;
        if ($finduser) {
            $status = Customer::where('user_id', $user->id)->pluck('status')[0];
            $orders = Order::where('user_id', $user->id)->get();
            if ($status === 1) {
                return view('myorder', ['status' => $status, 'orders' => $orders, 'admin' => false]);
            }
            else {
                return view('myorder', ['status' => $status, 'orders' => $orders, 'admin' => false]);
            }
        }
        else {
            return view('myorder', ['status' => $status, 'admin' => false]);
        }
    }

    public function getOrderResponses(Request $request) {
        $user_id = $request -> user_id;
        $orders = Order::where('user_id', $user_id)->get();
        $status = Customer::where('user_id', $user_id)->pluck('status')[0];
        return view('admin.showOrders', ['orders' => $orders, 'status' => $status, 'user_id' => $user_id, 'admin' => true]);
    }

    public function SendOrderResponses(Request $request) {
        $user_id = $request -> user_id;
        $orders = Order::where('user_id', $user_id)->get();
        $status = 1;
        $value = null;
        $field_name = "reference";

        if (is_null($request->reference) == false) {
            $fileName = $field_name.'_'.time().'.'.$request->reference->extension();
            $value = 'uploads/'.$fileName;
            $request[$field_name]->move(public_path('uploads'), $fileName);
            Order::updateOrCreate(['user_id' => $user_id, 'field_name' => 'reference', 'field_type' => 'file'], ['field_value' => $value]);
            $status = 2;
        }
        Order::updateOrCreate(['user_id' => $user_id, 'field_name' => 'message', 'field_type' => 'textarea'], ['field_value' => $request->message]);
        Customer::updateOrCreate(['user_id' => $user_id], ['status' => $status]);
        return view('admin.showOrders', ['orders' => $orders, 'status' => $status, 'user_id' => $user_id, 'admin' => true]);
    }


}
