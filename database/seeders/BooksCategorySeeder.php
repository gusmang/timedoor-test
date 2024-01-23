<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

use Faker\Factory as Faker;

class BooksCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create('id_ID');
 
    	for($i = 1; $i <= 50000; $i++){
 
    	      // insert data ke table pegawai menggunakan Faker
    		DB::table('books_category')->insert([
    			'category_name' => $faker->company,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
    		]);
            
 
    	}
    }
}
