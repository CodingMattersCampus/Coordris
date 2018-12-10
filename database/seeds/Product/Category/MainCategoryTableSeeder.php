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
			['name' => "Canned Goods", 'top_level_category_id' => TopLevelCategory::getIdByName("Food")],
			['name' => "Medicines", 'top_level_category_id' => TopLevelCategory::getIdByName("Food")],
			['name' => "Rice", 'top_level_category_id' => TopLevelCategory::getIdByName("Food")],
			['name' => "Instant Packaged Goods", 'top_level_category_id' => TopLevelCategory::getIdByName("Food")],
            ['name' => "Personal Hygiene", 'top_level_category_id' => TopLevelCategory::getIdByName("Non-Food")],
            ['name' => "Medical Supplies", 'top_level_category_id' => TopLevelCategory::getIdByName("Non-Food")],
            ['name' => "Clothing", 'top_level_category_id' => TopLevelCategory::getIdByName("Non-Food")],
            ['name' => "Hand Tools", 'top_level_category_id' => TopLevelCategory::getIdByName("Non-Food")],
            ['name' => "Toddler", 'top_level_category_id' => TopLevelCategory::getIdByName("Male")],
            ['name' => "Toddler", 'top_level_category_id' => TopLevelCategory::getIdByName("Female")],
            ['name' => "Elderly", 'top_level_category_id' => TopLevelCategory::getIdByName("Male")],
            ['name' => "Elderly", 'top_level_category_id' => TopLevelCategory::getIdByName("Female")],
            ['name' => "Halal Food", 'top_level_category_id' => TopLevelCategory::getIdByName("Food")],
            ['name' => "Non-Halal Food", 'top_level_category_id' => TopLevelCategory::getIdByName("Food")],

            ['name' => "Food", 'top_level_category_id' => TopLevelCategory::getIdByName("Toddler")],
            ['name' => "Personal Hygiene", 'top_level_category_id' => TopLevelCategory::getIdByName("Toddler")],

            ['name' => "Young Teen", 'top_level_category_id' => TopLevelCategory::getIdByName("Female")],
            ['name' => "Teen", 'top_level_category_id' => TopLevelCategory::getIdByName("Female")],
            ['name' => "Young Adult", 'top_level_category_id' => TopLevelCategory::getIdByName("Female")],
            ['name' => "Middle-Aged Adult", 'top_level_category_id' => TopLevelCategory::getIdByName("Female")],

            ['name' => "Personal Hygiene", 'top_level_category_id' => TopLevelCategory::getIdByName("Elderly")],
            ['name' => "Food", 'top_level_category_id' => TopLevelCategory::getIdByName("Elderly")],
        ];
    }
}
