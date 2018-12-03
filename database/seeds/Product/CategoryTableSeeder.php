<?php

namespace TableSeeder\Product;

use Illuminate\Database\Seeder;
use TableSeeder\Product\Category\TopLevelCategoryTableSeeder;
use TableSeeder\Product\Category\MainCategoryTableSeeder;
use TableSeeder\Product\Category\SubcategoryTableSeeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TopLevelCategoryTableSeeder::class);
        $this->call(MainCategoryTableSeeder::class);
        $this->call(SubcategoryTableSeeder::class);
    }
}
