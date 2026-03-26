<?php

namespace App\Actions\Song;

use App\DTOs\SongDTO;
use App\Repository\SongRepository;

class StoreSongAction
{
    public function __construct(
        protected SongRepository $repo
    ) {}

    /**
     * Execute store StoreSongAction
     * @param SongDTO $data
     * @return \App\Models\Song
     */
    public function execute(SongDTO $data)
    {
        return $this->repo->store($data);
    }
}
