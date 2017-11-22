<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Article;
use App\Highlight;

class AdminSelectionsTest extends TestCase
{
	use DatabaseMigrations;

    /** @test */
    public function a_manager_can_update_the_editors_picks()
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

    /** @test */
    public function a_manager_can_update_the_highlights()
    {
        $this->signIn();
        $highlight = factory('App\Highlight')->create();
        $new_article = factory('App\Article')->create();

        $this->patch('/admin/highlights/'.$highlight->id, [
            'article_id' => $new_article->id
        ])->assertSessionHas('db_feedback');

        $this->assertTrue(Highlight::find($highlight->id)->article_id == $new_article->id);
    }

}