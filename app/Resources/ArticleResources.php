<?php

namespace App\Resources;

use Illuminate\Support\Collection;
use App\Article;
use App;

class ArticleResources extends Resources
{
    public function tagsIds()
    {
        return $this->model->tags->pluck('id')->toArray();
    }

    public function tagsList()
    {
        $tagsList = '';
        foreach ($this->model->tags as $tag) {
            $tagsList .= $tag->name.', ';
        }
        $tagsList = substr($tagsList, 0, -2);
        return $tagsList;
    }
    
    public function authorsIds()
    {
        return $this->model->authors->pluck('id')->toArray();
    }

    public function authorsList()
    {
        $namesList = '';
        foreach ($this->model->authors as $author) {
            $namesList .= $author->resources()->fullName().', ';
        }
        $namesList = substr($namesList, 0, -2);
        return $namesList;
    }

    public function preview()
    {
        $pieces = explode(" ", strip_tags($this->model->content, '<br>'));
        return implode(" ", array_splice($pieces, 0, 45));
    }

    public function nextRead()
    {
        if (count($this->model->tags)) {
            $collection = $this->model->tags()->inRandomOrder()->first();
        } else {
            $collection = $this->model->category;
        }

        $results = $collection->articles->where('slug', '!=', $this->model->slug);
        
        if (count($results)) {
            return $results->first();
        }

        return $this->model->category->articles->where('slug', '!=', $this->model->slug)->first();
    }

    public function suggestions()
    {
        $collection = [];
        foreach ($this->model->tags as $tag) {
            foreach ($tag->articles as $article) {
                ($article->id != $this->model->id) ? array_push($collection, $article) : null;
            }
        }
        array_unique($collection);
        if (count($collection) > 4) {
            $collection = array_slice($collection, 0, 4);
        }
        return (count($collection)) ? $collection : Article::inRandomOrder()->take(4)->get();
    }

    public function createDoi()
    {
        $doi_base = "https://doi.org/10.25250/thescbr.brk";
        $last_doi = $this->model::orderBy('id', 'desc')->first()->doi;
        $current_number = (int)substr($last_doi, -3);        
        $current_number+=1;
        $doi_number = str_pad($current_number, 3, '0', STR_PAD_LEFT);
        
        return $doi_base.$doi_number;
    }

    public function localize($input)
    {
        $column = $input.'_'.App::getLocale();
        $request = ($this->model->$column) ? $this->model->$column : $this->model->$input;
        return $request;   
    }

    // public static function highlights()
    // {
    //     return self::where('highlight', 1)->orderBy('title')->get();
    // }

    // public static function last()
    // {
    //     return self::orderBy('id', 'desc')->first();
    // }

    // public static function random()
    // {
    //     return self::inRandomOrder()->first();
    // }

    // public static function generateSlugs()
    // {
    //     foreach ($this->model::all() as $model) {
    //         $model->update([
    //             'slug' => str_slug($model->title)
    //         ]);
    //     }
    // }
}
