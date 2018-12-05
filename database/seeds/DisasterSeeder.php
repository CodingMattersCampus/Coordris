<?php

use Illuminate\Database\Seeder;
use App\Models\Disaster\DisasterType;
use Carbon\Carbon;

class DisasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->disasters() as $disaster)
            if (! \App\Models\Disaster\Disaster::whereName($disaster['name'])->first())
                \App\Models\Disaster\Disaster::create($disaster);
    }

    private function disasters() : array
    {
        return [
            [
            	'type_id' => DisasterType::getIdByName("Earthquake"),
            	'name' => "Linog",
            	'disaster_date' => carbon::now()
        	],
			[
            	'type_id' => DisasterType::getIdByName("Typhoon"),
            	'name' => "Pablo",
            	'disaster_date' => carbon::now()
        	],
			[
            	'type_id' => DisasterType::getIdByName("Landslide"),
            	'name' => "Mudslide",
            	'disaster_date' => carbon::now()
        	],
        ];
    }
}
