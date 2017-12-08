<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class LocalizationTest extends TestCase
{
	use DatabaseMigrations;

    /** @test */
    public function website_shows_user_preferred_language()
    {
        createHighlights();
        localize('fr');
        $this->get('/')->assertSee('Pourquoi TheScienceBreaker?');
    }

    /** @test */
    public function an_article_shows_default_english_title_if_translation_is_empty()
    {
        createHighlights();
        localize('fr');
        $article = $this->article;
        // At this point there is no french title
        $this->get($article->paths()->route())->assertSee($article->title);
        $article->title_fr = 'Title in french';
        $article->save();
        // Now there is a title in french
        $this->get($article->paths()->route())->assertSee($article->title_fr);
    }

    /** @test */
    public function an_article_shows_default_english_description_if_translation_is_empty()
    {
        createHighlights();
        localize('fr');
        $article = $this->article;
        // At this point there is no french description
        $this->get($article->paths()->route())->assertSee($article->description);
        $article->description_fr = 'Description in french';
        $article->save();
        // Now there is a title in french
        $this->get($article->paths()->route())->assertSee($article->description_fr);
    }

    /** @test */
    public function an_article_shows_default_english_content_if_translation_is_empty()
    {
        createHighlights();
        localize('fr');
        $article = $this->article;
        // At this point there is no french content
        $this->get($article->paths()->route())->assertSee($article->content);
        $article->content_fr = 'Content in french';
        $article->save();
        // Now there is a title in french
        $this->get($article->paths()->route())->assertSee($article->content_fr);
    }
}
