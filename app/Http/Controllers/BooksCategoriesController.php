<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\books_categories;

class BooksCategoriesController extends Controller
{
    //
    public function list(Request $request)
    {
        $data = [];
    
        if($request->filled('q')){
            $data = books_categories::select("category_name", "id")
                        ->where('category_name', 'LIKE', '%'. $request->get('q'). '%')
                        ->get();
        }
     
        return response()->json($data);
    }
}
