<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call(UserTableSeeder::class);
        $this->call(menusTableSeeder::class);
        $this->call(servicesTableSeeder::class);
        $this->call(serviceCategoriesTableSeeder::class);

        Model::reguard();
    }
}
