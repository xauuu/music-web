<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Favorite extends JsonResource
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
            'favorite_id' => $this->id,
            'id' => $this->song->id,
            'name' => $this->song->name,
            'album' => $this->song->album->name,
            'artist' => $this->song->artist,
            'views' => $this->song->views,
            'imageUrl' => config('global.url-image').$this->song->imageUrl,
            'songUrl' => config('global.url-song').$this->song->songUrl,
        ];
    }
}
