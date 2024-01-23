<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

use DB;

class Author extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $jml_book = DB::table("books_list")->select("id")->where("id_books_author", $this->id)->get();
        $arr = array();

        foreach($jml_book as $row){
            array_push($arr , $row->id);
        }

        $jml_votes_book = DB::table("books_voters")->whereIn("id" , $arr)->count();

        return [
            'id' => $this->id,
            'votes' => $jml_votes_book,
            'author_name' => $this->author_name,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
