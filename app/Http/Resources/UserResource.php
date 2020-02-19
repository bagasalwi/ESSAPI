<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'IDX_USER' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'nik' => $this->nik,
            'telepon' => $this->telepon,
            'alamat' => $this->alamat,
            'posisi' => $this->posisi,
            'divisi' => $this->divisi,
            'role' => $this->role,
            'status' => $this->status,
            'created_at' => $this->created_at,
            
        ];
    }
}
