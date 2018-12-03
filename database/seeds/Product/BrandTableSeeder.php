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
            ['name' => "Purefoods"],
            ['name' => "Holiday"],
            ['name' => "Quickchow"],
            ['name' => "Lucky Me"],
            ['name' => "Maggi"],
            ['name' => "Nissin"],
            ['name' => "Bear Brand"],
            ['name' => "Nescafe"],
            ['name' => "Blend 45"],
            ['name' => "Great Taste"],
            ['name' => "Nature's Spring"],
            ['name' => "Nido"],
            ['name' => "Pampers"],
            ['name' => "E.Q."],
        ];
    }
}
