<?php

use Illuminate\Database\Seeder;

class serviceCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $names = new ArrayIterator(array('names'=>'New Connection (Temporary & Permanent) Services'
        ,'Meter & Meterboard Services'
        ,'Distribution Box Related Services'
        ,'Other Electric Connection Related Services'));

        $i=1;
        foreach($names as $name){
            \App\serviceCategory::create([
                'name' => $name,
                'order' => $i,
                'status' => true
            ]);
            $i++;
        }
    }
}
