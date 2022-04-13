<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PublishingHouse extends Model
{
    use HasFactory,SoftDeletes;

    public function authors(){
        return $this->hasManyThrough(Author::class,Book::class);
    }

    public function books(){
        return $this->hasMany(Book::class);
    }
}
