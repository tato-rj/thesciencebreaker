<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ArticlesTest extends TestCase
{

	use DatabaseMigrations;

    /** @test */
    public function an_article_belongs_to_a_category()
    {
        $category = $this->category;
        $article = $this->article;
        $this->assertEquals($category->name, $article->category->name);
    }

    /** @test */
    public function an_article_can_have_may_tags()
    {
        $tag = $this->tag;
        $second_tag = factory('App\Tag')->create();
        $article = $this->article;

        $article->tags()->attach($tag);
        $article->tags()->attach($second_tag);

        $this->assertEquals(2, count($article->tags));
    }

    /** @test */
    public function an_article_has_an_editor()
    {
    	$editor = $this->editor;
    	$article = $this->article;

    	$this->assertEquals($this->editor->first_name, $this->article->editor->first_name);
    }

    /** @test */
    public function articles_can_have_one_or_more_authors()
    {
    	$article = $this->article;
    	$second_author = factory('App\Author')->create();
    	
        factory('App\ArticleAuthor')->create([
    		'article_id' => $article->id,
    		'author_id' => $second_author->id
    	]);

    	$this->assertEquals(2, count($article->authors));
    }

    /** @test */
    public function welcome_page_shows_latest_articles()
    {
        factory('App\Highlight', 10)->create();
        $this->get('/')->assertSee($this->article->title);
    }

    /** @test */
    public function article_page_shows_the_description()
    {
        factory('App\Highlight', 10)->create();
        $this->get($this->article->path())->assertSee($this->article->description);
    }
    
    /** @test */
    public function guests_can_read_an_article()
    {
        factory('App\Highlight', 10)->create();
        $this->get($this->article->path())->assertSee($this->article->title);
    }

    /** @test */
    public function guests_can_view_tags_on_the_article_page()
    {
        factory('App\Article', 10)->create();
        $article = $this->article;
        $article->tags()->attach($this->tag);

        $this->get($article->path())->assertSee($article->tags->first()->name);
    }

    /** @test */
    public function a_guest_see_the_most_popular_articles_on_the_side_bar()
    {
        $popular_article = factory('App\Article')->create([
            'views' => 10
        ]);

        $this->get($this->article->path())->assertSee($popular_article->title);
    }

    /** @test */
    public function a_guest_see_the_cover_image_if_it_exists()
    {
        $this->signIn();
        $faker = \Faker\Factory::create();
        $title = $faker->sentence;
        $slug = str_slug($title);
        $category = $this->category;

        $article = $this->post('/admin/breaks', [
            'title' => $title,
            'content' => $faker->paragraph,
            'reading_time' => $faker->randomDigitNotNull,
            'original_article' => $faker->sentence,
            'category_id' => $category->id,
            'editor_id' => 1,
            'doi' => $faker->url,
            'editor_pick' => '0',
            'authors' => [1],
            'image' => UploadedFile::fake()->create('image.jpeg', 200)
        ]);

        $this->get("breaks/$category->slug/$slug")->assertSee("$slug.jpeg");
    }

    /** @test */
    public function an_article_keeps_count_of_viewers()
    {
        $this->assertEquals(0, $this->article->views);
        $this->article->increment('views');
        $this->assertEquals(1, $this->article->views);
    }

}
