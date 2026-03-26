<?php

namespace App\Repository;

use App\DTOs\Song\StoreSongData;
use App\DTOs\Song\UpdateSongData;
use App\Models\Song;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;

class SongRepository
{
    /**
     * Get all song collection
     * @return Collection<int, Song>
     */
    public function getAll(): Collection
    {
        return Song::latest()->get();
    }

    /**
     * Store the Song functionality
     * @param StoreSongData $data
     * @return Song
     */
    public function store(StoreSongData $data)
    {
        return Song::create([
            'title'         => $data->title,
            'lyrics'        => $data->lyrics,
            'genre'         => $data->genre,
            'slug'          => Str::slug($data->title) . uniqid(),
            'description'   => $data->description,
            'category_id'   => $data->category_id,
            'artist'        => $data->artist,
            'writer'        => $data->writer,
            'composer'      => $data->composer,
            'album'         => $data->album,
            'duration'      => $data->duration,
            'release_date'  => $data->release_date,
            'language'      => $data->language,
            'is_published'  => $data->is_published,
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
            'title'         => $data->title,
            'lyrics'        => $data->lyrics,
            'genre'         => $data->genre,
            'description'   => $data->description,
            'category_id'   => $data->category_id,
            'artist'        => $data->artist,
            'writer'        => $data->writer,
            'composer'      => $data->composer,
            'album'         => $data->album,
            'duration'      => $data->duration,
            'release_date'  => $data->release_date,
            'language'      => $data->language,
            'is_published'  => $data->is_published,
        ]);
        return $song;
    }
}
