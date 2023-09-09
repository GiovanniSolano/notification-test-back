<?php

use App\Models\Category;
use Database\Seeders\CategorySeeder;

beforeEach(function () {
    $this->artisan('migrate:fresh');
    $this->seed(CategorySeeder::class);
});

describe('CategoryController Testing', function() {

    it('Categories were created by seeder', function() {

        $categories = Category::count();

        expect($categories)->toBe(3);

    });

    it('Get Categories', function() {

        $this->getJson('/api/v1/categories')->assertOk();

    });

    it('Get Categories Paginated', function() {

        $this->getJson('/api/v1/categories')
        ->assertJsonStructure([
            'data' => [
                '*' => ['id', 'name', 'created_at'],
            ],
            'links',
            'meta',
        ])
        ->assertJsonCount(3, 'data');

    });

});

