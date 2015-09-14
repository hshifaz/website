<?php

use Illuminate\Database\Seeder;

class menusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$faker = Faker\Factory::create();
        $captions = new ArrayIterator(array('captions'=>'Home','About Us','Our Services','Powerhouses','Press Release','Contact Us'));


        $i=1;
        foreach($captions as $caption){
            \App\menu::create([
                'caption' => $caption,
                'parent_id' => 0,
                'order' => $i,
                'status' => true
            ]);
            $i++;
        }

        \App\menu::create([
            'caption' => 'Organization',
            'parent_id' => 2,
            'order' => 1,
            'status' => true
        ]);
        \App\menu::create([
            'caption' => 'Board of Directors',
            'parent_id' => 2,
            'order' => 2,
            'status' => true
        ]);
        \App\menu::create([
            'caption' => 'History',
            'parent_id' => 2,
            'order' => 3,
            'status' => true
        ]);

        \App\menu::create([
            'caption' => 'Electrification',
            'parent_id' => 3,
            'order' => 1,
            'status' => true
        ]);
        \App\menu::create([
            'caption' => 'Billing & Payment',
            'parent_id' => 3,
            'order' => 2,
            'status' => true
        ]);
        \App\menu::create([
            'caption' => 'Others',
            'parent_id' => 3,
            'order' => 3,
            'status' => true
        ]);

        \App\menu::create([
            'caption' => 'Grater Male',
            'parent_id' => 4,
            'order' => 1,
            'status' => true
        ]);
        \App\menu::create([
            'caption' => 'Kaaf Atoll',
            'parent_id' => 4,
            'order' => 2,
            'status' => true
        ]);
        \App\menu::create([
            'caption' => 'Alif Alif Atoll',
            'parent_id' => 4,
            'order' => 3,
            'status' => true
        ]);
    }
}
