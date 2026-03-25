<?php

namespace App\Actions;

use App\Repository\CategoryRepository;
use Illuminate\Database\Eloquent\Collection;

class ListCategoryAction
{
    public function __construct(
        protected CategoryRepository $repo
    ) {}

    /**
     * Execute the list action through repo
     * @return Collection
     */
    public function execute(): Collection
    {
        return $this->repo->all();
    }
}
