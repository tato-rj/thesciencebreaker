<?php

namespace App\Manager\Traits;

trait ArticleScopeQueries
{
    public function scopeExcept($query, $model)
    {
        return $query->where('id', '!=', $model->id);
    }

    public function scopeRecent($query, $number)
    {
        return $query->with(['category', 'authors'])->orderBy('created_at', 'desc')->take($number);
    }

    public function scopeSimilar($query)
    {
        return $this->category->articles()->except($this)->with(['category', 'authors'])->orderBy('id', 'desc')->take(5);
    }

    public function scopePopular($query, $number)
    {
        return $query->with(['category', 'authors'])->orderBy('views', 'desc')->take($number);
    }

    public function scopeEditorPicks($query)
    {
        return $query->with(['category', 'authors'])->where('editor_pick', 1);
    }

    public function scopeByTitle($query, $title)
    {
        return $query->whereRaw('LOWER(`'.$title.'`)', strtolower($title));
    }

    public function scopePicks($query)
    {
        // return $query->where('editor_pick', 1)->orderBy('title')->get();
    }

    public function scopeSearch($query, $word)
    {
        return $query
            ->where('title', 'LIKE', "%$word%")
            ->orWhere('content', 'LIKE', "%$word%")
            ->orWhereHas('authors', function($query) use ($word) {
                $query->where('first_name', 'LIKE', "%$word%")->orWhere('last_name', 'LIKE', "%$word%");
            })->orWhereHas('editor', function($query) use ($word) {
                $query->where('first_name', 'LIKE', "%$word%")->orWhere('last_name', 'LIKE', "%$word%");
            })->orWhereHas('category', function($query) use ($word) {
                $query->where('name', 'LIKE', "%$word%");
            })->orWhereHas('tags', function($query) use ($word) {
                $query->where('name', 'LIKE', "%$word%");
            });
    }

    // public function scopeRecords($query, $length)
    // {
    //     return $query->selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
    //         ->whereRaw('created_at >= DATE_ADD(LAST_DAY(DATE_SUB(NOW(), INTERVAL '.$length.')), INTERVAL 1 DAY) and created_at <= NOW()')
    //         ->groupBy('year', 'month')
    //         ->orderByRaw('min(created_at) asc')
    //         ->get();
    // }
}
