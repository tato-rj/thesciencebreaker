<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class GuestRoutesTest extends TestCase
{
	use DatabaseMigrations;

    /** @test */
    public function all_get_requests_work()
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
    		'/contact/submit-your-break',
    		'/app/breaks',
    		'/app/picks',
    		'/app/tags',
    		'/app/breakers'
    	];

        factory('App\Highlight', 10)->create();
        
        foreach ($routes as $route) {
	        $this->get($route)->assertSuccessful();        	
        }
    }
}
