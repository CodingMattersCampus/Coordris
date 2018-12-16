<?php

use Illuminate\Database\Seeder;
use TableSeeder\Product\BrandTableSeeder;
use TableSeeder\Product\CategoryTableSeeder;
use App\Models\Product\Product;
use App\Models\Product\Brand;

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

        foreach ($this->items() as $item) {
            if(!Product::whereName($item['name'])->first())
                Product::create($item);
        }
    }

    private function items()
    {
        return [
            [
                "sku" => md5("Chicken Noodles".Brand::getIdByName("Maggi")),
                "name" => "Chicken Noodles",
                "brand_id" => Brand::getIdByName("Maggi"),
            ],
            [
                "sku" => md5("All-Night Dry".Brand::getIdByName("Pampers")),
                "name" => "All-Night Dry",
                "brand_id" => Brand::getIdByName("Pampers"),
            ],
            [
                "sku" => md5("Distilled Water".Brand::getIdByName("Nature's Spring")),
                "name" => "Distilled Water",
                "brand_id" => Brand::getIdByName("Nature's Spring"),
            ],
            [
                "sku" => md5("Corned Beef".Brand::getIdByName("Argentina")),
                "name" => "Corned Beef",
                "brand_id" => Brand::getIdByName("Argentina"),
            ],
            [
                "sku" => md5("Blend & Brew".Brand::getIdByName("Nescafe")),
                "name" => "Blend and Brew",
                "brand_id" => Brand::getIdByName("Nescafe"),
            ]
        ];
    }
}
