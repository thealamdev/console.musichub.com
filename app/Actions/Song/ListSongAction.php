<?php

namespace App\Actions\Song;

use App\Repository\SongRepository;
use Illuminate\Database\Eloquent\Collection;

class ListSongAction
{
    public function __construct(
        protected SongRepository $songRepository
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
