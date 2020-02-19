<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
Use \Carbon\Carbon;

class SalaryResource extends JsonResource
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
            'tanggal' => $this->date,
            'nominal' => $this->nominal,
            'status' => $this->status,
            'created_at' => Carbon::parse($this->created_at)->format('d M Y'),
            'updated_at' => Carbon::parse($this->updated_at)->format('d M Y'),
            'user' => $user,
        ];
    }
}
