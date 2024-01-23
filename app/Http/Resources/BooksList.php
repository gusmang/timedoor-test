<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

use DB;
use App\Models\books_voters;

class BooksList extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $total_book_rates = books_voters::select(DB::raw("SUM(rates) as total_rates"))->where("id_books", $this->id)->first();
        $book_count = books_voters::where("id_books", $this->id)->count();

        $rating = $book_count == 0 ? 0 : $total_book_rates->total_rates / $book_count;
        // $arr = array();

        // foreach($jml_book as $row){
        //     array_push($arr , $row->id);
        // }

        // $jml_votes_book = DB::table("books_voters")->whereIn("id" , $arr)->count();
        return [
            'id' => $this->id,
            'voter' => $this->voter,
            'books_name' => $this->books_name,
            'rating' => round($rating , 2),
            'id_books_category' => $this->category->category_name,
            'id_books_author' => $this->author->author_name,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
