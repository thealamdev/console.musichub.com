<?php

namespace App\DTOs\Category;

use App\Http\Requests\UpdateCategoryRequest;

class UpdateCategoryData
{
    public function __construct(
        public readonly string $name = ''
    ) {}

    /**
     * Define the request DTO.
     * @param UpdateCategoryRequest $request
     * @return UpdateCategoryData
     */
    public static function make(UpdateCategoryRequest $request): self
    {
        return new self(
            name: $request->input('name')
        );
    }
}
