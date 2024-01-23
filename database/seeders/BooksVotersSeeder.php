<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

use Faker\Factory as Faker;

class BooksVotersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create('id_ID');

        ini_set('memory_limit', '512M');//allocate memory
        DB::disableQueryLog();//disable log

        //DB::setEventDispatcher(new Illuminate\Events\Dispatcher());
        
        $temp_array_voters = array();
    	for($i = 1; $i <= 500000; $i++){
            
    	      // insert data ke table pegawai menggunakan Faker
            $books_id = rand(1,100000);
            $rates = rand(1,10);

    		DB::table('books_voters')->insert([
                'voters_name' => $faker->name,
    			'id_books' => $books_id,
                'rates' => $rates,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
    		]);

            $json_arrays = (object) [
                "id_books" => $books_id,
                "rates" => $rates
            ];

            array_push($temp_array_voters , $json_arrays);

             //$sum_books = DB::table("books_voters")->select(DB::raw("SUM(rates) as total_rates"))->where("id_books" , $books_id)->first();
            // $books_count =  DB::table("books_voters")->where("id_books" , $books_id)->count();

            // DB::table('books_list')->where("id" , $books_id)->update([
            //     "rating" => $sum_books->total_rates/$books_count,
            //     "voter" => $books_count
            // ]);
           // $books = DB::table("books_list")->where("id" , $books_id)->first();

           
    	}
        
    }
}
