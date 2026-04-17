<?php

namespace App\Actions\Song;

use App\Repository\SongsManagerRepository;
use Illuminate\Database\Eloquent\Collection;

class ListAllSongAction
{
    public function __construct(
        protected SongsManagerRepository $songRepository
    ) {}

    /**
     * Execute to get all song collection
     * @return Collection<int, \App\Models\Song>
     */
    public function execute(): Collection
    {
        return $this->songRepository->getAll();
    }
}
