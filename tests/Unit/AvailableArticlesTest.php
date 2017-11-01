<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AvailableArticlesTest extends TestCase
{
	use DatabaseMigrations;

    /** @test */
    public function guests_can_see_available_articles()
    {
    	$available_article = factory('App\AvailableArticle')->create();
        $this->get('/available-articles')->assertSee($available_article->article);
    }

}