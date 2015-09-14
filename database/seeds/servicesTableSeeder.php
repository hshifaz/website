<?php

use Illuminate\Database\Seeder;

class servicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $names = new ArrayIterator(array('names'=>'New Permanent Electric Connection'
        ,'New Temporary/Permanent Electric Connection'
        ,'New Permanent Electric Connection Through Panel'
        ,'Temporary Electric Connection'
        ,'New Meter Testing'
        ,'Existing Meter Testing'
        ,'Replace Meter/Meterboard'
        ,'Approve Meter'
        ,'Relocate Existing Meterboard'
        ,'Relocate Existing Meter to Panel'
        ,'Panel Modification Testing'
        ,'Relocate SDB'
        ,'Relocate MDB'
        ,'Temporary Disconnection'
        ,'Permanent Disconnection'
        ,'Reconnection'
        ,'Replace Cable'
        ,'Cable Details and Price'));

        $i=1;
        foreach($names as $name){
            $cat = 1;
            if($i>=5)
                $cat=2;
            elseif($i>=12)
                $cat=3;
            elseif($i>=14)
                $cat=4;

            \App\service::create([
                'name' => $name,
                'desc' => $faker->paragraph,
                'category_id' => $cat,
                'icon' => $faker->url,
                'link' => $faker->url,
                'featured' => rand(0,1),
                'order' => $i,
                'status' => true
            ]);
            $i++;
        }
    }
}
