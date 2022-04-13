<?php

namespace App\Models;

use App\Http\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

;

class Book extends Model
{
    use HasFactory,SoftDeletes;


    public function scopeFilter(Builder $builder, QueryFilter $filter)
    {
        $filter->apply($builder);
    }

    public function authors(){
        return $this->belongsToMany(Author::class)->using(AuthorBook::class)->withPivot('is_main_author');
    }

    public function publishingHouse(){
        return $this->belongsTo(PublishingHouse::class);
    }
}
