<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ArticlesTest extends TestCase
{

	use DatabaseMigrations;

    /** @test */
    public function an_article_has_an_editor()
    {
    	$editor = $this->editor;
    	$article = $this->article;

    	$this->assertEquals($this->editor->first_name, $this->article->editor->first_name);
    }

    /** @test */
    public function articles_can_have_one_or_more_authors()
    {
    	$article = $this->article;
    	$second_author = factory('App\Author')->create();
    	
        factory('App\ArticleAuthor')->create([
    		'article_id' => $article->id,
    		'author_id' => $second_author->id
    	]);

    	$this->assertEquals(2, count($article->authors));
    }

    /** @test */
    public function authors_can_create_one_or_more_articles()
    {
    	$second_article = factory('App\Article')->create();
    	$author = $this->author;
    	
        factory('App\ArticleAuthor')->create([
    		'article_id' => $second_article->id,
    		'author_id' => $author->id
    	]);

    	$this->assertEquals(2, count($author->articles));
    }

    /** @test */
    public function an_article_belongs_to_a_category()
    {
    	$category = $this->category;
    	$article = $this->article;
    	$this->assertEquals($category->name, $article->category->name);
    }
}
