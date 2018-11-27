<?php

use Illuminate\Database\Seeder;

class VolunteerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->volunteers() as $volunteer)
            if (! \App\Models\User\Volunteer::whereEmail($volunteer['email'])->first())
                \App\Models\User\Volunteer::create($volunteer);
    }

    private function volunteers() : array
    {
        return [
            [
                'name' => "volunteer",
                'email' => "volunteer@organization.com",
                'password' => \Illuminate\Support\Facades\Hash::make("secret"),
                'remember_token' => str_random(),
            ],
        ];
    }
}
