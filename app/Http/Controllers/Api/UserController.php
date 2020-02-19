<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\User;

class UserController extends Controller
{
    public function me(){
        $user = auth()->user();

        return new UserResource($user);
    }

    public function index(){
        $user = User::get();
        // $cuti = Cuti::paginate(2);

        // return UserResource::collection($user);
        return response()->json([
            'errcode' => '0000',
            'data' => UserResource::collection($user)
        ]);
    }
}
