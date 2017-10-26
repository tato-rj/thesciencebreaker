<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Article;

class AdminEditorPicksTest extends TestCase
{
	use DatabaseMigrations;

    /** @test */
    public function an_authenticated_user_can_view_all_picks()
    {
        $this->signIn();
        $pick = factory('App\Article')->create(['editor_pick' => 1]);

        $this->get('/admin/editor-picks')->assertSee($pick->title);
    }

    /** @test */
    public function a_pick_can_be_updated()
    {
        $this->signIn();
        $old_pick = factory('App\Article')->create(['editor_pick' => 1]);
        $new_pick = factory('App\Article')->create(['editor_pick' => 0]);

        $this->patch('/admin/editor-picks/'.$old_pick->id, [
            'pick' => $new_pick->id
        ])->assertSessionHas('db_feedback');

        $this->assertTrue(Article::find($old_pick->id)->editor_pick == 0);
        $this->assertTrue(Article::find($new_pick->id)->editor_pick == 1);
    }
}