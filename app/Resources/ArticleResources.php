<?php

namespace App\Resources;

use Illuminate\Support\Collection;
use App\{Article, Tag};
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
        $collection = $this->model->tags()->inRandomOrder()->first() ?? $this->model->category;
    
        $results = $collection->articles()->with(['category', 'authors'])->where('slug', '!=', $this->model->slug);

        if ($results->exists())
            return $results->first();

        return $this->model->category->articles()->with(['category', 'authors'])->where('slug', '!=', $this->model->slug)->first();
    }

    public function suggestions()
    {
        $collection = Tag::with('articles')->whereIn('id', $this->model->tags->pluck('id'))
                                               ->get()
                                               ->pluck('articles')
                                               ->flatten()
                                               ->unique('id')
                                               ->where('id', '!=', $this->model->id)
                                               ->take(5);
        
        return $collection->isEmpty() ? 
            Article::with(['category', 'authors'])->published()->except($this->model)->inRandomOrder()->take(5)->get() : 
            $collection;
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

    public function generateVolume($created_at = null)
    {
        $date = $created_at ?? \Carbon\Carbon::now();

        return $date->year - 2014;
    }

    public function generateIssue($created_at = null)
    {
        $date = $created_at ?? \Carbon\Carbon::now();

        $issue = 0;

        if ($date->month >= 1 && $date->month <= 3) {
            $issue += 1;
        } else if ($date->month >= 4 && $date->month <= 6) {
            $issue += 2;
        } else if ($date->month >= 7 && $date->month <= 9) {
            $issue += 3;
        } else if ($date->month >= 10 && $date->month <= 12) {
            $issue += 4;
        }

        return $issue;
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
