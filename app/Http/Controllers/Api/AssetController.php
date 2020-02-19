<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\AssetResource;
use App\Asset;
use DateTime;
use DB;
Use \Carbon\Carbon;

class AssetController extends Controller
{
    public function index(){
        $asset = Asset::get();
        // $cuti = Cuti::paginate(2);

        // return CutiResource::collection($cuti);
        return response()->json([
            'errcode' => '0000',
            'data' => AssetResource::collection($asset)
        ]);

    }

    public function show($id)
    {
        $asset = Asset::get()->where('user_id', $id);

        return response()->json([
            'errcode' => '0000',
            'data' => AssetResource::collection($asset)
        ]);
    }

    public function show_asset()
    {
        $asset = Asset::get()->where('status', 'D');
        
        return response()->json([
            'errcode' => '0000',
            'data' => AssetResource::collection($asset)
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'category' => 'required',
            'type' => 'required',
        ]);

        $asset = Asset::create([
            'user_id' => $request->user_id,
            'category' => $request->category,
            'brand' => $request->brand,
            'type' => $request->type,
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
            'data' => new AssetResource($asset)
        ]);
    }  

    public function cancel(Request $request, $id){
        $asset = Asset::find($id);

        $asset->where('id', $asset->id)->update([
            'status' => 'C'
        ]);

        return response()->json([
            'errcode' => '0000',
            'message' => 'Asset Cancelled by User',
            'data' => new AssetResource($asset)
        ]);
    }

    public function approve(Request $request){
        $asset = Asset::find($request->asset_id);

        $asset->where('id', $asset->id)->update([
            'status' => 'A',
            'approved_by' => $request->username,
            'approved_date' => Carbon::now(),
            'reject_by' => NULL,
            'reject_date' => NULL
        ]);

        return response()->json([
            'errcode' => '0000',
            'message' => 'Asset Approved by ' . $request->username,
            'data' => new AssetResource($asset)
        ]);
    }

    public function reject(Request $request){
        $asset = Asset::find($request->asset_id);

        $asset->where('id', $asset->id)->update([
            'status' => 'R',
            'approved_by' => NULL,
            'approved_date' => NULL,
            'reject_by' => $request->username,
            'reject_date' => Carbon::now()
        ]);

        return response()->json([
            'errcode' => '0000',
            'message' => 'Asset Rejected by ' . $request->username,
            'data' => new AssetResource($asset)
        ]);
    }

    


}
