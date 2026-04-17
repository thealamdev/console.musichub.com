<?php

namespace App\Repository;

use App\Models\Song;
use Illuminate\Database\Eloquent\Collection;

class SongsManagerRepository
{
    /**
     * Get all song collection
     * @return Collection<int, Song>
     */
    public function getAll(): Collection
    {
        return Song::query()
            ->latest()
            ->with([
                'user:id,name,email',
                'category:id,name',
                'answer:id,lyrics'
            ])
            ->get();
    }
}
