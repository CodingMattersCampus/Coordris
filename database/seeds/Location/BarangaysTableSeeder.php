<?php

namespace TableSeeder\Location;

use App\Models\Location\Barangay;
use App\Models\Location\City;
use Illuminate\Database\Seeder;

class BarangaysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->barangays() as $barangay)
            if (! Barangay::whereName($barangay['name'])->first())
                Barangay::create($barangay);
    }

    private function barangays() : array
    {
       return [
           [
               'code' => 'TBNGA',
               'name' => "Tibanga",
               'city_code' => City::getIdByCode('ILGN'),
           ]
       ];
    }
}
