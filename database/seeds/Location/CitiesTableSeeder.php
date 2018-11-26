<?php

namespace TableSeeder\Location;

use App\Models\Location\City;
use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->cities() as $city) {
            if(! City::whereCode($city['code'])->first())
                City::create($city);
        }
    }

    private function cities() : array
    {
        return [
            [
                'code'  => "ILGN",
                'name'  => "Iligan"
            ]
        ];
    }
}
