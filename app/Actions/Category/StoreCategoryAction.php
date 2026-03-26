<?php

namespace App\Actions\Category;

use App\DTOs\Category\StoreCategoryData;
use App\Models\Category;
use App\Repository\CategoryRepository;

class StoreCategoryAction
{
    public function __construct(
        protected CategoryRepository $repo
    ) {}

    /**
     * Execute the StoreCategoryAction
     * @param StoreCategoryData $data
     * @return Category
     */
    public function execute(StoreCategoryData $data): Category
    {
        return $this->repo->store($data);
    }
}
