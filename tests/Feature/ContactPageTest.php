<?php

namespace Tests\Feature;

use Tests\TestCase;
use Tests\AppAssertions;
use Tests\TestingEmailsListener;
use Tests\MailManagement;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ContactPageTest extends TestCase
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
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'email' => $faker->safeEmail,
                'message' => $faker->paragraph
            ];

        $this->post('/contact/ask-a-question', $request)->assertSessionHas('contact');
        $this->seeEmailWasSent()->seeEmailSubjectIs('New Contact')->seeEmailContains($request['first_name']);
    }

    /** @test */
    public function a_guest_can_send_a_break_inquiry_through_the_contact_page()
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
                'message' => $faker->paragraph
            ];

        $this->post('/contact/break-inquiry', $request)->assertSessionHas('contact');
        $this->seeEmailWasSent()->seeEmailSubjectIs('Break Inquiry')->seeEmailContains($request['first_name']);
    }

    /** @test */
    public function a_guest_can_submit_a_new_break()
    {
        // Storage::fake('test-folder');
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
                'message' => $faker->paragraph
            ];

        $this->post('/contact/submit-a-break', $request)->assertSessionHas('contact');

        Storage::assertExists('uploaded-breaks/'.$request['last_name'].'_'.$request['first_name'].'_break_v1.doc');

        $this->seeEmailWasSent()->seeEmailsSent(2);
        $this->seeEmailTo(config('app.email'))
            ->seeEmailSubjectIs('New Break Submission')
            ->seeEmailContains($request['first_name']);
    }
}
