<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;


class LoginController extends Controller
{
    public function action(Request $request){

        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        // dd($request);

        if(auth()->attempt($request->only('email','password'))){
            $currentuser = auth()->user();

            // return new UserResource($currentuser);

            return response()->json([
                'errcode' => '0000',
                'data' => new UserResource($currentuser)
            ]);
        }

        return response()->json([
            'errcode' => '0001'
        ]);
    }
}
