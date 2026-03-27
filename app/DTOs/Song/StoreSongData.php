<?php

namespace App\DTOs\Song;

use App\Http\Requests\StoreSongRequest;

class StoreSongData
{
    public function __construct(
        public string $title = '',
        public string $lyrics = '',
        public string $genre = '',
        public string $category_id = '',
        public ?string $answer_id = null,
        public ?string $description = null,
        public ?string $explaination = null,
        public ?string $artist = null,
        public ?string $writer = null,
        public ?string $composer = null,
        public ?string $album = null,
        public ?string $duration = null,
        public ?string $release_date = null,
        public ?string $language = null,
        public bool $is_published = false,
    ) {}

    /**
     * Define the request DTO.
     * @param StoreSongRequest $request
     * @return StoreSongData
     */
    public static function make(StoreSongRequest $request): self
    {
        return new self(
            title: $request->input('title'),
            lyrics: $request->input('lyrics'),
            genre: $request->input('genre'),
            category_id: $request->input('category_id'),
            answer_id: $request->input('answer_id'),
            description: $request->input('description'),
            explaination: $request->input('explaination'),
            artist: $request->input('artist'),
            writer: $request->input('writer'),
            composer: $request->input('composer'),
            album: $request->input('album'),
            duration: $request->input('duration'),
            release_date: $request->input('release_date'),
            language: $request->input('language'),
            is_published: $request->boolean('is_published'),
        );
    }
}
