<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\books_list;
use App\Models\books_author;
use App\Http\Resources\BooksList;

use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Html\Column;


use DB;

class BooksListController extends Controller
{
    //
    public function home(Request $request){
        $title = "Timedoor test - Books List";
        $pages = 'home';
        return view('books.list.books_list' , compact('title','pages'));
    }

    public function list(Request $request)
    {
    
        $data = books_list::select("books_name", "id")
                        ->where('id_books_author', $request->author_id)
                        ->get();
     
        return response()->json($data);
    }


    public function booklist(Request $request){
       
        ini_set('MAX_EXECUTION_TIME', -1);
        ini_set('memory_limit', '-1');  
        DB::disableQueryLog();//disable log
        //$page = $request->page ? $request->page * 10 : 0;
        
        
        if ($request->ajax()) {
            $start = ($request->start) ? $request->start : 0;
            //$data = books_list::offset($start)->limit(10)->get();
            $pageSize = ($request->length) ? $request->length : 10;
            $data =  books_list::skip($start)->take($pageSize)->get();

            $count_all = books_list::count();
            
            return DataTables::of(BooksList::collection($data)->toArray($request))->with([
                "recordsTotal" => $count_all,
                "recordsFiltered" => $count_all,
                ])
                ->setOffset($start)
                ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
                return $btn;
            })->make(true);
        }
    }

    public function listed(Request $request){
        $data = books_author::get();
        $datas = Author::collection($data);

        return $datas;
    }
}
