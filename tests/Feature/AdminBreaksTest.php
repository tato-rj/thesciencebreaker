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

        $this->post('/admin/breaks', [
            'title' => 'New Break',
            'content' => '<p>My content</p>',
            'reading_time' => '3.5',
            'original_article' => 'article',
            'category_id' => '1',
            'editor_id' => '1',
            'editor_pick' => '0'
        ])->assertSessionHas('break_feedback');

        $this->assertDatabaseHas('articles', [
            'title' => 'New Break'
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

        $this->delete('/admin/breaks/'.$break->id)->assertSessionHas('break_feedback');

        $this->assertDatabaseMissing('articles', [
            'id' => $break->id
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

        $this->patch('/admin/breaks/'.$break->id, ['title' => 'A new title'])->assertSessionHas('break_feedback');

        $this->assertDatabaseHas('articles', [
            'title' => 'A new title'
        ])->assertDatabaseMissing('articles', [
            'title' => $break->title
        ]);
    }
}