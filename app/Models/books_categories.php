<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\books_list;

class books_categories extends Model
{
    use HasFactory;

    protected $table = 'books_category';
    protected $primaryKey = 'id';
    
}
