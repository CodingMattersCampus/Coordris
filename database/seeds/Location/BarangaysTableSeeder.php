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
               'code' => 'HPLN',
               'name' => "Hinaplanon",
               'city_code' => City::getIdByCode('ILGN'),
           ],
           [
               'code' => 'LUNB',
               'name' => "Luinab",
               'city_code' => City::getIdByCode('ILGN'),
           ],
           [
               'code' => 'PLAO',
               'name' => "Pala-o",
               'city_code' => City::getIdByCode('ILGN'),
           ],
           [
               'code' => 'TBNGA',
               'name' => "Tibanga",
               'city_code' => City::getIdByCode('ILGN'),
           ],
           [
               'code' => 'TUBD',
               'name' => "Tubod",
               'city_code' => City::getIdByCode('ILGN'),
           ],
       ];
    }
}
