<?php

namespace App\Http\Controllers;

use App\Models\FormResponse;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Validator, DB, Mail};
use App\{Form, FormField, DbFormField, Field};
use App\Mail\FormSubmitted;
use App\Models\category;
use App\Models\service;
use App\Models\verifiedUser;
use App\Models\User;

class FormController extends Controller
{
    public function respond(Request $request) {
        $form_id = $request->form_id;
        $data = json_encode($request->except(['_token', 'form_id']));

        FormResponse::create([
            'form_id' => $form_id,
            'response' => $data
        ]);

        return redirect()->back()->with('message', 'Successfully Sent Data To Admins.');
    }

    public function allResponses() {
        $responses = FormResponse::all();
        return view('admin/allResponses', ['responses' => $responses]);
    }

    public function allCustomers() {
        $all_customers = Customer::all();
        $customers = [];
        foreach($all_customers as $customer) {
            $email = User::where('id', $customer->user_id)->pluck('email')[0];
            $service_id = verifiedUser::where('email', $email)->pluck('provider_id')[0];
            $service_name = service::where('id', $service_id)->pluck('service_name')[0];
            $status = $customer->status;
            $order = (object) ['user_id' => $customer->user_id, 'email' => $email, 'service' => $service_name, 'status' => $status];
            array_push($customers, $order);
        }
        return view('admin/allCustomers', ['customers' => $customers]);
    }
}
