<?php

namespace App\Actions\Song;

use App\DTOs\Song\StoreSongData;
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
    public function execute(StoreSongData $data)
    {
        return $this->repo->store($data);
    }
}
