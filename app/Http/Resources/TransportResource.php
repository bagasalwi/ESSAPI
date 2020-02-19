<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
Use \Carbon\Carbon;

class TransportResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        if($this->approved_date == NULL){
            $approved_date = '';
        }else{
            $approved_date = Carbon::parse($this->approved_date)->format('d M Y');
        }
        if($this->reject_date == NULL){
            $reject_date = '';
        }else{
            $reject_date = Carbon::parse($this->reject_date)->format('d M Y');
        }

        if($this->approved_by == NULL){
            $approved_by = '';
        }else{
            $approved_by = $this->approved_by;
        }
        if($this->reject_by == NULL){
            $reject_by = '';
        }else{
            $reject_by = $this->reject_by;
        }

        if(isset($this->user)){
            $user = new UserResource($this->user);
        }else{
            $user = '';
        }

        if($this->reason == NULL){
            $reason = '';
        }else{
            $reason = $this->reason;
        }

        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'category' => $this->category,
            'date' => $this->date,
            'tujuan' => $this->tujuan,
            'reason' => $this->reason,
            'status' => $this->status,
            'approved_by' => $approved_by,
            'approved_date' => $approved_date,
            'reject_by' => $reject_by,
            'reject_date' => $reject_date,
            'created_at' => Carbon::parse($this->created_at)->format('d M Y'),
            'updated_at' => Carbon::parse($this->updated_at)->format('d M Y'),
            'user' => $user,
        ];
    }
}
