<?php

namespace Tests\Unit;

use Tests\TestCase;
use Tests\AppAssertions;
use Tests\TestingEmailsListener;
use Tests\MailManagement;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class EmailsTest extends TestCase
{
	use DatabaseMigrations;
    use MailManagement;
    use AppAssertions;

    // CONTACT PAGE INTERACTIONS

    /** @test */
    public function a_guest_can_ask_a_question_through_the_contact_page()
    {
        $faker = \Faker\Factory::create();
        $request = [
                'full_name' => $faker->name,
                'email' => $faker->safeEmail,
                'message' => $faker->paragraph
            ];

        $this->post('/contact/question', $request)->assertSessionHas('contact');
        $this->seeEmailWasSent()->seeEmailSubjectIs('New Contact')->seeEmailContains($request['full_name']);
    }

    /** @test */
    public function a_guest_is_subscribed_when_submitting_a_question()
    {
        $faker = \Faker\Factory::create();
        $request = [
                'full_name' => $faker->name,
                'email' => $faker->safeEmail,
                'message' => $faker->paragraph
            ];

        $this->post('/contact/question', $request);
        $this->assertDatabaseHas('subscriptions', [
            'email' => $request['email']
        ]);
    }

    /** @test */
    public function new_subscriptions_are_ignored_if_duplicated()
    {
        $faker = \Faker\Factory::create();
        $request = [
                'full_name' => $faker->name,
                'email' => $this->subscription->email,
                'message' => $faker->paragraph
            ];

        $this->post('/contact/question', $request);
        $this->assertDatabaseHas('subscriptions', [
            'email' => $request['email']
        ]);
    }

    /** @test */
    public function a_guest_can_send_a_break_inquiry_through_the_contact_page()
    {
        $faker = \Faker\Factory::create();
        $request = [
                'full_name' => $faker->name,
                'email' => $faker->safeEmail,
                'news_from' => $faker->word,
                'article_title' => $faker->sentence,
                'author_name' => $faker->name,
                'article_url' => $faker->url,
                'message' => $faker->paragraph
            ];

        $this->post('/contact/break-inquiry', $request)->assertSessionHas('contact');
        $this->seeEmailWasSent()->seeEmailSubjectIs('Break Inquiry')->seeEmailContains($request['full_name']);
    }

    /** @test */
    public function a_guest_is_subscribed_when_submitting_an_inquiry()
    {
        $faker = \Faker\Factory::create();
        $request = [
                'full_name' => $faker->name,
                'email' => $faker->safeEmail,
                'news_from' => $faker->word,
                'article_title' => $faker->sentence,
                'author_name' => $faker->name,
                'article_url' => $faker->url,
                'message' => $faker->paragraph
            ];

        $this->post('/contact/break-inquiry', $request);
        $this->assertDatabaseHas('subscriptions', [
            'email' => $request['email']
        ]);
    }

    /** @test */
    public function a_guest_can_submit_a_new_break()
    {
        Storage::fake('public');
        $faker = \Faker\Factory::create();

        $request = [
                'full_name' => $faker->name,
                'institution_email' => $faker->safeEmail,
                'field_research' => $faker->word,
                'institute' => $faker->word,
                'original_article' => $faker->url,
                'position' => $faker->word,
                'break' => $file = UploadedFile::fake()->create('document.doc', 20),
                'message' => $faker->paragraph
            ];

        $this->post('/contact/submit', $request)->assertSessionHas('contact');

        Storage::disk('public')->assertExists('breaks/'.$request['institution_email'].'.doc');

        $this->seeEmailWasSent()->seeEmailsSent(2);
        $this->seeEmailTo(config('app.email'))
            ->seeEmailSubjectIs('New Break Submission')
            ->seeEmailContains($request['full_name']);
    }

    /** @test */
    public function a_guest_is_subscribed_when_submitting_a_break()
    {
        $faker = \Faker\Factory::create();

        $request = [
                'full_name' => $faker->name,
                'institution_email' => $faker->safeEmail,
                'field_research' => $faker->word,
                'institute' => $faker->word,
                'original_article' => $faker->url,
                'position' => $faker->word,
                'break' => $file = UploadedFile::fake()->create('document.doc', 20),
                'message' => $faker->paragraph
            ];

        $this->post('/contact/submit', $request);
        $this->assertDatabaseHas('subscriptions', [
            'email' => $request['institution_email']
        ]);
    }

    // GUESTS FEEDBACK

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
    public function a_guest_gets_feedback_upon_submitting_a_question()
    {
        $faker = \Faker\Factory::create();

        $request = [
                'full_name' => $faker->name,
                'email' => $faker->safeEmail,
                'message' => $faker->paragraph
            ];

        $this->post('/contact/question', $request)->assertSessionHas('contact');
        
        $this->seeEmailWasSent()->seeEmailsSent(2);

        $this->seeEmailTo($request['email'])
            ->seeEmailSubjectIs('Your message to TheScienceBreaker')
            ->seeEmailContains('Thank you for your contact');
    }

    /** @test */
    public function a_guest_gets_feedback_upon_submitting_an_inquiry()
    {
        $faker = \Faker\Factory::create();

        $request = [
                'full_name' => $faker->name,
                'email' => $faker->safeEmail,
                'news_from' => $faker->word,
                'article_title' => $faker->sentence,
                'author_name' => $faker->name,
                'article_url' => $faker->url,
                'message' => $faker->paragraph
            ];

        $this->post('/contact/break-inquiry', $request)->assertSessionHas('contact');
        
        $this->seeEmailWasSent()->seeEmailsSent(2);

        $this->seeEmailTo($request['email'])
            ->seeEmailSubjectIs('Your Break inquiry')
            ->seeEmailContains('We have received your Break inquiry');
    }
    
    /** @test */
    public function a_guest_gets_feedback_upon_submitting_a_new_break()
    {
        $faker = \Faker\Factory::create();

        $request = [
                'full_name' => $faker->name,
                'institution_email' => $faker->safeEmail,
                'field_research' => $faker->word,
                'institute' => $faker->word,
                'original_article' => $faker->url,
                'position' => $faker->word,
                'break' => $file = UploadedFile::fake()->create('document.doc', 20),
                'message' => $faker->paragraph
            ];

        $this->post('/contact/submit', $request)->assertSessionHas('contact');
        
        $this->seeEmailWasSent()->seeEmailsSent(2);

        $this->seeEmailTo($request['institution_email'])
            ->seeEmailSubjectIs('Your Break has been submitted!')
            ->seeEmailContains('Thank you for submitting your Break');
    }

    // BREAKERS AND MEMBERS FEEDBACK

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
        $this->seeEmailTo($breaker_one->email)->seeEmailSubjectIs('Break published')->seeEmailContains("Congratulations $breaker_one->first_name");
        $this->seeEmailTo($breaker_two->email)->seeEmailSubjectIs('Break published')->seeEmailContains("Congratulations $breaker_two->first_name");
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
