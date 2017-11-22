<?php

namespace Tests\Unit;

use Tests\TestCase;
use Tests\AppAssertions;
use Tests\TestingEmailsListener;
use Tests\MailManagement;
use Carbon\Carbon;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class SubscriptionsTest extends TestCase
{
	use DatabaseMigrations;
    use MailManagement;
    use AppAssertions;

    /** @test */
    public function a_guest_can_be_subscribed_when_submitting_a_question()
    {
        $faker = \Faker\Factory::create();
        $request = [
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'email' => $faker->safeEmail,
                'message' => $faker->paragraph,
                'subscribe_me' => 'on'
            ];

        $this->post('/contact/ask-a-question', $request);
        $this->assertDatabaseHas('subscriptions', [
            'email' => $request['email']
        ]);
    }

    /** @test */
    public function a_guest_can_be_subscribed_when_inquiring_about_a_break()
    {
        $faker = \Faker\Factory::create();
        $request = [
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'email' => $faker->safeEmail,
                'news_from' => $faker->word,
                'article_title' => $faker->sentence,
                'author_name' => $faker->name,
                'article_url' => $faker->url,
                'message' => $faker->paragraph,
                'subscribe_me' => 'on'
            ];

        $this->post('/contact/break-inquiry', $request);
        $this->assertDatabaseHas('subscriptions', [
            'email' => $request['email']
        ]);
    }

    /** @test */
    public function a_guest_can_be_subscribed_when_submitting_a_break()
    {
        $faker = \Faker\Factory::create();

        $request = [
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'institution_email' => $faker->safeEmail,
                'field_research' => $faker->word,
                'research_institute' => $faker->word,
                'original_article' => $faker->url,
                'position' => $faker->word,
                'file' => $file = UploadedFile::fake()->create('document.doc', 20),
                'description' => $faker->sentence,
                'message' => $faker->paragraph,
                'subscribe_me' => 'on'
            ];

        $this->post('/contact/submit-a-break', $request);
        $this->assertDatabaseHas('subscriptions', [
            'email' => $request['institution_email']
        ]);
    }
    
    /** @test */
    public function new_subscriptions_are_ignored_if_duplicated()
    {
        $faker = \Faker\Factory::create();
        $request = [
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'email' => $this->subscription->email,
                'message' => $faker->paragraph,
                'subscribe_me' => 'on'
            ];

        $this->post('/contact/ask-a-question', $request);
        $this->assertDatabaseHas('subscriptions', [
            'email' => $request['email']
        ]);
    }

    /** @test */
    public function a_guest_can_unsubscribe()
    {
        $email = $this->subscription->email;

        $this->delete("/unsubscribe", [
            'email' => $email
        ]);

        $this->assertDatabaseMissing('subscriptions', [
            'email' => $email
        ]);
    }
}
