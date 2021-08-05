<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Agenda extends JsonResource
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
            "title" => $this->title,
            "deskripsi" => $this->deskripsi,
            "tgl_pelaksanaan" => $this->tgl_pelaksanaan->isoFormat('dddd, D MMMM Y'),
            "jam" => $this->jam,
            "tempat" => $this->tempat,
            "created_at" => $this->created_at->diffForHumans(),
        ];
    }
}
