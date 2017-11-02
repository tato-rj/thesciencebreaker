<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class TagsTest extends TestCase
{

	use DatabaseMigrations;

    /** @test */
    public function a_tag_can_have_many_articles()
    {
        $tag = $this->tag;
        $article = $this->article;
        $second_article = factory('App\Article')->create();
        $article->tags()->attach($tag);
        $second_article->tags()->attach($tag);

        $this->assertEquals(2, count($tag->articles));
    }

    /** @test */
    public function a_manager_can_create_new_tags()
    {
        $this->post('/admin/tags', [
            'tag' => 'new tag'
        ]);

        $this->assertDatabaseHas('tags', [
            'name' => 'new tag'
        ]);
    }

    /** @test */
    public function a_manager_can_remove_tags()
    {
        $tag = $this->tag;
        $this->delete("/admin/tags/$tag->name");

        $this->assertDatabaseMissing('tags', [
            'name' => $tag->name
        ]);
    }

    /** @test */
    public function a_removed_tag_also_removes_its_relationships_with_articles()
    {
        $tag = $this->tag;
        $article = $this->article;
        $article->tags()->attach($tag);

        $this->assertDatabaseHas('article_tag', [
            'article_id' => $article->id
        ]);

        $this->delete("/admin/tags/$tag->name");

        $this->assertDatabaseMissing('article_tag', [
            'article_id' => $article->id
        ]);
    }

    /** @test */
    public function a_guest_can_view_all_breaks_from_a_tag()
    {
        $tag = $this->tag;
        $article = $this->article;
        $article->tags()->attach($tag);
        $this->get("/tags/$tag->name")->assertSee($article->title);
    }
}
