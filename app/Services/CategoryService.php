<?php

namespace App\Services;

use App\Actions\Category\ListCategoryAction;
use App\Actions\Category\StoreCategoryAction;
use App\Actions\Category\UpdateCategoryAction;
use App\DTOs\Category\StoreCategoryData;
use App\DTOs\Category\UpdateCategoryData;
use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoryService
{
    public function __construct(
        protected ListCategoryAction $listAction,
        protected StoreCategoryAction $storeAction,
        protected UpdateCategoryAction $updateAction
    ) {}

    /**
     * Execute the list action
     * @return Collection
     */
    public function getAll(): Collection
    {
        return $this->listAction->execute();
    }

    /**
     * Execute StoreCategoryAction
     * @param StoreCategoryData $data
     * @return \App\Models\Category
     */
    public function store(StoreCategoryData $data): Category
    {
        return $this->storeAction->execute($data);
    }

    /**
     * Execute UpdateCategoryAction
     * @param UpdateCategoryData $data
     * @param Category $category
     * @return Category
     */
    public function update(UpdateCategoryData $data, Category $category): Category
    {
        return $this->updateAction->execute($data, $category);
    }
}
