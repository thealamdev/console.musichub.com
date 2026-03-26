<?php

namespace App\Repository;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoryRepository
{
    /**
     * Get all categories
     * @return Collection
     */
    public function getAll(): Collection
    {
        return Category::latest()->get();
    }
}
