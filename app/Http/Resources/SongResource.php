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
            'id'            => $this->id,
            'owner'         => $this->user->name,
            'title'         => $this->title,
            'lyrics'        => $this->lyrics,
            'genre'         => $this->genre,
            'slug'          => $this->slug,
            'explanation'   => $this->explanation,
            'writer'        => $this->writer,
            'category'      => $this->category(),
            'answer'        => $this->answer(),
        ];
    }

    /**
     * Get the category associated with the song.
     * @return array{id: mixed, name: mixed}
     */
    public function category()
    {
        return [
            'id' => $this->category->id,
            'name' => $this->category->name
        ];
    }

    /**
     * Get the answer song associated with this song.
     * @return array{id: mixed, lyrics: mixed|null} | null
     */
    public function answer()
    {
        if ($this->answer) {
            return [
                'id' => $this->answer->id,
                'lyrics' => $this->answer->lyrics
            ];
        }
        return null;
    }
}
