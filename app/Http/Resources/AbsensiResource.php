<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
Use \Carbon\Carbon;

class AbsensiResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        if(isset($this->user)){
            $user = new UserResource($this->user);
        }else{
            $user = '';
        }
        
        if($this->clock_out == NULL){
            $clock_out = '';
        }else{
            $clock_out = $this->clock_out;
        }

        if($this->location_out == NULL){
            $location_out = '';
        }else{
            $location_out = $this->location_out;
        }

        if($this->reason_in == NULL){
            $reason_in = '';
        }else{
            $reason_in = $this->reason_in;
        }
        
        if($this->reason_out == NULL){
            $reason_out = '';
        }else{
            $reason_out = $this->reason_out;
        }

        if($this->date_out == NULL){
            $date_out = '';
        }else{
            $date_out = $this->date_out;
        }

        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'clock_in' => $this->clock_in,
            'clock_out' => $clock_out,
            'location_in' => $this->location_in,
            'location_out' => $location_out,
            'reason_in' => $reason_in,
            'reason_out' => $reason_out,
            'date_in' => $this->date_in,
            'date_out' => $date_out,
            'status' => $this->status,
            'created_at' => Carbon::parse($this->created_at)->format('d M Y'),
            'updated_at' => Carbon::parse($this->updated_at)->format('d M Y'),
            'user' => $user
        ];
    }
}
