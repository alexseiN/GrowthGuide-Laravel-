<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\{Form, DbFormField};
use App\Models\File;
use App\Models\Order;
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
            $value = "";
            if ($field_type === "file") {
                $fileModel = new File;
                $fileName = time().'.'.$request[$field_name]->extension();
                $filePath = $request[$field_name]->storeAs('uploads', $fileName, 'public');
                $fileModel->name = $fileName;
                $fileModel->file_path = "/storage/" . $filePath;
                $fileModel->save();
                $value = $fileName;
            }
            else {
                $value = $request[$field_name];
            }
            Order::updateOrCreate(['user_id' => $user->id, 'field_name' => $field_name, 'field_type'=>$field_type], ['field_value' => $value]);
            Customer::updateOrCreate(['user_id' => $user->id], ['status' => 1]);
        }
        $status = 1;
        return view('myorder', ['status' => $status]);
    }

    public function showMyOrder() {
        $user = Auth::user();
        $finduser = Customer::where('user_id', $user->id)->exists();
        $status = 0;
        if ($finduser) {
            $status = Customer::where('user_id', $user->id)->pluck('status')[0];
        }
        return view('myorder', ['status' => $status]);
    }

}
