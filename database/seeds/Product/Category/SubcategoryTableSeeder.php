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
            ['name' => "Ionized", 'main_category_id' => MainCategory::getIdByName("Water")],
            ['name' => "Seltzer", 'main_category_id' => MainCategory::getIdByName("Water")],

            ['name' => "Corned Beef", 'main_category_id' => MainCategory::getIdByName("Canned Goods")],
            ['name' => "Beef Loaf", 'main_category_id' => MainCategory::getIdByName("Canned Goods")],
            ['name' => "Sardines", 'main_category_id' => MainCategory::getIdByName("Canned Goods")],
            ['name' => "Sausage", 'main_category_id' => MainCategory::getIdByName("Canned Goods")],
            ['name' => "Beans", 'main_category_id' => MainCategory::getIdByName("Canned Goods")],
            ['name' => "Tuna", 'main_category_id' => MainCategory::getIdByName("Canned Goods")],

            ['name' => "Paracetamol", 'main_category_id' => MainCategory::getIdByName("Medicines")],
            ['name' => "Analgesics", 'main_category_id' => MainCategory::getIdByName("Medicines")],
            ['name' => "Antimalarial Drug", 'main_category_id' => MainCategory::getIdByName("Medicines")],
            ['name' => "Antibiotics", 'main_category_id' => MainCategory::getIdByName("Medicines")],
            ['name' => "Tranquilizers", 'main_category_id' => MainCategory::getIdByName("Medicines")],

            ['name' => "Brown Rice", 'main_category_id' => MainCategory::getIdByName("Rice")],
            ['name' => "Milled Rice", 'main_category_id' => MainCategory::getIdByName("Rice")],
            ['name' => "Corn Rice", 'main_category_id' => MainCategory::getIdByName("Rice")],

            ['name' => "3-in-1 Coffee", 'main_category_id' => MainCategory::getIdByName("Instant Packaged Goods")],
            ['name' => "Powdered Milk", 'main_category_id' => MainCategory::getIdByName("Instant Packaged Goods")],
            ['name' => "Infant Milk", 'main_category_id' => MainCategory::getIdByName("Instant Packaged Goods")],
            ['name' => "Cereal Milk", 'main_category_id' => MainCategory::getIdByName("Instant Packaged Goods")],
            ['name' => "Noodles", 'main_category_id' => MainCategory::getIdByName("Instant Packaged Goods")],

            ['name' => "Toothbrush", 'main_category_id' => MainCategory::getIdByName("Personal Hygiene")],
            ['name' => "Toothpaste", 'main_category_id' => MainCategory::getIdByName("Personal Hygiene")],
            ['name' => "Soap", 'main_category_id' => MainCategory::getIdByName("Personal Hygiene")],
            ['name' => "Shampoo", 'main_category_id' => MainCategory::getIdByName("Personal Hygiene")],
            ['name' => "Napkins", 'main_category_id' => MainCategory::getIdByName("Personal Hygiene")],
            ['name' => "Toilet Paper", 'main_category_id' => MainCategory::getIdByName("Personal Hygiene")],
            ['name' => "Deodorant", 'main_category_id' => MainCategory::getIdByName("Personal Hygiene")],
            ['name' => "Laundry Soap", 'main_category_id' => MainCategory::getIdByName("Personal Hygiene")],
            ['name' => "Diapers", 'main_category_id' => MainCategory::getIdByName("Personal Hygiene")],

            ['name' => "First Aid Kit", 'main_category_id' => MainCategory::getIdByName("Medical Supplies")],
            ['name' => "Bandages", 'main_category_id' => MainCategory::getIdByName("Medical Supplies")],
            ['name' => "Hydrogen Peroxide", 'main_category_id' => MainCategory::getIdByName("Medical Supplies")],
            ['name' => "Rubbing Alcohol", 'main_category_id' => MainCategory::getIdByName("Medical Supplies")],
            ['name' => "Thermometer", 'main_category_id' => MainCategory::getIdByName("Medical Supplies")],

            ['name' => "Children", 'main_category_id' => MainCategory::getIdByName("Clothing")],
            ['name' => "Female", 'main_category_id' => MainCategory::getIdByName("Clothing")],
            ['name' => "Male", 'main_category_id' => MainCategory::getIdByName("Clothing")],

            ['name' => "Flashlight", 'main_category_id' => MainCategory::getIdByName("Hand Tools")],
        ];
    }
}
