<?php

use Illuminate\Database\Seeder;

class AgeRangeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
	public function run()
    {
        foreach ($this->ageRange() as $range)
            if (! \App\Models\User\AgeRange::whereName($range['age_between'])->first())
                \App\Models\User\AgeRange::create($range);
    }

    private function ageRange() : array
    {
    	return[
    		[
    			'age_between' => "0-3",
    			'description' => "Babies",
    		],
    		[
    			'age_between' => "4-6",
    			'description' => "Toddlers",
    		],
			[
    			'age_between' => "7-9",
    			'description' => "Children",
    		],
    		[
    			'age_between' => "9-12",
    			'description' => "Teens(Young)",
    		],
    		[
    			'age_between' => "13-18",
    			'description' => "Teens",
    		],
    		[
    			'age_between' => "18-35",
    			'description' => "Young Adult",
    		],
    		[
    			'age_between' => "36-60",
    			'description' => "Middle Aged Adult",
    		],
    		[
    			'age_between' => "60-Above",
    			'description' => "Elderly",
    		],
    	]
    }

}
