<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\TransportResource;
use App\Transport;
use DateTime;
use DB;
Use \Carbon\Carbon;

class TransportController extends Controller
{
    public function index(){
        $transport = Transport::get();
        // $cuti = Cuti::paginate(2);

        // return CutiResource::collection($cuti);
        return response()->json([
            'errcode' => '0000',
            'data' => TransportResource::collection($transport)
        ]);

    }

    public function show($id)
    {
        $transport = Transport::get()->where('user_id', $id);

        return response()->json([
            'errcode' => '0000',
            'data' => TransportResource::collection($transport)
        ]);
    }

    public function show_transport()
    {
        $transport = Transport::get()->where('status', 'D');
        
        return response()->json([
            'errcode' => '0000',
            'data' => TransportResource::collection($transport)
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'date' => 'required',
        ]);

        $transport = Transport::create([
            'user_id' => $request->user_id,
            'category' => $request->category,
            'date' => $request->date,
            'tujuan' => $request->tujuan,
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
            'data' => new TransportResource($transport)
        ]);
    }

    public function cancel(Request $request, $id){
        $transport = Transport::find($id);

        $transport->where('id', $transport->id)->update([
            'status' => 'C'
        ]);

        return response()->json([
            'errcode' => '0000',
            'message' => 'Transport Cancelled by User',
            'data' => new TransportResource($transport)
        ]);
    }

    public function approve(Request $request){
        $transport = Transport::find($request->asset_id);

        $transport->where('id', $transport->id)->update([
            'status' => 'A',
            'approved_by' => $request->username,
            'approved_date' => Carbon::now(),
            'reject_by' => NULL,
            'reject_date' => NULL
        ]);

        return response()->json([
            'errcode' => '0000',
            'message' => 'Transport Approved by ' . $request->username,
            'data' => new TransportResource($transport)
        ]);
    }

    public function reject(Request $request){
        $transport = Transport::find($request->asset_id);

        $transport->where('id', $transport->id)->update([
            'status' => 'R',
            'approved_by' => NULL,
            'approved_date' => NULL,
            'reject_by' => $request->username,
            'reject_date' => Carbon::now()
        ]);

        return response()->json([
            'errcode' => '0000',
            'message' => 'Transport Rejected by ' . $request->username,
            'data' => new TransportResource($transport)
        ]);
    }
}
