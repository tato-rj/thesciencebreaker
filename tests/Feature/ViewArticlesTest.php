<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ViewArticlesTest extends TestCase
{
	use DatabaseMigrations;

    /** @test */
    public function welcome_page_shows_latest_articles()
    {
    	$article = $this->article;

    	$this->get('/')->assertSee($article->title);

    }
}