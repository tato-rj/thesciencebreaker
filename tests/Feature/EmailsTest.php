<?php

namespace Tests\Unit;

use Tests\TestCase;
use Tests\AppAssertions;
use Tests\TestingEmailsListener;
use Tests\MailManagement;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class EmailsTest extends TestCase
{
	use DatabaseMigrations;
    use MailManagement;
    use AppAssertions;

    /** @test */
    public function a_new_breaker_receives_an_email_upon_registration()
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
        ]);

        $this->seeEmailWasSent()->seeEmailTo('john@email.com')->seeEmailSubjectIs('Welcome to TheScienceBreaker!')->seeEmailContains("Hello John");
    }

    /** @test */
    public function breakers_receive_an_email_when_their_new_break_is_published()
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
        ]);  

        $this->seeEmailWasSent();
        $this->seeEmailTo($breaker_one->email)->seeEmailSubjectIs('Break published', 1)->seeEmailContains("Congratulations $breaker_one->first_name");
        $this->seeEmailTo($breaker_two->email)->seeEmailSubjectIs('Break published', 2)->seeEmailContains("Congratulations $breaker_two->first_name");
    }

    /** @test */
    public function editors_receive_an_email_when_a_their_new_break_is_published()
    {
        $this->signIn();

        $editor = factory('App\Manager')->create([
            'is_editor' => 1
        ]);

        $this->post('/admin/breaks', [
            'title' => 'New Break',
            'content' => '<p>My content</p>',
            'authors' => [
                $this->author->id
            ],
            'reading_time' => '3.5',
            'original_article' => 'article',
            'category_id' => '1',
            'editor_id' => $editor->id,
            'editor_pick' => '0'
        ]);  

        $this->seeEmailWasSent()->seeEmailTo($editor->email)->seeEmailContains("$editor->first_name");
    }

}
