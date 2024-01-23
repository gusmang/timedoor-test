<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

use Faker\Factory as Faker;

class BooksList extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create('id_ID');
 
    	for($i = 1; $i <= 100000; $i++){
 
    	      // insert data ke table pegawai menggunakan Faker
            // $id_books_category = DB::table("books_category")->inRandomOrder()->first();
            // $id_books_author = DB::table("books_author")->inRandomOrder()->first();
            $id_books_category = rand(1,50000);
            $id_books_author = rand(1,1000);
    		DB::table('books_list')->insert([
                'books_name' => $faker->jobTitle." ".rand(0,500),
    			'id_books_category' => $id_books_category,
                'id_books_author' => $id_books_author,
                'rating' => 0,
                'voter' => 0,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
    		]);
            
 
    	}
    }
}
