<?php

namespace App\Actions\Song;

use App\DTOs\Song\StoreSongData;
use App\Models\Song;
use App\Repository\SongRepository;

class StoreSongAction
{
    public function __construct(
        protected SongRepository $repo
    ) {}

    /**
     * Execute store StoreSongAction
     * @param StoreSongData $data
     * @return \App\Models\Song
     */
    public function execute(StoreSongData $data): Song
    {
        return $this->repo->store($data);
    }
}
