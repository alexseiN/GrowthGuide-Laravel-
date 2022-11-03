<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Http\Controllers\FormBuilder as ControllersFormBuilder;
use App\{Form, FormField, DbFormField, Field};
use App\Mail\FormSubmitted;
use App\Models\category;
use App\Models\service;
use App\Models\verifiedUser;
use Socialite;
use Illuminate\Support\Facades\Auth;
use Exception;
use App\User;

class GoogleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->stateless()->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {
        try {

            $user = Socialite::driver('google')->stateless()->user();

            $finduser = verifiedUser::where('email', $user->email)->exists();

            if($finduser){
                $currentUser = User::where('email', $user->email)->first();
                Auth::login($currentUser);
                return redirect('/show-dashboardform');
            }else{
                return redirect('/login');
            }

        } catch (Exception $e) {
            dd($e);
        }
    }
}
