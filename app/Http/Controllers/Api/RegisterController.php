<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Str;
use App\Http\Resources\UserResource;
use DB;

class RegisterController extends Controller
{
    public function action(Request $request){

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
        ]);

        $roles = 'User';

        if($request->posisi == 'HRD' || $request->posisi == 'GA'){
            $roles = 'Admin';
        }else{
            $roles = 'User';
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'api_token' => Str::random(80),
            'nik' => rand(1,99999),
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
            'posisi' => $request->posisi,
            'divisi' => $request->divisi,
            'role' => $roles,
            'status' => 'A'
        ]);

        DB::table('jatahcuti')->insert([
            'user_id' => $user->id,
            'jatahcuti' => 12
        ]);

        DB::table('salaries')->insert([
            'user_id' => $user->id,
            'tanggal' => '25 Jan 2020',
            'nominal' => '3500000',
            'status' => 'A'
        ]);

        // return new UserResource($user);

        return (new UserResource($user))->additional([
            'message' => 'register completed',
            'errcode' => '0000'
        ]);
    }
}
