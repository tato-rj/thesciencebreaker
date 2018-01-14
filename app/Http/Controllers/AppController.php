<?php

namespace App\Http\Controllers;

use App\Article;
use App\Highlight;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function breaks()
    {
        $articles = Article::orderBy('created_at', 'DESC')->get();
        $this->addImage($articles);
        return $articles;
    }

    public function home()
    {
        $results = [];
        $results['latest'] = $this->latest();
        $results['highlights'] = $this->highlights();
        $results['popular'] = $this->popular();
        
        return $results;
    }

    public function highlights()
    {
        $articles = [];
        $highlights = Highlight::orderBy('relevance_order')->get();
        foreach ($highlights as $highlight) {
            array_push($articles, $highlight->article);
        }

        $this->addImage($articles);
        return $articles;
    }

    public function popular()
    {
        $articles = Article::popular(7)->get();

        $this->addImage($articles);
        return $articles;
    }

    public function latest()
    {
        $articles = Article::recent(7)->get();

        $this->addImage($articles);
        return $articles;
    }

    public function picks()
    {
    	$articles = Article::editorPicks()->get();
        $this->addImage($articles);
    	return $articles;
    }

    public function suggestions(Request $request)
    {
        $article = Article::find($request->id);

        if (!isset($article)) {
            return null;
        }

        $articles = $article->resources()->suggestions();
        $this->addImage($articles);

        return $articles;
    }

    public function addImage($collection)
    {
        foreach ($collection as $break) {
            if (File::exists("storage/app/breaks/images/$break->slug")) {
                $file = File::allFiles("storage/app/breaks/images/$break->slug");
                $path = (count($file)) ? asset($file[0]): 'no-image';
                $break->image_path = $path;
            }
        }      
    }
}
