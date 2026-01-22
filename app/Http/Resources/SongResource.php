<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SongResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'title' => $this->title,
            'lyrics' => $this->lyrics,
            'slug' => $this->slug,
            'description' => $this->description,
            'artist' => $this->artist,
            'writer' => $this->writer,
            'composer' => $this->composer,
            'category_id' => $this->category_id,
            'album' => $this->album,
            'duration' => $this->duration,
            'release_date' => $this->release_date,
            'language' => $this->language,
            'cover_image' => $this->cover_image,
        ];
    }
}
