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
            'top_level_category_id' => \App\Models\Product\Category\TopLevelCategory::getIdByName('Female'),
            'main_category_id' => \App\Models\Product\Category\MainCategory::getIdByName("Rice"),
            'subcategory_id' => \App\Models\Product\Category\Subcategory::getIdByName("Milled Rice"),
            'unit'  => 'kilo',
            'quantity'  => 5,
            'age_range_id' => 4,
        ]);
    }
}
