<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BayarKurban extends JsonResource
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
            'nama' => $this->sohibulKurban->nama,
            'alamat' => $this->sohibulKurban->alamat,
            "bayar" => $this->bayar,
        ];
    }
}
