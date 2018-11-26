<?php

use Illuminate\Database\Seeder;
use TableSeeder\Location\CitiesTableSeeder;
use TableSeeder\Location\BarangaysTableSeeder;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CitiesTableSeeder::class);
        $this->call(BarangaysTableSeeder::class);
    }
}
