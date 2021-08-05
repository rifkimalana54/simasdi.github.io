<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Galery extends JsonResource
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
            'gambar' => url('image/galery/' . $this->gambar),
            'text' => $this->text,
            'created_at' => strtotime($this->created_at)
        ];
    }
}
