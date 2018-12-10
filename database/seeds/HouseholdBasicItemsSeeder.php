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
            'hh_support_code' => "2dfeb085-06ae-426f-8abb-2a87d33de446",
            'total_members' => 5,
            'days_of_support' => 3,
        ]);

        \App\Models\Product\BasicNeededItem::firstOrCreate([
            'hh_support_code' => $support->hh_support_code,
            'top_level_category_id' => \App\Models\Product\Category\TopLevelCategory::getIdByName('Food'),
            'main_category_id' => \App\Models\Product\Category\MainCategory::getIdByName("Rice"),
            'subcategory_id' => \App\Models\Product\Category\Subcategory::getIdByName("Milled Rice"),
            'unit'  => 'kilo',
            'quantity'  => 9,
        ]);

        \App\Models\Product\BasicNeededItem::firstOrCreate([
            'hh_support_code' => $support->hh_support_code,
            'top_level_category_id' => \App\Models\Product\Category\TopLevelCategory::getIdByName('Food'),
            'main_category_id' => \App\Models\Product\Category\MainCategory::getIdByName("Instant Packaged Goods"),
            'subcategory_id' => \App\Models\Product\Category\Subcategory::getIdByName("Noodles"),
            'unit'  => 'pcs',
            'quantity'  => 9,
        ]);

        \App\Models\Product\BasicNeededItem::firstOrCreate([
            'hh_support_code' => $support->hh_support_code,
            'top_level_category_id' => \App\Models\Product\Category\TopLevelCategory::getIdByName('Food'),
            'main_category_id' => \App\Models\Product\Category\MainCategory::getIdByName("Canned Goods"),
            'subcategory_id' => \App\Models\Product\Category\Subcategory::getIdByName("Sardines"),
            'subcategory_id' => \App\Models\Product\Category\Subcategory::getIdByName("Corned Beef"),
            'unit'  => 'pcs',
            'quantity'  => 12,
        ]);

        \App\Models\Product\BasicNeededItem::firstOrCreate([
            'hh_support_code' => $support->hh_support_code,
            'top_level_category_id' => \App\Models\Product\Category\TopLevelCategory::getIdByName('Food'),
            'main_category_id' => \App\Models\Product\Category\MainCategory::getIdByName("Instant Packaged Goods"),
            'subcategory_id' => \App\Models\Product\Category\Subcategory::getIdByName("3-in-1 Coffee"),
            'unit'  => 'pcs',
            'quantity'  => 9,
        ]);

        \App\Models\Product\BasicNeededItem::firstOrCreate([
            'hh_support_code' => $support->hh_support_code,
            'top_level_category_id' => \App\Models\Product\Category\TopLevelCategory::getIdByName('Food'),
            'main_category_id' => \App\Models\Product\Category\MainCategory::getIdByName("Water"),
            'subcategory_id' => \App\Models\Product\Category\Subcategory::getIdByName("Mineral"),
            'unit'  => 'pcs',
            'quantity'  => 9,
        ]);

        


        \App\Models\Product\BasicNeededItem::firstOrCreate([
            'hh_support_code' => $support->hh_support_code,
            'top_level_category_id' => \App\Models\Product\Category\TopLevelCategory::getIdByName('Non-Food'),
            'main_category_id' => \App\Models\Product\Category\MainCategory::getIdByName("Personal Hygiene"),
            'subcategory_id' => \App\Models\Product\Category\Subcategory::getIdByName("Toothbrush"),
            'unit'  => 'pcs',
            'quantity'  => 5,
        ]);

        \App\Models\Product\BasicNeededItem::firstOrCreate([
            'hh_support_code' => $support->hh_support_code,
            'top_level_category_id' => \App\Models\Product\Category\TopLevelCategory::getIdByName('Non-Food'),
            'main_category_id' => \App\Models\Product\Category\MainCategory::getIdByName("Personal Hygiene"),
            'subcategory_id' => \App\Models\Product\Category\Subcategory::getIdByName("Toothpaste"),
            'unit'  => 'pcs',
            'quantity'  => 2,
        ]);

        \App\Models\Product\BasicNeededItem::firstOrCreate([
            'hh_support_code' => $support->hh_support_code,
            'top_level_category_id' => \App\Models\Product\Category\TopLevelCategory::getIdByName('Non-Food'),
            'main_category_id' => \App\Models\Product\Category\MainCategory::getIdByName("Personal Hygiene"),
            'subcategory_id' => \App\Models\Product\Category\Subcategory::getIdByName("Soap"),
            'unit'  => 'pcs',
            'quantity'  => 3,
        ]);

        \App\Models\Product\BasicNeededItem::firstOrCreate([
            'hh_support_code' => $support->hh_support_code,
            'top_level_category_id' => \App\Models\Product\Category\TopLevelCategory::getIdByName('Non-Food'),
            'main_category_id' => \App\Models\Product\Category\MainCategory::getIdByName("Personal Hygiene"),
            'subcategory_id' => \App\Models\Product\Category\Subcategory::getIdByName("Shampoo"),
            'unit'  => 'pcs',
            'quantity'  => 9,
        ]);

        \App\Models\Product\BasicNeededItem::firstOrCreate([
            'hh_support_code' => $support->hh_support_code,
            'top_level_category_id' => \App\Models\Product\Category\TopLevelCategory::getIdByName('Non-Food'),
            'main_category_id' => \App\Models\Product\Category\MainCategory::getIdByName("Personal Hygiene"),
            'subcategory_id' => \App\Models\Product\Category\Subcategory::getIdByName("Napkins"),
            'unit'  => 'pcs',
            'quantity'  => 15,
        ]);

        \App\Models\Product\BasicNeededItem::firstOrCreate([
            'hh_support_code' => $support->hh_support_code,
            'top_level_category_id' => \App\Models\Product\Category\TopLevelCategory::getIdByName('Non-Food'),
            'main_category_id' => \App\Models\Product\Category\MainCategory::getIdByName("Personal Hygiene"),
            'subcategory_id' => \App\Models\Product\Category\Subcategory::getIdByName("Laundry Soap"),
            'unit'  => 'pcs',
            'quantity'  => 3,
        ]);

        \App\Models\Product\BasicNeededItem::firstOrCreate([
            'hh_support_code' => $support->hh_support_code,
            'top_level_category_id' => \App\Models\Product\Category\TopLevelCategory::getIdByName('Non-Food'),
            'main_category_id' => \App\Models\Product\Category\MainCategory::getIdByName("Personal Hygiene"),
            'subcategory_id' => \App\Models\Product\Category\Subcategory::getIdByName("Diapers"),
            'unit'  => 'pcs',
            'quantity'  => 6,
        ]);
    }
}
