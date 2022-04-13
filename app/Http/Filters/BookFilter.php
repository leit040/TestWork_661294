<?php


namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class BookFilter extends QueryFilter
{

    public function lang(string $lang)
    {
        $this->builder->where('lang', strtolower($lang));
    }

    public function year(string $year)
    {
        $this->builder->where('year_publishing', $year);
    }

    public function title(string $title)
    {
        $words = array_filter(explode(' ', $title));

        $this->builder->where(function (Builder $query) use ($words) {
            foreach ($words as $word) {
                $query->where('title', 'like', "%$word%");
            }
        });
    }
    public function order(string $order){
        if(in_array($order,['id','title','year_publishing','lang'])){
        $this->builder->orderBy($order);}

    }

}
