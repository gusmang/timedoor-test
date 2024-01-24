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
            $pageSize = ($request->length) ? $request->length : 10;

            $data =  books_list::join("books_voters" , "books_voters.id_books" , "books_list.id")
            ->select('books_list.*','books_voters.rates',DB::raw('count(books_voters.rates) as voter'),DB::raw('round(AVG(books_voters.rates),2) as avg_rating'))
            ->with('author','category') ->when($request->search_text != "", function ($query) use ($request) {
                $query->where('books_name', 'like', '%'.$request->search_text.'%')->orWhereHas('author', function($query) use ($request){
                    $query->where('author_name', 'like', '%'.$request->search_text.'%');
                });
            })->groupBy('books_list.id')->orderByRaw("avg_rating DESC, voter DESC")->skip($start)->take($pageSize)->get();
            

            $count_all = books_list::join("books_voters" , "books_voters.id_books" , "books_list.id")
            ->select('books_list.*','books_voters.rates',DB::raw('count(books_voters.rates) as voter'),DB::raw('round(AVG(books_voters.rates),2) as avg_rating'))
            ->with('author','category')->when($request->search_text != "", function ($query) use ($request) {
                $query->where('books_name', 'like', '%'.$request->search_text.'%')->orWhereHas('author', function($query) use ($request){
                    $query->where('author_name', 'like', '%'.$request->search_text.'%');
                });
            })->groupBy('books_list.id')->orderByRaw("avg_rating DESC, voter DESC")->get();
            
            return DataTables::of($data)->with([
                "recordsTotal" => count($count_all),
                "recordsFiltered" => count($count_all),
                ])
                ->setOffset($start)
                ->addIndexColumn()
                ->addColumn('author_name', function($arrBooks){
                    return $arrBooks['author']['author_name'];
                })
                ->addColumn('category_name', function($arrBooks){
                    return $arrBooks['category']['category_name'];
                })
                ->make(true);
        }
    }

    public function listed(Request $request){
        $data = books_author::get();
        $datas = Author::collection($data);

        return $datas;
    }
}
