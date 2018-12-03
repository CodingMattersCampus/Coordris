<?php

namespace TableSeeder\Product\Category;

use Illuminate\Database\Seeder;
use App\Models\Product\Category\Subcategory;
use App\Models\Product\Category\MainCategory;

class SubcategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->categories() as $category)
            if (! Subcategory::whereName($category['name'])->first())
                Subcategory::create($category);
    }

     private function categories() : array
    {
        return [
            ['name' => "Mineral", 'main_category_id' => MainCategory::getIdByName("Water")],
            ['name' => "Distilled", 'main_category_id' => MainCategory::getIdByName("Water")],
            ['name' => "Purified", 'main_category_id' => MainCategory::getIdByName("Water")],
        ];
    }
}
