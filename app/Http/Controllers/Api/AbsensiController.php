<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\AbsensiResource;
use App\Absensi;
use DateTime;
use DB;
Use \Carbon\Carbon;

class AbsensiController extends Controller
{
    public function index(){
        $absensi = Absensi::get();

        return response()->json([
            'errcode' => '0000',
            'data' => AbsensiResource::collection($absensi)
        ]);
    }

    public function show($id)
    {        
        $absensi = Absensi::get()->where('user_id', $id);
        
        return response()->json([
            'errcode' => '0000',
            'data' => AbsensiResource::collection($absensi)
        ]);
    }


    public function clock_in(Request $request){
        
        $absensi_exist = Absensi::where('user_id', $request->user_id)->where('status','I')->first();
        
        // dd($absensi_exist);
        
        // return response()->json([
        //     'message' => $absensi_exist
        // ]);    
            
        // die();

        if(!$absensi_exist){
            $absensi = Absensi::create([
                'user_id' => $request->user_id,
                'clock_in' => $request->clock_in,
                'clock_out' => NULL,
                'location_in' => $request->location_in,
                'location_out' => NULL,
                'reason_in' => $request->reason_in,
                'reason_out' => NULL,
                'date_in' => Carbon::now(),
                'date_out' => NULL,
                'status' => 'I',
            ]);
    
            return response()->json([
                'errcode' => '0000',
                'message' => 'Clock in berhasil',
                'data' => new AbsensiResource($absensi)
            ]);
        }else{
            return response()->json([
                'errcode' => '0030',
                'message' => 'You Already Clock in!'
            ]); 
        }
    }

    // STATUS I = CLOCK IN
    // STATUS O = CLOCK OUT

    public function clock_out(Request $request){
        // MEMBACA STATUS COMPLETED/HISTORY ABSENSI YANG SEBELUMNYA
        $absensi_exist = Absensi::where('user_id', $request->user_id)->where('status','I')->first();

        // dd($absensi_exist);

        if($absensi_exist == NULL){
            return response()->json([
                'errcode' => '0030',
                'message' => 'You Already Clock Out!'
            ]); 
        }else{
            $absensi_exist->where('id', $absensi_exist->id)->update([
                'clock_out' => $request->clock_out,
                'location_out' => $request->location_out,
                'reason_out' => $request->reason_out,
                'date_out' => Carbon::now(),
                'status' => 'O',
            ]);
    
            return response()->json([
                'errcode' => '0000',
                'message' => 'Clock Out berhasil',
                'data' => new AbsensiResource($absensi_exist)
            ]);
        }

        

    }
}
