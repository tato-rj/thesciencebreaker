<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UserRoutesTest extends TestCase
{
	use DatabaseMigrations;

    /** @test */
    public function all_get_requests_work()
    {
        $this->signIn();

    	$routes = [
            '/admin/dashboard',
            '/admin/breaks/add',
            '/admin/breaks/edit',
            '/admin/breaks/'.$this->article->slug.'/edit',
            '/admin/breaks/delete',
            '/admin/breakers/add',
            '/admin/breakers/edit',
            '/admin/breakers/'.$this->author->slug.'/edit',
            '/admin/breakers/delete',
            '/admin/managers/add',
            '/admin/managers/edit',
            '/admin/managers/'.$this->manager->slug.'/edit',
            '/admin/managers/delete',
            '/admin/available-articles',
            '/admin/editor-picks',
            '/admin/highlights',
            '/admin/subscriptions',
            '/admin/tags'
    	];

        factory('App\Highlight', 10)->create();
        
        foreach ($routes as $route) {
	        $this->get($route)->assertSuccessful();        	
        }
    }
}
