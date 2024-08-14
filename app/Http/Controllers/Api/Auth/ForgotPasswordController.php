<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Requests\Auth\ForgetPasswordRequest;
use App\Notifications\ResetPasswordVerificationNotification;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

/**
 * methods that handles the forgotten password
 * @param ForgetPasswordRequest $request
 * @return 'Response'
 *
 */

class ForgotPasswordController extends Controller
{
    //
    public function forgotPassword(ForgetPasswordRequest $request){
        // validate email
        $input = $request->only('email');
        $user =  User::where('email' , $input)->first();
        // sending email notification
        $user->notify(new ResetPasswordVerificationNotification());
        // return the success reponse
        $success['success'] = true;
        return response()->json($success , 200);
    }
}
