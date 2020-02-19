<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\ReimburseResource;
use App\Reimburse;
use DateTime;
use DB;
Use \Carbon\Carbon;

class ReimburseController extends Controller
{
    public function index(){
        $reimburse = Reimburse::get();
        // $cuti = Cuti::paginate(2);

        // return CutiResource::collection($cuti);
        return response()->json([
            'errcode' => '0000',
            'data' => ReimburseResource::collection($reimburse)
        ]);

    }

    public function show($id)
    {
        $reimburse = Reimburse::get()->where('user_id', $id);

        return response()->json([
            'errcode' => '0000',
            'data' => ReimburseResource::collection($reimburse)
        ]);
    }

    public function show_reimburse()
    {
        $reimburse = Reimburse::get()->where('status', 'D');
        
        return response()->json([
            'errcode' => '0000',
            'data' => ReimburseResource::collection($reimburse)
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nominal' => 'required',
        ]);

        $reimburse = Reimburse::create([
            'user_id' => $request->user_id,
            'date' => $request->date,
            'nominal' => $request->nominal,
            'reason' => $request->reason,
            'status' => 'D',
        ]);

        /*
            ASSET STATUS
            D = DRAFT | A = APPROVED | C = CANCEL | R = REJECT
        */

        // return new CutiResource($cuti);
        return response()->json([
            'errcode' => '0000',
            'data' => new ReimburseResource($reimburse)
        ]);
    }

    public function cancel(Request $request, $id){
        $reimburse = Reimburse::find($id);

        $reimburse->where('id', $reimburse->id)->update([
            'status' => 'C'
        ]);

        return response()->json([
            'errcode' => '0000',
            'message' => 'Reimburse Cancelled by User',
            'data' => new ReimburseResource($reimburse)
        ]);
    }

    public function approve(Request $request){
        $reimburse = Reimburse::find($request->asset_id);

        $reimburse->where('id', $reimburse->id)->update([
            'status' => 'A',
            'approved_by' => $request->username,
            'approved_date' => Carbon::now(),
            'reject_by' => NULL,
            'reject_date' => NULL
        ]);

        return response()->json([
            'errcode' => '0000',
            'message' => 'Reimburse Approved by ' . $request->username,
            'data' => new ReimburseResource($reimburse)
        ]);
    }

    public function reject(Request $request){
        $reimburse = Reimburse::find($request->asset_id);

        $reimburse->where('id', $reimburse->id)->update([
            'status' => 'R',
            'approved_by' => NULL,
            'approved_date' => NULL,
            'reject_by' => $request->username,
            'reject_date' => Carbon::now()
        ]);

        return response()->json([
            'errcode' => '0000',
            'message' => 'Reimburse Rejected by ' . $request->username,
            'data' => new ReimburseResource($reimburse)
        ]);
    }
}
