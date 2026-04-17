<?php

namespace App\Services;

use App\Actions\Song\ListAllSongAction;
use Illuminate\Database\Eloquent\Collection;

class SongsManageService
{
    public function __construct(
        protected ListAllSongAction $listSongAction,
    ) {}

    /**
     * Get all song list
     * @return Collection<int, \App\Models\Song>
     */
    public function getAll(): Collection
    {
        return $this->listSongAction->execute();
    }
}
