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
    public function all(): Collection
    {
        return Category::latest()->get();
    }
}
