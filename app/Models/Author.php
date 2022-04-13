<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Author extends Model
{
    use HasFactory,SoftDeletes;

    public function allBooks(){
        return $this->belongsToMany(Book::class)->using(AuthorBook::class)->withPivot('is_main_author');
    }

    public function books(){
        return  $this->allBooks()->wherePivot('is_main_author','=',1);
    }
}
