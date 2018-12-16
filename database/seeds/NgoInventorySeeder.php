<?php

use Illuminate\Database\Seeder;
use App\Models\Product\Product;
use App\Models\User\Volunteer;
use Modules\Ngo\Entities\Inventory;

class NgoInventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->products() as $item) {
            if(!Inventory::where([
            	'product_id' => $item['product_id'],
            	'volunteer_id' => $item['volunteer_id']
            	])->first())
                Inventory::create($item);
        }
    }

    private function products()
    {
    	return [
    		[
    			"product_id" => Product::getIdByName("Chicken Noodles"),
    			"volunteer_id" => Volunteer::getIdByName("volunteer"),
    			"quantity" => random_int(1, 500),
    		],
            [
                "product_id" => Product::getIdByName("All-Night Dry"),
                "volunteer_id" => Volunteer::getIdByName("volunteer"),
                "quantity" => random_int(1, 500),
            ],
            [
                "product_id" => Product::getIdByName("Distilled Water"),
                "volunteer_id" => Volunteer::getIdByName("volunteer"),
                "quantity" => random_int(1, 500),
            ],
            [
                "product_id" => Product::getIdByName("Corned Beef"),
                "volunteer_id" => Volunteer::getIdByName("volunteer"),
                "quantity" => random_int(1, 500),
            ],
            [
                "product_id" => Product::getIdByName("Blend and Brew"),
                "volunteer_id" => Volunteer::getIdByName("volunteer"),
                "quantity" => random_int(1, 500),
            ],



            [
                "product_id" => Product::getIdByName("Chicken Noodles"),
                "volunteer_id" => Volunteer::getIdByName("prc"),
                "quantity" => random_int(1, 500),
            ],
            [
                "product_id" => Product::getIdByName("All-Night Dry"),
                "volunteer_id" => Volunteer::getIdByName("prc"),
                "quantity" => random_int(1, 500),
            ],
            [
                "product_id" => Product::getIdByName("Distilled Water"),
                "volunteer_id" => Volunteer::getIdByName("prc"),
                "quantity" => random_int(1, 500),
            ],
            [
                "product_id" => Product::getIdByName("Corned Beef"),
                "volunteer_id" => Volunteer::getIdByName("prc"),
                "quantity" => random_int(1, 500),
            ],
            [
                "product_id" => Product::getIdByName("Blend and Brew"),
                "volunteer_id" => Volunteer::getIdByName("prc"),
                "quantity" => random_int(1, 500),
            ],




            [
                "product_id" => Product::getIdByName("Chicken Noodles"),
                "volunteer_id" => Volunteer::getIdByName("ecoweb"),
                "quantity" => random_int(1, 500),
            ],
            [
                "product_id" => Product::getIdByName("All-Night Dry"),
                "volunteer_id" => Volunteer::getIdByName("ecoweb"),
                "quantity" => random_int(1, 500),
            ],
            [
                "product_id" => Product::getIdByName("Distilled Water"),
                "volunteer_id" => Volunteer::getIdByName("ecoweb"),
                "quantity" => random_int(1, 500),
            ],
            [
                "product_id" => Product::getIdByName("Corned Beef"),
                "volunteer_id" => Volunteer::getIdByName("ecoweb"),
                "quantity" => random_int(1, 500),
            ],
            [
                "product_id" => Product::getIdByName("Blend and Brew"),
                "volunteer_id" => Volunteer::getIdByName("ecoweb"),
                "quantity" => random_int(1, 500),
            ],
    	];
    }
}
