<?php

namespace App\Http\Controllers;

use App\Models\FormResponse;
use Illuminate\Http\Request;

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
}
