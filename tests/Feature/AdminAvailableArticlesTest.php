<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Article;

class AdminAvailableArticlesTest extends TestCase
{
	use DatabaseMigrations;

    /** @test */
    public function a_manager_can_add_available_articles()
    {
        $this->signIn();

        $this->post('/admin/available-articles', [
            'article' => 'Article Here',
            'category_id' => 1
        ])->assertSessionHas('db_feedback');

        $this->assertDatabaseHas('available_articles', [
            'article' => 'Article Here'
        ]);
    }

    /** @test */
    public function a_manager_can_remove_an_available_article()
    {
        $this->signIn();
        $article = $this->available_article;

        $this->delete('/admin/available-articles/'.$article->id)->assertSessionHas('db_feedback');

        $this->assertDatabaseMissing('available_articles', [
            'id' => $article->id
        ]);
    }

    /** @test */
    public function a_manager_can_edit_an_available_article()
    {
        $this->signIn();
        $article = $this->available_article;

        $this->patch('/admin/available-articles/'.$article->id, [
            'article' => 'This is my new article',
            'category_id' => $article->category_id
        ])->assertSessionHas('db_feedback');

        $this->assertDatabaseHas('available_articles', [
            'article' => 'This is my new article'
        ])->assertDatabaseMissing('available_articles', [
            'article' => $article->article
        ]);
    }
}