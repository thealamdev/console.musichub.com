<?php

namespace App\Http\Services;

use App\Models\Song;

class SongServices
{
    /**
     * Store song data
     * @param array $data
     * @return void
     */
    public function storeSong(array $data): Song
    {
        $res = Song::create(attributes: $data);
        return $res;
    }
}
