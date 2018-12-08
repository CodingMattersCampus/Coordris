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
                "sku" => md5("paborito".Brand::getIdByName("Maggi")),
                "name" => "paborito",
                "brand_id" => Brand::getIdByName("Maggi"),
            ],
            [
                "sku" => md5("wave 1".Brand::getIdByName("Pampers")),
                "name" => "wave 1",
                "brand_id" => Brand::getIdByName("Pampers"),
            ],
            [
                "sku" => md5("primary".Brand::getIdByName("Nature's Spring")),
                "name" => "primary",
                "brand_id" => Brand::getIdByName("Nature's Spring"),
            ],
            [
                "sku" => md5("partial".Brand::getIdByName("Argentina")),
                "name" => "partial",
                "brand_id" => Brand::getIdByName("Argentina"),
            ],
            [
                "sku" => md5("partial_2.0".Brand::getIdByName("Nescafe")),
                "name" => "partial_2.0",
                "brand_id" => Brand::getIdByName("Nescafe"),
            ]
        ];
    }
}
