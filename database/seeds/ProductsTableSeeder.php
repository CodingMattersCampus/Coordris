<?php

use Illuminate\Database\Seeder;
use TableSeeder\Product\BrandTableSeeder;
use TableSeeder\Product\CategoryTableSeeder;
use App\Models\Product\Product;
use App\Models\Product\Brand;
use App\Models\Product\Category;

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
                "name" => "paborito",
                "brand_id" => Brand::getIdByName("Nido"),
                "category_id" => Category::getIdByName("Milk/Coffee"),
            ],
            [
                "name" => "wave 1",
                "brand_id" => Brand::getIdByName("Maggi"),
                "category_id" => Category::getIdByName("Soup"),
            ],
            [
                "name" => "primary",
                "brand_id" => Brand::getIdByName("Nature's Spring"),
                "category_id" => Category::getIdByName("Water"),
            ],
            [
                "name" => "partial",
                "brand_id" => Brand::getIdByName("Argentina"),
                "category_id" => Category::getIdByName("Canned"),
            ],
            [
                "name" => "partial_2.0",
                "brand_id" => Brand::getIdByName("Nescafe"),
                "category_id" => Category::getIdByName("Milk/Coffee"),
            ]
        ];
    }
}
