<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AnggotaBkm extends JsonResource
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
            "id" => $this->id,
            "foto" => $this->foto,
            "nama" => $this->nama,
            "alamat" => $this->alamat,
            "jabatan" => $this->jabatan,
            "whatsapp" => $this->whatsapp,
            "facebook" => $this->facebook,
            "instagram" => $this->instagram,
        ];
    }
}
