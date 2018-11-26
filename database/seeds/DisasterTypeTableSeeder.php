<?php

use Illuminate\Database\Seeder;

class DisasterTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->structures() as $structure)
            if (! \App\Models\Disaster\DisasterType::whereName($structure['name'])->first())
                \App\Models\Disaster\DisasterType::create($structure);
    }

    private function structures() : array
    {
        return [
            ['name' => "Fire"],
            ['name' => "Earthquake"],
            ['name' => "Landslide"],
        ];
    }
}
