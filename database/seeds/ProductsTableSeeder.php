<?php

use Illuminate\Database\Seeder;
use TableSeeder\Product\BrandTableSeeder;
use TableSeeder\Product\CategoryTableSeeder;

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
    }
}
