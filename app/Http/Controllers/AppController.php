<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function breaks()
    {
        $articles = Article::orderBy('created_at', 'DESC')->get();
    	foreach ($articles as $break) {
    		// Add image
            if (File::exists("storage/app/breaks/images/$break->slug")) {
	    		$file = File::allFiles("storage/app/breaks/images/$break->slug");
	    		$path = (count($file)) ? asset($file[0]): 'no-image';
	    		$break->image_path = $path;
    		}

    	}
        return $articles;
    }

    // public function breakers()
    // {
    //     $pivotQuery = ['article_id as break_id'];
    //     $authorsQuery = ['first_name', 'last_name', 'position', 'research_institute', 'relevance_order'];

    //     $breakers = DB::table('article_author')
    //     ->select(array_merge($pivotQuery, $authorsQuery))
    //     ->leftJoin('authors', 'article_author.author_id', '=', 'authors.id')
    //     ->get();
    //     return $breakers;
    // }

    public function picks()
    {
    	$articles = Article::editorPicks()->get();
    	
    	foreach ($articles as $break) {
    		if (File::exists("storage/app/breaks/images/$break->slug")) {
	    		$file = File::allFiles("storage/app/breaks/images/$break->slug");
	    		$path = (count($file)) ? asset($file[0]): 'no-image';
	    		$break->image_path = $path;
    		}
    	}
    	
    	return $articles;
    }

    // public function tags()
    // {
    // 	$pivotQuery = ['article_id as break_id'];
    // 	$tagsQuery = ['tags.name', 'tags.id'];

    // 	$breakers = DB::table('article_tag')
    // 	->select(array_merge($pivotQuery, $tagsQuery))
    // 	->leftJoin('tags', 'article_tag.tag_id', '=', 'tags.id')
    // 	->get();
    // 	return $breakers;
    // }

    public function suggestions(Request $request)
    {
        $article = Article::find($request->id);

        if (!isset($article)) {
            return null;
        }

        $articles = $article->resources()->suggestions();

        foreach ($articles as $break) {
            if (File::exists("storage/app/breaks/images/$break->slug")) {
                $file = File::allFiles("storage/app/breaks/images/$break->slug");
                $path = (count($file)) ? asset($file[0]): 'no-image';
                $break->image_path = $path;
            }
        }

        return $articles;
    }
}
