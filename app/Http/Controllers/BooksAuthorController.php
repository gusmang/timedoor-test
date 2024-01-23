<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Html\Column;

use App\Models\books_author;
use App\Http\Resources\Author;

use DB;
use View;

class BooksAuthorController extends Controller
{
    //
    public function list(Request $request){
        //$list = books_author::all();

        if ($request->ajax()) {
            $data = books_author::get();
            $datas = Author::collection($data);
            
            return DataTables::of($datas->toArray($request))
                ->addIndexColumn()
                ->make(true);
        }
          
        $title = "Timedoor test - Author List";
        $pages = 'author';
        return View::make('books.author.books_author' , compact('title' , 'pages'));
    }

    public function list_author(Request $request){
        $data = [];
    
        if($request->filled('q')){
            $data = books_author::select("author_name", "id")
                        ->where('author_name', 'LIKE', '%'. $request->get('q'). '%')
                        ->get();
        }
     
        return response()->json($data);
    }

}
