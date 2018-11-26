<?php

namespace TableSeeder\Product;

use App\Models\Product\Brand;
use Illuminate\Database\Seeder;

class BrandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->brands() as $brand)
            if(!Brand::whereName($brand['name'])->first())
                Brand::create($brand);
    }

    private function brands() : array
    {
        return [
            ['name' => "Argentina"],
            ['name' => "Bear Brand"],
            ['name' => "Nature's Spring"],
            ['name' => "Nido"],
            ['name' => "Pampers"],
        ];
    }
}
