<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Article;

class AdminBreakersTest extends TestCase
{
	use DatabaseMigrations;

    /** @test */
    public function an_authenticated_user_can_add_a_new_breaker()
    {
        $this->signIn();

        $this->post('/admin/breakers', [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john@email.com',
            'position' => 'Professor',
            'research_institute' => 'Yale',
            'field_research' => 'Neurobiology',
            'general_comments' => 'John is a new breaker'
        ])->assertSessionHas('db_feedback');

        $this->assertDatabaseHas('authors', [
            'first_name' => 'John'
        ]);
    }

    // /** @test */
    // public function a_welcome_email_is_sent_to_the_new_breaker()
    // {
    //     // SEND EMAIL
    // }

    /** @test */
    public function an_authenticated_user_can_remove_a_breaker()
    {
        $this->signIn();
        $author = $this->author;

        $this->delete('/admin/breakers/'.$author->id)->assertSessionHas('db_feedback');

        $this->assertDatabaseMissing('authors', [
            'id' => $author->id
        ]);
    }

    /** @test */
    public function removing_a_breaker_also_removes_its_relationships()
    {
        $this->signIn();
        $author = $this->author;
        $break_id = $author->articles[0]->id;

        $this->delete('/admin/breakers/'.$author->id)->assertSessionHas('db_feedback');

        $this->assertDatabaseMissing('article_author', [
            'article_id' => $break_id
        ]);
    }   

    /** @test */
    public function an_authenticated_user_can_view_a_page_to_edit_a_breaker()
    {
        $this->signIn();
        $this->get('/admin/breakers/'.$this->author->id.'/edit')->assertSee($this->author->first_name);
    }

    /** @test */
    public function an_authenticated_user_can_edit_a_breaker()
    {
        $this->signIn();
        $author = $this->author;

        $this->patch('/admin/breakers/'.$author->id, [
            'first_name' => 'Melissa',
            'last_name' => $author->last_name,
            'email' =>$author->email,
            'position' => $author->position,
            'research_institute' => $author->research_institute,
            'field_research' => $author->field_research,
            'general_comments' => $author->general_comments
        ])->assertSessionHas('db_feedback');

        $this->assertDatabaseHas('authors', [
            'first_name' => 'Melissa'
        ])->assertDatabaseMissing('authors', [
            'first_name' => $author->first_name
        ]);
    }
}