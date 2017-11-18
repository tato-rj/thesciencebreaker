<?php

namespace App\Providers;

use App\Category;
use App\Article;
use App\Tag;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        \View::composer('*', function($view) {
            $view->with('categories', Category::orderBy('name')->get());
            $view->with('popular', Article::popular(6)->get());
            $view->with('tagsList', Tag::list());
        });
        
        \View::composer('partials.side-bar', function($view) {
            $view->with('editor_picks', Article::editorPicks()->get());  
        });

        \View::composer('pages.welcome', function($view) {
            $view->with('latest_articles', Article::recent(5)->get());
        });

        \View::composer('pages.newWelcome', function($view) {
            $view->with('highlights', Article::recent(7)->get());
            $view->with('latest_articles', Article::recent(5)->get());
        });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
