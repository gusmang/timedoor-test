<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;

class books_author extends Model
{
    use HasFactory;

    protected $table = 'books_author';
    protected $primaryKey = 'id';

}
