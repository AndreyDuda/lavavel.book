<?php

use Illuminate\Database\Seeder;
use App\Models\BlogCategory;

class BlogCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Factory(BlogCategory::class, 10)->create();
    }
}
