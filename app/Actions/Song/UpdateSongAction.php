<?php

namespace App\Actions\Song;

use App\DTOs\Song\UpdateSongData;
use App\Models\Song;
use App\Repository\SongRepository;

class UpdateSongAction
{
    public function __construct(
        protected SongRepository $repo
    ) {}

    /**
     * Execute UpdateSongAction
     * @param UpdateSongData $data
     * @param Song $song
     * @return Song
     */
    public function execute(UpdateSongData $data, Song $song): Song
    {
        return $this->repo->update($data, $song);
    }
}
