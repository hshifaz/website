<?php

use Illuminate\Database\Seeder;
use \SebastianBergmann\Comparator\Factory;
class tender extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {
        //
        $faker = Faker\Factory::create();

        \App\Tender::create(['bid_title' => 'test']);


    }
}
