<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\books_categories;
use App\Models\books_author;
use App\Models\books_voters;

class books_list extends Model
{
    use HasFactory;

    protected $table = 'books_list';
    protected $primaryKey = 'id';

    public function category()
    {
        return $this->belongsTo(books_categories::class,'id_books_category','id');
    }

    public function author()
    {
        return $this->belongsTo(books_author::class,'id_books_author','id');
    }

    public function voter()
    {
        return $this->belongsToMany('App\books_voters');
    }
}
