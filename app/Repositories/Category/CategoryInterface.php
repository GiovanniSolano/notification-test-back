<?php

namespace App\Repositories\Category;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface CategoryInterface {

    /**
     * Get all categories
     *
     * @return LengthAwarePaginator
     */
    public function getAll(): LengthAwarePaginator;

    /**
     * Get users by Category
     *
     * @return Collection | null
     */
    public function getUsersByCategory($categoryId): Collection | null;
}
