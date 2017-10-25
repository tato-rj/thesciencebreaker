<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

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

}