<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CategoriesTest extends TestCase
{

	use DatabaseMigrations;

    /** @test */
    public function a_category_can_have_many_articles()
    {
        $category = $this->category;
        $article = $this->article;
        $second_article = factory('App\Article')->create([
            'category_id' => $category->id
        ]);

        $this->assertEquals(2, count($category->articles));
    }

    /** @test */
    public function guests_can_browse_through_all_breaks_from_a_category()
    {
        $category = $this->category;
        $article_one = $this->article;
        $article_two = factory('App\Article')->create([
            'category_id' => $category->id
        ]);
        $article_three = factory('App\Article')->create([
            'category_id' => $category->id
        ]);

        $this->get("{$category->path()}")
            ->assertSee($article_one->title)
            ->assertSee($article_two->title)
            ->assertSee($article_three->title);
    }
}
