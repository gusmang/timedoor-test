<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\books_author;
use App\Models\books_categories;

use Faker\Factory as Faker;

use DB;

class BooksRatingController extends Controller
{
    //
    public function rating(Request $request){
        $title = "Timedoor test - Rating Book";
        $categories_list = books_categories::all();
        $author_list = books_author::all();
        $pages = 'rating';
        return view('books.rating.books_rates' , compact('title','pages','categories_list','author_list'));
    }

    public function post_rating(Request $request){
        $request->validate([
            'id_books' => 'required',
            'rates' => 'required',
        ]);

        $faker = Faker::create('id_ID');

        $insert_data = DB::table('books_voters')->insert([
            'voters_name' => $faker->name,
            'id_books' => $request->id_books,
            'rates' => $request->rates,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        if($insert_data){
            return response()->json(["message" => "Data Rating Berhasil Ditambahkan" , "status" => 200],200);
        }
        else{
            return response()->json(["message" => "Something Wrong" , "status" => 500],500);
        }
    }
}
