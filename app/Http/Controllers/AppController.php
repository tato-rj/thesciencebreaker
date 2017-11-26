<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AppController extends Controller
{
    public function breaks()
    {
    	$articlesQuery = ['articles.id as break_id', 'title', 'views', 'articles.slug as article_slug', 'content', 'reading_time', 'original_article', 'doi as imzy_link', 'articles.created_at as date_created'];
    	$categoriesQuery = ['categories.id as category_id', 'name as category_name', 'categories.slug as category_slug'];
    	$managersQuery = ['managers.id as editor_id', 'managers.first_name as editor_first_name', 'managers.last_name as editor_last_name', 'managers.position as editor_position'];

    	$breaks = DB::table('articles')
    	->select(array_merge($articlesQuery, $categoriesQuery, $managersQuery))
    	->leftJoin('categories', 'articles.category_id', '=', 'categories.id')
    	->leftJoin('managers', 'articles.editor_id', '=', 'managers.id')
    	->orderBy('articles.created_at', 'DESC')
    	->get();
 
    	foreach ($breaks as $break) {
    		if (File::exists("storage/app/breaks/images/$break->article_slug")) {
	    		$file = File::allFiles("storage/app/breaks/images/$break->article_slug");
	    		$path = (count($file)) ? asset($file[0]): 'no-image';
	    		$break->image = $path;
    		}
    	}

    	return $breaks;
    }

    public function picks()
    {
    	$articlesQuery = ['articles.id as break_id', 'title', 'articles.slug as article_slug', 'views', 'articles.slug as article_slug', 'content', 'reading_time', 'original_article', 'doi as imzy_link', 'articles.created_at as date_created'];
    	$categoriesQuery = ['categories.id as category_id', 'name as category_name', 'categories.slug as category_slug'];
    	$managersQuery = ['managers.id as editor_id', 'managers.first_name as editor_first_name', 'managers.last_name as editor_last_name', 'managers.position as editor_position'];

    	$breaks = DB::table('articles')
    	->select(array_merge($articlesQuery, $categoriesQuery, $managersQuery))
    	->where('editor_pick', 1)
    	->leftJoin('categories', 'articles.category_id', '=', 'categories.id')
    	->leftJoin('managers', 'articles.editor_id', '=', 'managers.id')
    	->orderBy('articles.created_at')
    	->get();
    	
    	foreach ($breaks as $break) {
    		if (File::exists("storage/app/breaks/images/$break->article_slug")) {
	    		$file = File::allFiles("storage/app/breaks/images/$break->article_slug");
	    		$path = (count($file)) ? asset($file[0]): 'no-image';
	    		$break->image = $path;
    		}
    	}
    	
    	return $breaks;
    }

    public function breakers()
    {
    	$pivotQuery = ['article_id as break_id'];
    	$authorsQuery = ['first_name', 'last_name', 'position', 'research_institute', 'relevance_order'];

    	$breakers = DB::table('article_author')
    	->select(array_merge($pivotQuery, $authorsQuery))
    	->leftJoin('authors', 'article_author.author_id', '=', 'authors.id')
    	->get();
    	return $breakers;
    }

    public function tags()
    {
    	$pivotQuery = ['article_id as break_id'];
    	$tagsQuery = ['tags.name', 'tags.id'];

    	$breakers = DB::table('article_tag')
    	->select(array_merge($pivotQuery, $tagsQuery))
    	->leftJoin('tags', 'article_tag.tag_id', '=', 'tags.id')
    	->get();
    	return $breakers;
    }
}
