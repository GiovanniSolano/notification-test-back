<?php

namespace Database\Seeders;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::insert([
            [ "name" => "Sports", "created_at" => Carbon::now(), "updated_at" => Carbon::now()  ],
            [ "name" => "Finance", "created_at" => Carbon::now(), "updated_at" => Carbon::now() ],
            [ "name" => "Movies", "created_at" => Carbon::now(), "updated_at" => Carbon::now() ]
        ]);
    }
}
