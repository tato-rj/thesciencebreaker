<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Article;

class AdminManagersTest extends TestCase
{
	use DatabaseMigrations;

    /** @test */
    public function a_manager_can_add_a_new_team_member()
    {
        $this->signIn();

        $this->post('/admin/managers', [
            'first_name' => 'Bart',
            'last_name' => 'Simpson',
            'email' => 'bart@email.com',
            'division' => 'web_developer',
            'position' => 'Professor',
            'biography' => 'Bart\'s biography goes here.',
            'research_institute' => 'SU',
            'is_editor' => 0
        ])->assertSessionHas('db_feedback');

        $this->assertDatabaseHas('managers', [
            'first_name' => 'Bart'
        ]);
    }

    /** @test */
    public function a_manager_can_remove_a_team_member()
    {
        $this->signIn();
        $manager = $this->manager;

        $this->delete('/admin/managers/'.$manager->id)->assertSessionHas('db_feedback');

        $this->assertDatabaseMissing('managers', [
            'id' => $manager->id
        ]);
    }

    /** @test */
    public function a_manager_can_view_a_page_to_edit_a_team_member()
    {
        $this->signIn();
        $this->get('/admin/managers/'.$this->manager->id.'/edit')->assertSee($this->manager->first_name);
    }

    /** @test */
    public function a_manager_can_edit_a_team_member()
    {
        $this->signIn();
        $manager = $this->manager;

        $this->patch('/admin/managers/'.$manager->id, [
            'first_name' => 'Lisa',
            'last_name' => $manager->last_name,
            'email' =>$manager->email,
            'division' => $manager->division,
            'position' => $manager->position,
            'biography' => $manager->biography,
            'research_institute' => $manager->research_institute,
            'is_editor' => $manager->is_editor
        ])->assertSessionHas('db_feedback');

        $this->assertDatabaseHas('managers', [
            'first_name' => 'Lisa'
        ])->assertDatabaseMissing('managers', [
            'first_name' => $manager->first_name
        ]);
    }
}