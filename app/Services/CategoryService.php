<?php

namespace App\Services;

use App\Actions\ListCategoryAction;
use Illuminate\Database\Eloquent\Collection;

class CategoryService
{
    public function __construct(
        protected ListCategoryAction $list
    ) {}

    /**
     * Execute the list action
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->list->execute();
    }
}
