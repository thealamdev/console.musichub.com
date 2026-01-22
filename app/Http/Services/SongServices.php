<?php

namespace App\Http\Services;

use App\Models\Song;
use Exception;

class SongServices
{
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
