<?php

namespace App\Actions\Category;

use App\DTOs\Category\UpdateCategoryData;
use App\Models\Category;
use App\Repository\CategoryRepository;

class UpdateCategoryAction
{
    public function __construct(
        protected CategoryRepository $repo
    ) {}

    /**
     * Execute the UpdateCategoryAction
     * @param UpdateCategoryData $data
     * @return Category
     */
    public function execute(UpdateCategoryData $data, Category $category): Category
    {
        return $this->repo->update($data, $category);
    }
}
