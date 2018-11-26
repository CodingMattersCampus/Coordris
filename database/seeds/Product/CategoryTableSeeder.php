<?php

namespace TableSeeder\Product;

use Illuminate\Database\Seeder;
use App\Models\Product\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->categories() as $category)
            if(! Category::whereName($category['name'])->first())
                Category::create($category);
    }

    public function categories()
    {
        return [
            ['name' => "Canned"],
            ['name' => "Water"],
            ['name' => "Milk"],
        ];
    }
}
