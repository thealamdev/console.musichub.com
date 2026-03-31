<?php

namespace App\Repository;

use App\DTOs\Category\StoreCategoryData;
use App\DTOs\Category\UpdateCategoryData;
use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;

class CategoryRepository
{
    /**
     * Get all categories
     * @return Collection
     */
    public function getAll(): Collection
    {
        return Category::query()->latest()->get();
    }

    /**
     * Store the Category functionality
     * @param StoreCategoryData $data
     * @return Category
     */
    public function store(StoreCategoryData $data): Category
    {
        return Category::create([
            'name'  => $data->name,
            'slug'  => Str::slug($data->name)
        ]);
    }

    /**
     * Upate the Cateogy functionality
     * @param UpdateCategoryData $data
     * @param Category $category
     * @return Category
     */
    public function update(UpdateCategoryData $data, Category $category): Category
    {
        $category->update([
            'name'  => $data->name,
            'slug'  => Str::slug($data->name)
        ]);
        
        return $category;
    }
}
