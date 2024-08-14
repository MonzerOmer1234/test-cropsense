<?php

namespace App\Http\Controllers\Api\Auth;


use App\Http\Requests\Auth\ResetPasswordRequest;
use App\Models\User;
use Ichtrojan\Otp\Otp;
use Hash;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
/**
 * methods that handles the forgotten password
 * @param ResetPasswordRequest $request
 * @return  'Response'
 *
 */

class ResetPasswordController extends Controller
{
    //
    private $otp;
    public function __construct(){
        $this->otp = new Otp;
    }
    public function passwordReset(ResetPasswordRequest $request){
        // check otp
    $otp2 = $this->otp->validate($request->email , $request->otp);

    if(! $otp2->status){
     return response()->json(['error' => $otp2] , 401);
    }
    // check user credentials and update password
    $user = User::where('email' , $request->email)->first();
    $user->update(['password' => $request->password]);
    // return response
    $success['success'] = true;
    return response()->json($success , 200);
    }

}
