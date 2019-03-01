<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ParkirTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker::create();
    	for ($i=0; $i < 10 ; $i++) { 
	    		DB::table('tb_parkir')->insert([
	            'no_kendaraan' => str_random(6),
	            'masuk' => $faker->time,
	            'keluar' => $faker->time,
                'jam' => $faker->randomDigit,
                'menit' => $faker->randomDigit,
                'selisih' => $faker->randomDigit,
	        ]);
    	}
        
    }
}
