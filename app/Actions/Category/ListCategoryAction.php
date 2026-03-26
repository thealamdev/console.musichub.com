<?php

namespace App\Actions\Category;

use App\Repository\CategoryRepository;
use Illuminate\Database\Eloquent\Collection;

class ListCategoryAction
{
    /**
     * Contruct the CategoryRepository
     * @param CategoryRepository $repo
     */
    public function __construct(
        protected CategoryRepository $repo
    ) {}

    /**
     * Execute the list action through repo
     * @return Collection
     */
    public function execute(): Collection
    {
        return $this->repo->getAll();
    }
}
