<?php

use Illuminate\Database\Seeder;
use App\Models\Product\ProductCategory;
use App\Models\Product\Product;
use App\Models\Product\Category\MainCategory as Category;
use App\Models\Product\Category\TopLevelCategory;
use App\Models\Product\Category\Subcategory;

class ProductCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	
		foreach ($this->items() as $item) {
            if(!ProductCategory::where(
                [
                    'product_id' => $item['product_id'],
                    'category_id' => $item['category_id'],
                    'subcategory_id' => $item['subcategory_id'],
                    'top_level_category_id' => $item['top_level_category_id']
                ])->first())
                ProductCategory::create($item);
        }        
    }

    private function items()
    {
    	return 
        [
        	[
                "product_id" => Product::getIdByName("paborito"),
                "category_id" => Category::getIdByName("Instant Packaged Goods"),
                "subcategory_id" => Subcategory::getIdByName("Noodles"),
                "top_level_category_id" => TopLevelCategory::getIdByName("Food"),
            ],
            [
                "product_id" => Product::getIdByName("wave 1"),
                "category_id" => Category::getIdByName("Personal Hygiene"),
                "subcategory_id" => Subcategory::getIdByName("Diapers"),
                "top_level_category_id" => TopLevelCategory::getIdByName("Non-Food"),
            ],
            [
                "product_id" => Product::getIdByName("primary"),
                "category_id" => Category::getIdByName("Water"),
                "subcategory_id" => Subcategory::getIdByName("Distilled"),
                "top_level_category_id" => TopLevelCategory::getIdByName("Food"),
            ],
            [
                "product_id" => Product::getIdByName("partial"),
                "category_id" => Category::getIdByName("Canned Goods"),
                "subcategory_id" => Subcategory::getIdByName("Beef Loaf"),
                "top_level_category_id" => TopLevelCategory::getIdByName("Food"),
            ],
            [
                "product_id" => Product::getIdByName("partial_2.0"),
                "category_id" => Category::getIdByName("Instant Packaged Goods"),
                "subcategory_id" => Subcategory::getIdByName("3-in-1 Coffee"),
                "top_level_category_id" => TopLevelCategory::getIdByName("Food"),
            ],
            [
                "product_id" => Product::getIdByName("partial_2.0"),
                "category_id" => Category::getIdByName("Instant Packaged Goods"),
                "subcategory_id" => Subcategory::getIdByName("3-in-1 Coffee"),
                "top_level_category_id" => TopLevelCategory::getIdByName("Food"),
            ],
        ];
    }
}
