<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\{Validator, DB, Mail};
use App\{Form, FormField, DbFormField, Field};
use App\Mail\FormSubmitted;
use App\Models\category;
use App\Models\service;
use App\Models\verifiedUser;

class FileController extends Controller
{
    public function filedownload(Request $request)
    {
        //PDF file is stored under project/public/download/info.pdf
        $file= env('APP_URL').$request->file_path;
        $extension = explode( '.', $request->file_path )[1];
        $file_name = $request->file_name.'.'.$extension;
        return response()->download($file, $file_name);
    }
}
