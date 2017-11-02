<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class SearchTest extends TestCase
{
	use DatabaseMigrations;

    /** @test */
    public function a_guest_can_find_an_article_searching_for_a_title()
    {
        $article = $this->article;
        $title = explode(' ',trim($article->title));
        $word = $title[0];

        $this->get("/search?for=$word")->assertSee($article->title);
    }

    /** @test */
    public function a_guest_can_find_an_article_searching_for_a_keyword()
    {
        $article = $this->article;
        $content = explode(' ',trim($article->content));
        $word = $content[0];

        $this->get("/search?for=$word")->assertSee($article->title);
    }

    /** @test */
    public function a_guest_can_find_an_article_searching_for_the_authors_name()
    {
        $article = $this->article;
        $author = explode(' ',trim($article->authors()->first()->first_name));
        $name = $author[0];

        $this->get("/search?for=$name")->assertSee($article->title);
    }

    /** @test */
    public function a_guest_can_find_an_article_searching_for_the_editors_name()
    {
        $article = $this->article;
        $editor = explode(' ',trim($article->editor->first_name));
        $name = $editor[0];

        $this->get("/search?for=$name")->assertSee($article->title);
    }

    /** @test */
    public function a_guest_can_find_an_article_searching_for_a_category()
    {
        $article = $this->article;
        $category = explode(' ',trim($article->category->name));
        $category = $category[0];

        $this->get("/search?for=$category")->assertSee($article->title);
    }

    /** @test */
    public function a_guest_can_find_an_article_searching_for_a_tag()
    {
        $article = $this->article;
        $tag = $this->tag;
        $article->tags()->attach($tag);
        $tag = $tag->name;

        $this->get("/search?for=$tag")->assertSee($article->title);
    }
}