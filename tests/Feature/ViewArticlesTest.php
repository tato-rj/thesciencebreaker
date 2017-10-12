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
    	$this->get('/')->assertSee($this->article->title);
    }

    /** @test */
    public function guests_can_read_a_break()
    {
    	$article = $this->article;
    	$this->get("/breaks/{$article->category->name}/{$article->id}")->assertSee($this->article->title);
    }

}