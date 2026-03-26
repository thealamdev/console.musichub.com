<?php

namespace App\Services;

use App\Actions\ListCategoryAction;
use Illuminate\Database\Eloquent\Collection;

class CategoryService
{
    public function __construct(
        protected ListCategoryAction $listAction
    ) {}

    /**
     * Execute the list action
     * @return Collection
     */
    public function getAll(): Collection
    {
        return $this->listAction->execute();
    }
}
