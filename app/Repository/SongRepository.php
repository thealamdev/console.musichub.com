<?php

namespace App\Repository;

use App\DTOs\Song\StoreSongData;
use App\DTOs\Song\UpdateSongData;
use App\Models\Song;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SongRepository
{
    /**
     * Get all song collection
     * @return Collection<int, Song>
     */
    public function getAll(): Collection
    {
        return Song::query()
            ->where('user_id', Auth::id())
            ->latest()
            ->with([
                'user:id,name,email',
                'category:id,name',
                'answer:id,lyrics'
            ])
            ->get();
    }

    /**
     * Store the Song functionality
     * @param StoreSongData $data
     * @return Song
     */
    public function store(StoreSongData $data): Song
    {
        return Song::create([
            'title'         => Str::words($data->lyrics, 10, ''),
            'slug'          => Str::slug(Str::words($data->lyrics, 10, '')) . uniqid(),
            'user_id'       => Auth::id(),
            'lyrics'        => $data->lyrics,
            'genre'         => $data->genre,
            'explanation'   => $data->explanation,
            'category_id'   => $data->category_id,
            'answer_id'     => $data->answer_id,
            'writer'        => $data->writer,
        ]);
    }

    /**
     * Update the Song functionality
     * @param UpdateSongData $data
     * @param Song $song
     * @return Song
     */
    public function update(UpdateSongData $data, Song $song)
    {
        $song->update([
            'title'         => Str::words($data->lyrics, 10, ''),
            'slug'          => $data->lyrics ? Str::slug(Str::words($data->lyrics, 10, '')) . uniqid() : $song->slug,
            'lyrics'        => $data->lyrics,
            'genre'         => $data->genre,
            'explanation'   => $data->explanation,
            'category_id'   => $data->category_id,
            'answer_id'     => $data->answer_id,
            'writer'        => $data->writer
        ]);
        return $song;
    }
}
