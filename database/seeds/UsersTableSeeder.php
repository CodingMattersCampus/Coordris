<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->structures() as $structure)
            if (! \App\Models\User\User::whereName($structure['email'])->first())
                \App\Models\User\User::create($structure);
    }

    private function structures() : array
    {
        return [
            [
                'name' => "ILIGAN LGU",
                'email' => "iligan@gov.ph",
                'password' => \Illuminate\Support\Facades\Hash::make("123456"),
                'remember_token' => str_random(),
                'city_id'   => \App\Models\Location\City::getIdByName('Iligan'),
            ],
            [
                'name' => "Cagayan de Oro LGU",
                'email' => "cdo@gov.ph",
                'password' => \Illuminate\Support\Facades\Hash::make("123456"),
                'remember_token' => str_random(),
                'city_id'   => \App\Models\Location\City::getIdByName('Cagayan de Oro'),
            ],
        ];
    }
}
