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

        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'clock_in' => $this->clock_in,
            'clock_out' => $this->clock_out,
            'location_in' => $this->location_in,
            'location_out' => $this->location_out,
            'reason_in' => $this->reason_in,
            'reason_out' => $this->reason_out,
            'date_in' => $this->date_in,
            'date_out' => $this->date_out,
            'status' => $this->status,
            'created_at' => Carbon::parse($this->created_at)->format('d M Y'),
            'updated_at' => Carbon::parse($this->updated_at)->format('d M Y'),
            'user' => $user
        ];
    }
}
