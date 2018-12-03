<?php

namespace TableSeeder\Product\Category;

use Illuminate\Database\Seeder;
use App\Models\Product\Category\TopLevelCategory;

class TopLevelCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->categories() as $category)
            if (! TopLevelCategory::whereName($category['name'])->first())
                TopLevelCategory::create($category);
    }

     private function categories() : array
    {
        return [
            ['name' => "Food"],
            ['name' => "Non-Food"],
        ];
    }
}
