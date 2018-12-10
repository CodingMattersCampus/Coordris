<?php

use Illuminate\Database\Seeder;

class HouseholdSpecificItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Product\SpecificNeededItem::firstOrCreate([
            'hh_support_code' => "2dfeb085-06ae-426f-8abb-2a87d33de446",
            'top_level_category_id' => \App\Models\Product\Category\TopLevelCategory::getIdByName('Toddler'),
            'main_category_id' => \App\Models\Product\Category\MainCategory::getIdByName("Food"),
            'subcategory_id' => \App\Models\Product\Category\Subcategory::getIdByName("Milk"),
            'unit'  => 'pcs',
            'quantity'  => 5,
            'age_range_id' => 0-3,
        ]);

        \App\Models\Product\SpecificNeededItem::firstOrCreate([
            'hh_support_code' => "2dfeb085-06ae-426f-8abb-2a87d33de446",
            'top_level_category_id' => \App\Models\Product\Category\TopLevelCategory::getIdByName('Toddler'),
            'main_category_id' => \App\Models\Product\Category\MainCategory::getIdByName("Food"),
            'subcategory_id' => \App\Models\Product\Category\Subcategory::getIdByName("Cereal Milk"),
            'unit'  => 'pcs',
            'quantity'  => 5,
            'age_range_id' => 0-3,
        ]);

        \App\Models\Product\SpecificNeededItem::firstOrCreate([
            'hh_support_code' => "2dfeb085-06ae-426f-8abb-2a87d33de446",
            'top_level_category_id' => \App\Models\Product\Category\TopLevelCategory::getIdByName('Toddler'),
            'main_category_id' => \App\Models\Product\Category\MainCategory::getIdByName("Personal Hygiene"),
            'subcategory_id' => \App\Models\Product\Category\Subcategory::getIdByName("Diapers"),
            'unit'  => 'pcs',
            'quantity'  => 5,
            'age_range_id' => 0-3,
        ]);

        \App\Models\Product\SpecificNeededItem::firstOrCreate([
            'hh_support_code' => "2dfeb085-06ae-426f-8abb-2a87d33de446",
            'top_level_category_id' => \App\Models\Product\Category\TopLevelCategory::getIdByName('Toddler'),
            'main_category_id' => \App\Models\Product\Category\MainCategory::getIdByName("Personal Hygiene"),
            'subcategory_id' => \App\Models\Product\Category\Subcategory::getIdByName("Soap"),
            'unit'  => 'pcs',
            'quantity'  => 5,
            'age_range_id' => 0-3,
        ]);

        \App\Models\Product\SpecificNeededItem::firstOrCreate([
            'hh_support_code' => "2dfeb085-06ae-426f-8abb-2a87d33de446",
            'top_level_category_id' => \App\Models\Product\Category\TopLevelCategory::getIdByName('Toddler'),
            'main_category_id' => \App\Models\Product\Category\MainCategory::getIdByName("Food"),
            'subcategory_id' => \App\Models\Product\Category\Subcategory::getIdByName("Soap"),
            'unit'  => 'pcs',
            'quantity'  => 5,
            'age_range_id' => 4-6,
        ]);

        \App\Models\Product\SpecificNeededItem::firstOrCreate([
            'hh_support_code' => "2dfeb085-06ae-426f-8abb-2a87d33de446",
            'top_level_category_id' => \App\Models\Product\Category\TopLevelCategory::getIdByName('Toddler'),
            'main_category_id' => \App\Models\Product\Category\MainCategory::getIdByName("Personal Hygiene"),
            'subcategory_id' => \App\Models\Product\Category\Subcategory::getIdByName("Soap"),
            'unit'  => 'pcs',
            'quantity'  => 5,
            'age_range_id' => 4-6,
        ]);
    }
}
