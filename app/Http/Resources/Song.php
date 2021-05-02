<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Song extends JsonResource
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
            'name' => $this->name,
            'album' => $this->album->name,
            'singer' => $this->singer,
            'imageUrl' => config('global.url').$this->imageUrl,
            'songUrl' => config('global.url-music').$this->songUrl,
        ];
    }
}
