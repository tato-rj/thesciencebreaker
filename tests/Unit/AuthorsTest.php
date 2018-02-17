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

    /** @test */
    public function authors_have_their_own_page()
    {
        $author = $this->author;

        $this->get($author->paths()->route())->assertSee($author->first_name);
    }

    /** @test */
    public function authors_know_if_they_are_the_original_authors()
    {
        $this->signIn();
        $article = $this->article;
        $new_author = factory('App\Author')->create();
        $article->authors()->save($new_author);
        
        $this->post('/admin/breaks/'.$article->slug.'/breakers-order', [
            'order' => [1,2],
            'is_original_author' => [0,1]
        ]);
        $this->assertEquals(0, $this->author->isOriginalAuthorOf($article->id));
        $this->assertEquals(1, $new_author->isOriginalAuthorOf($article->id));
    }
}
