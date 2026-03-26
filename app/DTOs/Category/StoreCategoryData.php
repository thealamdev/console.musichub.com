<?php

namespace App\DTOs\Category;

use App\Http\Requests\StoreCategoryRequest;

class StoreCategoryData
{
    public function __construct(
        public readonly string $name = '',
    ) {}

    /**
     * Define the request DTO.
     * @param StoreCategoryRequest $request
     * @return StoreCategoryData
     */
    public static function make(StoreCategoryRequest $request): self
    {
        return new self(
            name: $request->input('name')
        );
    }
}
