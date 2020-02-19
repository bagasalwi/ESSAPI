<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\CutiResource;
use App\Cuti;
use DateTime;
use DB;
Use \Carbon\Carbon;

class CutiController extends Controller
{
    public function index(){
        $cuti = Cuti::get();
        // $cuti = Cuti::paginate(2);

        // return CutiResource::collection($cuti);
        return response()->json([
            'errcode' => '0000',
            'data' => CutiResource::collection($cuti)
        ]);
    }

    public function show($id)
    {        
        $cuti = Cuti::get()->where('user_id', $id);
        
        return response()->json([
            'errcode' => '0000',
            'data' => CutiResource::collection($cuti)
        ]);
    }

    public function show_cuti()
    {
        $cuti = Cuti::get()->where('status', 'D');
        
        return response()->json([
            'errcode' => '0000',
            'data' => CutiResource::collection($cuti)
        ]);
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'tgl_awal' => 'required',
            'notes' => 'required',
        ]);

        $jatahcuti = array();
        $jatahcuti = DB::table('jatahcuti')->where('user_id', $request->user_id)->first();

        if($request->tgl_selesai == ''){
            $tgl_selesai = $request->tgl_awal;

            $tgl_awal = $request->tgl_awal;
            $tgl_selesai = $request->tgl_awal;
            $datetime1 = new DateTime($tgl_awal);
            $datetime2 = new DateTime($tgl_selesai);
            $interval = $datetime1->diff($datetime2);
            $days = $interval->format('%a');
            
            $counted = $days + 1;
        }else{
            $tgl_selesai = $request->tgl_selesai;
            
            $tgl_awal = $request->tgl_awal;
            $tgl_selesai = $request->tgl_selesai;
            $datetime1 = new DateTime($tgl_awal);
            $datetime2 = new DateTime($tgl_selesai);
            $interval = $datetime1->diff($datetime2);
            $days = $interval->format('%a');
            
            $counted = $days + 1;
        }

        // dd($counted);
        // die;

        if($counted > 12){
            return response()->json([
                'errcode' => '0022',
                'message' => 'leaves cannot more than 12 days'
            ]);
        }else{
            if($counted > $jatahcuti->jatahcuti){
                return response()->json([
                    'errcode' => '0022',
                    'message' => 'jatah cuti sudah habis'
                ]);
            }else{
                $hasilcuti = $jatahcuti->jatahcuti - $counted;
    
                DB::table('jatahcuti')->where('user_id', $request->user_id)->update([
                    'jatahcuti' => $hasilcuti,
                ]);
                
                $cuti = Cuti::create([
                    'user_id' => $request->user_id,
                    'tgl_awal' => $request->tgl_awal,
                    'tgl_selesai' => $tgl_selesai,
                    'notes' => $request->notes,
                    'status' => 'D',
                ]);
            
            }
        }

        /*
            CUTI STATUS
            D = DRAFT | A = APPROVED | C = CANCEL | R = REJECT
        */

        // return new CutiResource($cuti);
        return response()->json([
            'errcode' => '0000',
            'data' => new CutiResource($cuti)
        ]);
    }

    public function reset(Request $request){

        DB::table('jatahcuti')->update([
            'jatahcuti' => 12,
        ]);

        return response()->json([
            'errcode' => '0000',
            'message' => 'cuti reset berhasil!'
        ]);
    }

    public function update(Request $request, $id){
        // dd($id);
        $cuti = Cuti::find($id);

        $cuti->where('id', $cuti->id)->update([
            'status' => $request->status
        ]);

        return new CutiResource($cuti);
    }

    public function cancel(Request $request, $id){
        $cuti = Cuti::find($id);

        $cuti->where('id', $cuti->id)->update([
            'status' => 'C'
        ]);

        return response()->json([
            'errcode' => '0000',
            'message' => 'Cuti Cancelled by User',
            'data' => new CutiResource($cuti)
        ]);
    }

    public function approve(Request $request){
        $cuti = Cuti::find($request->cuti_id);

        $cuti->where('id', $cuti->id)->update([
            'status' => 'A',
            'approved_by' => $request->username,
            'approved_date' => Carbon::now(),
            'reject_by' => NULL,
            'reject_date' => NULL
        ]);

        return response()->json([
            'errcode' => '0000',
            'message' => 'Cuti Approved by ' . $request->username,
            'data' => new CutiResource($cuti)
        ]);
    }

    public function reject(Request $request){
        $cuti = Cuti::find($request->cuti_id);

        $cuti->where('id', $cuti->id)->update([
            'status' => 'R',
            'approved_by' => NULL,
            'approved_date' => NULL,
            'reject_by' => $request->username,
            'reject_date' => Carbon::now()
        ]);

        return response()->json([
            'errcode' => '0000',
            'message' => 'Cuti Rejected by ' . $request->username,
            'data' => new CutiResource($cuti)
        ]);
    }
}
