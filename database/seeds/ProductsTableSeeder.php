<?php

use Illuminate\Database\Seeder;
use TableSeeder\Product\BrandTableSeeder;
use TableSeeder\Product\CategoryTableSeeder;
use App\Models\Product\Product;
use App\Models\Product\Brand;
use App\Models\Product\Category\MainCategory as Category;
use App\Models\Product\Category\Subcategory;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(BrandTableSeeder::class);
        $this->call(CategoryTableSeeder::class);

        foreach ($this->items() as $item) {
            if(!Product::whereName($item['name'])->first())
                Product::create($item);
        }
    }

    private function items()
    {
        return [
            [
                "sku" => md5("paborito".Brand::getIdByName("Maggi").Category::getIdByName("Instant Packaged Goods").Subcategory::getIdByName("Noodles")),
                "name" => "paborito",
                "brand_id" => Brand::getIdByName("Maggi"),
                "category_id" => Category::getIdByName("Instant Packaged Goods"),
                "subcategory_id" => Subcategory::getIdByName("Noodles"),
            ],
            [
                "sku" => md5("wave 1".Brand::getIdByName("Pampers").Category::getIdByName("Personal Hygiene").Subcategory::getIdByName("Diapers")),
                "name" => "wave 1",
                "brand_id" => Brand::getIdByName("Pampers"),
                "category_id" => Category::getIdByName("Personal Hygiene"),
                "subcategory_id" => Subcategory::getIdByName("Diapers"),
            ],
            [
                "sku" => md5("primary".Brand::getIdByName("Nature's Spring").Category::getIdByName("Water").Subcategory::getIdByName("Distilled")),
                "name" => "primary",
                "brand_id" => Brand::getIdByName("Nature's Spring"),
                "category_id" => Category::getIdByName("Water"),
                "subcategory_id" => Subcategory::getIdByName("Distilled"),
            ],
            [
                "sku" => md5("partial".Brand::getIdByName("Argentina").Category::getIdByName("Canned Goods").Subcategory::getIdByName("Beef Loaf")),
                "name" => "partial",
                "brand_id" => Brand::getIdByName("Argentina"),
                "category_id" => Category::getIdByName("Canned Goods"),
                "subcategory_id" => Subcategory::getIdByName("Beef Loaf"),
            ],
            [
                "sku" => md5("partial_2.0".Brand::getIdByName("Nescafe").Category::getIdByName("Instant Packaged Goods").Subcategory::getIdByName("3-in-1 Coffee")),
                "name" => "partial_2.0",
                "brand_id" => Brand::getIdByName("Nescafe"),
                "category_id" => Category::getIdByName("Instant Packaged Goods"),
                "subcategory_id" => Subcategory::getIdByName("3-in-1 Coffee"),
            ]
        ];
    }
}
