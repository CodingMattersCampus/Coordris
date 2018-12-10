<?php

use Illuminate\Database\Seeder;
use TableSeeder\Product\CategoryTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(InfrastructureTableSeeder::class);
        $this->call(LocationsTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(ProductCategoryTableSeeder::class);
        $this->call(DisasterTypeTableSeeder::class);
        $this->call(DisasterSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(VolunteerTableSeeder::class);
        $this->call(NgoInventorySeeder::class);
        $this->call(HouseholdBasicItemsSeeder::class);
        $this->call(HouseholdSpecificItemsSeeder::class);
    }
}
