<?php

namespace App\DTOs\Song;

use App\Http\Requests\StoreSongRequest;

class StoreSongData
{
    public function __construct(
        public string $lyrics = '',
        public string $genre = '',
        public string $category_id = '',
        public ?string $answer_id = null,
        public ?string $explanation = null,
        public ?string $writer = null,
    ) {}

    /**
     * Define the request DTO.
     * @param StoreSongRequest $request
     * @return StoreSongData
     */
    public static function make(StoreSongRequest $request): self
    {
        return new self(
            lyrics: $request->input('lyrics'),
            genre: $request->input('genre'),
            category_id: $request->input('category_id'),
            answer_id: $request->input('answer_id'),
            explanation: $request->input('explanation'),
            writer: $request->input('writer'),
        );
    }
}