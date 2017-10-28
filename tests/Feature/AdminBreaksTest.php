<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Article;

class AdminBreaksTest extends TestCase
{
	use DatabaseMigrations;

    /** @test */
    public function an_authenticated_user_can_create_a_new_break()
    {
        $this->signIn();

        $breaker_one = factory('App\Author')->create();
        $breaker_two = factory('App\Author')->create();
        $editor = factory('App\Manager')->create([
            'is_editor' => 1
        ]);

        $this->post('/admin/breaks', [
            'title' => 'New Break',
            'content' => '<p>My content</p>',
            'authors' => [
                $breaker_one->id,
                $breaker_two->id
            ],
            'reading_time' => '3.5',
            'original_article' => 'article',
            'category_id' => '1',
            'editor_id' => $editor->id,
            'editor_pick' => '0'
        ])->assertSessionHas('db_feedback');

        $this->assertDatabaseHas('articles', [
            'title' => 'New Break'
        ])->assertDatabaseHas('article_author', [
            'author_id' => $breaker_one->id,
            'author_id' => $breaker_two->id
        ]);
    }

    /** @test */
    public function a_doi_is_automatically_generated_when_a_new_break_is_created()
    {
        $doi = Article::createDoi();
        
        $new_break = create('App\Article', [
            'doi' => $doi
        ]);

        $this->assertEquals($doi, $new_break->doi);
    }

    /** @test */
    public function an_authenticated_user_can_remove_a_break()
    {
        $this->signIn();
        $break = $this->article;

        $this->delete('/admin/breaks/'.$break->id)->assertSessionHas('db_feedback');

        $this->assertDatabaseMissing('articles', [
            'id' => $break->id
        ]);
    }

    /** @test */
    public function removing_a_break_also_removes_its_relationships()
    {
        $this->signIn();
        $break = $this->article;
        $breaker_id = $break->authors[0]->id;

        $this->delete('/admin/breaks/'.$break->id)->assertSessionHas('db_feedback');

        $this->assertDatabaseMissing('article_author', [
            'author_id' => $breaker_id
        ]);
    }   

    /** @test */
    public function an_authenticated_user_can_view_a_page_to_edit_a_break()
    {
        $this->signIn();
        $this->get('/admin/breaks/'.$this->article->id.'/edit')->assertSee($this->article->title);
    }

    /** @test */
    public function an_authenticated_user_can_edit_a_break()
    {
        $this->signIn();
        $break = $this->article;
        
        $this->patch('/admin/breaks/'.$break->id, [
            'title' => 'A new title',
            'slug' => str_slug('A new title'),
            'content' => $break->content,
            'authors' => [23,34,43],
            'reading_time' =>$break->reading_time,
            'original_article' => $break->original_article,
            'category_id' => $break->category_id,
            'editor_id' => $break->editor_id,
            'doi' => $break->doi,
            'editor_pick' => $break->editor_pick
        ])->assertSessionHas('db_feedback');

        $this->assertDatabaseHas('articles', [
            'title' => 'A new title'
        ])->assertDatabaseMissing('articles', [
            'title' => $break->title
        ])->assertDatabaseHas('article_author', [
            'author_id' => 23,
            'author_id' => 34,
            'author_id' => 43
        ]);
    }
}