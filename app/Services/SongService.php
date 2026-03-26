<?php

namespace App\Services;

use App\Actions\Song\ListSongAction;
use App\Actions\Song\StoreSongAction;
use App\Actions\Song\UpdateSongAction;
use App\DTOs\Song\UpdateSongData;
use App\DTOs\Song\StoreSongData;
use App\Models\Song;
use Illuminate\Database\Eloquent\Collection;

class SongService
{
    public function __construct(
        protected ListSongAction $listSongAction,
        protected StoreSongAction $storeSongAction,
        protected UpdateSongAction $updateSongAction
    ) {}

    /**
     * Get all song list
     * @return Collection<int, \App\Models\Song>
     */
    public function getAll(): Collection
    {
        return $this->listSongAction->execute();
    }

    /**
     * Store song data
     * @param StoreSongData $data
     * @return \App\Models\Song
     */
    public function store(StoreSongData $data): Song
    {
        return $this->storeSongAction->execute($data);
    }

    /**
     * Update song data
     * @param UpdateSongData $data
     * @return \App\Models\Song
     */
    public function update(UpdateSongData $data, Song $song): Song
    {
        return $this->updateSongAction->execute($data, $song);
    }
}
