<?php

namespace App\Repositories\Category;

use App\Models\Category;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class CategoryRepository implements CategoryInterface {

    /**
     * Get all categories
     *
     * @return LengthAwarePaginator
     */
    public function getAll(): LengthAwarePaginator
    {
        return Category::latest()->paginate();
    }

     /**
     * Get users by category
     *
     * @return Collection
     */
    public function getUsersByCategory($categoryId): Collection | null
    {
        $category = Category::find($categoryId);
        $users = $category->users;

        return $users;
    }

    // .... additional methods

}
