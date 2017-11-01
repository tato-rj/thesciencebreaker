<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AuthorsTest extends TestCase
{

	use DatabaseMigrations;

    /** @test */
    public function authors_can_have_more_than_one_article()
    {
    	$second_article = factory('App\Article')->create();
    	$author = $this->author;
    	
        factory('App\ArticleAuthor')->create([
    		'article_id' => $second_article->id,
    		'author_id' => $author->id
    	]);

    	$this->assertEquals(2, count($author->articles));
    }
}
