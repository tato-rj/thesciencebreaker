<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class GuestRoutesTest extends TestCase
{
	use DatabaseMigrations;

    /** @test */
    public function all_web_get_requests_work()
    {
    	$routes = [
    		'/',
    		'/breaks/'.$this->category->slug.'/'.$this->article->slug,
    		'/breakers/'.$this->author->slug,
    		'/core-team/'.$this->manager->slug,
    		'/breaks/'.$this->category->slug,
    		'/tags/'.$this->tag->name,
    		'/search',
    		'/unsubscribe',
    		'/services/feed',
    		'/about',
    		'/mission',
    		'/the-team',
    		'/breakers',
    		'/partners',
    		'/information',
    		'/faq',
    		'/available-articles',
    		'/contact/ask-a-question',
    		'/contact/break-inquiry',
    		'/contact/submit-your-break',
    		'/contact/ask-a-question',
    		'/contact/break-inquiry',
    		'/contact/submit-your-break'
    	];

        factory('App\Highlight', 10)->create();
        
        check($this, $routes);
    }

    /** @test */
    public function app_routes_work()
    {
        $routes = [
            '/app/breaks',
            '/app/picks',
            '/app/suggestions',
            '/app/highlights',
            '/app/latest',
            '/app/popular'
        ];

        check($this, $routes);
    }
}
