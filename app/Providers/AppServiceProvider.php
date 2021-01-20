<?php

namespace App\Providers;

use App\Category;
use App\Article;
use App\Highlight;
use App\Tag;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Lang;
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
            $categories = cache()->rememberForever('categories', function() {
                return Category::orderBy('name')->get();
            });

            $view->with('categories', $categories);
        });

        \View::composer('components/partials/side_bars/suggestions', function($view) {
            $view->with('picks', Article::editorPicks()->get());
            $view->with('popular', Article::popular(6)->get()); 
            $view->with('topics', Tag::orderBy('articles_count', 'DESC')->take(25)->get()); 
        });

        Blade::if('only', function ($group) {
            return \Staff::check(auth()->user()->email)->role($group);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }
}
