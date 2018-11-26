<?php

use App\Models\Center\Infrastructure;
use Illuminate\Database\Seeder;

class InfrastructureTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->structures() as $structure)
            if (! Infrastructure::whereName($structure['name'])->first())
                Infrastructure::create($structure);
    }

    private function structures() : array
    {
        return [
            ['name' => "Building"],
            ['name' => "Gymnasium"],
            ['name' => "Open Field"],
        ];
    }
}
