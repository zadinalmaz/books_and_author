<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PharIo\Manifest\Author;

class  Book extends Model
{
    use HasFactory;
    protected $fillable = ["book_name", "author_name", "author_id"];

    public function author() {
        return $this->belongsTo(Author::class);
    }
}
//sdfsdfsdf
