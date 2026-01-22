<?php

namespace App\Http\Services;

use App\Models\Song;
use Exception;
use Illuminate\Database\Eloquent\Collection;

class SongServices
{
    /**
     * Get all songs
     * @throws Exception
     * @return Collection<int, Song>
     */
    public function getSongs(): Collection
    {
        try {
            $res = Song::all();
        } catch (Exception $e) {
            throw new Exception(message: $message = $e->getMessage(), code: $e->getCode());
        }

        return $res;
    }
    /**
     * Store song data
     * @param array $data
     * @return void
     */
    public function storeSong(array $data): Song | null
    {
        try {
            $res = Song::create(attributes: $data);
        } catch (Exception $e) {
            throw new Exception(message: $message = $e->getMessage(), code: $e->getCode());
        }

        return $res;
    }
}
