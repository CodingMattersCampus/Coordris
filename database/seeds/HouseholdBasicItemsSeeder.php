<?php

use Illuminate\Database\Seeder;

class HouseholdBasicItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $support = \App\Models\HouseholdItemSupport::firstOrCreate([
            'hh_support_code' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
            'total_members' => 4,
            'days_of_support' => 1,
        ]);

        \App\Models\Product\BasicNeededItem::firstOrCreate([
            'hh_support_code' => $support->hh_support_code,
            'top_level_category_id' => \App\Models\Product\Category\TopLevelCategory::getIdByName('Food'),
            'main_category_id' => \App\Models\Product\Category\MainCategory::getIdByName("Rice"),
            'subcategory_id' => \App\Models\Product\Category\Subcategory::getIdByName("Milled Rice"),
            'unit'  => 'kilo',
            'quantity'  => 5,
        ]);

        \App\Models\Product\BasicNeededItem::firstOrCreate([
            'hh_support_code' => $support->hh_support_code,
            'top_level_category_id' => \App\Models\Product\Category\TopLevelCategory::getIdByName('Food'),
            'main_category_id' => \App\Models\Product\Category\MainCategory::getIdByName("Canned Goods"),
            'subcategory_id' => \App\Models\Product\Category\Subcategory::getIdByName("Sardines"),
            'unit'  => 'pcs',
            'quantity'  => 6,
        ]);

        \App\Models\Product\BasicNeededItem::firstOrCreate([
            'hh_support_code' => $support->hh_support_code,
            'top_level_category_id' => \App\Models\Product\Category\TopLevelCategory::getIdByName('Non-Food'),
            'main_category_id' => \App\Models\Product\Category\MainCategory::getIdByName("Clothing"),
            'subcategory_id' => \App\Models\Product\Category\Subcategory::getIdByName("Children"),
            'unit'  => 'pcs',
            'quantity'  => 2,
        ]);

        \App\Models\Product\BasicNeededItem::firstOrCreate([
            'hh_support_code' => $support->hh_support_code,
            'top_level_category_id' => \App\Models\Product\Category\TopLevelCategory::getIdByName('Non-Food'),
            'main_category_id' => \App\Models\Product\Category\MainCategory::getIdByName("Clothing"),
            'subcategory_id' => \App\Models\Product\Category\Subcategory::getIdByName("Male"),
            'unit'  => 'pcs',
            'quantity'  => 2,
        ]);

        \App\Models\Product\BasicNeededItem::firstOrCreate([
            'hh_support_code' => $support->hh_support_code,
            'top_level_category_id' => \App\Models\Product\Category\TopLevelCategory::getIdByName('Non-Food'),
            'main_category_id' => \App\Models\Product\Category\MainCategory::getIdByName("Clothing"),
            'subcategory_id' => \App\Models\Product\Category\Subcategory::getIdByName("Female"),
            'unit'  => 'pcs',
            'quantity'  => 2,
        ]);
    }
}
