<?php

namespace App\Services;

use App\Actions\Song\ListSongAction;
use App\Actions\Song\StoreSongAction;
use App\DTOs\SongDTO;
use App\Models\Song;
use Illuminate\Database\Eloquent\Collection;

class SongService
{
    public function __construct(
        protected ListSongAction $listSongAction,
        protected StoreSongAction $storeSongAction
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
     * @param SongDTO $data
     * @return \App\Models\Song
     */
    public function store(SongDTO $data): Song
    {
        return $this->storeSongAction->execute($data);
    }
}
