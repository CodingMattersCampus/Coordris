<?php

namespace TableSeeder\Product\Category;

use Illuminate\Database\Seeder;
use App\Models\Product\Category\MainCategory;
use App\Models\Product\Category\TopLevelCategory;

class MainCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         foreach ($this->categories() as $category)
            if (! MainCategory::whereName($category['name'])->first())
                MainCategory::create($category);
    }

	private function categories() : array
    {
        return [
            ['name' => "Water", 'top_level_category_id' => TopLevelCategory::getIdByName("Food")],
            ['name' => "Blanket", 'top_level_category_id' => TopLevelCategory::getIdByName("Non-Food")],
        ];
    }
}
