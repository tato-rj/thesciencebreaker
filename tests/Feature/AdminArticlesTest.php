<?php

namespace Tests\Feature;

use App\ArticleAuthor;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AdminArticlesTest extends TestCase
{
	use DatabaseMigrations;

    /** @test */
    public function a_manager_can_add_a_new_article()
    {
        $this->signIn();
        $faker = \Faker\Factory::create();
        $title = $faker->sentence;

        $this->post('/admin/breaks', [
            'title' => $title,
            'content' => $faker->paragraph,
            'reading_time' => $faker->randomDigitNotNull,
            'original_article' => $faker->sentence,
            'category_id' => 1,
            'editor_id' => 1,
            'doi' => $faker->url,
            'editor_pick' => '0',
            'authors' => [1]
        ])->assertSessionHas('db_feedback');

        $this->assertDatabaseHas('articles', [
            'title' => $title
        ]);
    }

    /** @test */
    public function a_manager_can_upload_a_pdf_when_adding_a_new_article()
    {
        $this->signIn();
        $faker = \Faker\Factory::create();
        $title = $faker->sentence;

        $this->post('/admin/breaks', [
            'title' => $title,
            'content' => $faker->paragraph,
            'reading_time' => $faker->randomDigitNotNull,
            'original_article' => $faker->sentence,
            'category_id' => 1,
            'editor_id' => 1,
            'doi' => $faker->url,
            'editor_pick' => '0',
            'authors' => [1],
            'pdf' => $file = UploadedFile::fake()->create('document.pdf', 20)
        ]);

        Storage::assertExists('breaks/'.str_slug($title).'.pdf');
    }

    /** @test */
    public function a_manager_can_upload_a_cover_image_when_adding_a_new_article()
    {
        $this->signIn();
        $faker = \Faker\Factory::create();
        $title = $faker->sentence;
        $slug = str_slug($title);

        $this->post('/admin/breaks', [
            'title' => $title,
            'content' => $faker->paragraph,
            'reading_time' => $faker->randomDigitNotNull,
            'original_article' => $faker->sentence,
            'category_id' => 1,
            'editor_id' => 1,
            'doi' => $faker->url,
            'editor_pick' => '0',
            'authors' => [1],
            'image' => UploadedFile::fake()->create('image.jpeg', 200)
        ]);

        Storage::assertExists('breaks/images/'.$slug.'/'.$slug.'.jpeg');
    }

    /** @test */
    public function a_manager_can_remove_an_article()
    {
        $this->signIn();
        $article = $this->article;

        $this->delete('/admin/breaks/'.$article->slug)->assertSessionHas('db_feedback');

        $this->assertDatabaseMissing('articles', [
            'id' => $article->id
        ]);
    }

    /** @test */
    public function removing_an_article_also_removes_its_relationships()
    {
        $this->signIn();
        $article = $this->article;
        $author_id = $article->authors[0]->id;
        $this->delete('/admin/breaks/'.$article->slug)->assertSessionHas('db_feedback');

        $this->assertDatabaseMissing('article_author', [
            'author_id' => $author_id
        ]);
    }   

    /** @test */
    public function a_pdf_is_removed_along_with_a_removed_article()
    {
        $this->signIn();
        $faker = \Faker\Factory::create();
        $title = $faker->sentence;
        $article = $this->post('/admin/breaks', [
            'title' => $title,
            'content' => $faker->paragraph,
            'reading_time' => $faker->randomDigitNotNull,
            'original_article' => $faker->sentence,
            'category_id' => 1,
            'editor_id' => 1,
            'doi' => $faker->url,
            'editor_pick' => '0',
            'authors' => [1],
            'pdf' => $file = UploadedFile::fake()->create('document.pdf', 20)
        ]);
        Storage::assertExists('breaks/'.str_slug($title).'.pdf');

        $this->delete('/admin/breaks/'.str_slug($title));
        
        Storage::assertMissing('breaks/'.str_slug($title).'.pdf');
    }

    /** @test */
    public function a_cover_image_is_removed_along_with_a_removed_article()
    {
        $this->signIn();
        $faker = \Faker\Factory::create();
        $title = $faker->sentence;
        $slug = str_slug($title);

        $article = $this->post('/admin/breaks', [
            'title' => $title,
            'content' => $faker->paragraph,
            'reading_time' => $faker->randomDigitNotNull,
            'original_article' => $faker->sentence,
            'category_id' => 1,
            'editor_id' => 1,
            'doi' => $faker->url,
            'editor_pick' => '0',
            'authors' => [1],
            'image' => $file = UploadedFile::fake()->create('image.jpeg', 20)
        ]);
        Storage::assertExists('breaks/images/'.$slug.'/'.$slug.'.jpeg');

        $this->delete('/admin/breaks/'.$slug);
        
        Storage::assertMissing('breaks/images/'.$slug.'/'.$slug.'.jpeg');
    }

    /** @test */
    public function a_manager_can_remove_a_cover_image()
    {
        $this->signIn();
        $faker = \Faker\Factory::create();
        $title = $faker->sentence;
        $slug = str_slug($title);

        $article = $this->post('/admin/breaks', [
            'title' => $title,
            'content' => $faker->paragraph,
            'reading_time' => $faker->randomDigitNotNull,
            'original_article' => $faker->sentence,
            'category_id' => 1,
            'editor_id' => 1,
            'doi' => $faker->url,
            'editor_pick' => '0',
            'authors' => [1],
            'image' => $file = UploadedFile::fake()->create('image.jpeg', 20)
        ]);
        Storage::assertExists('breaks/images/'.$slug.'/'.$slug.'.jpeg');

        $this->delete('/admin/breaks/images/'.$slug);
        
        Storage::assertMissing('breaks/images/'.$slug.'/'.$slug.'.jpeg');
    }

    /** @test */
    public function a_manager_can_edit_an_article()
    {
        $this->signIn();
        $article = $this->article;
        $new_author = factory('App\Author')->create();

        $this->patch('/admin/breaks/'.$article->slug, [
            'title' => 'New title',
            'content' => $article->content,
            'reading_time' =>$article->reading_time,
            'original_article' => $article->original_article,
            'category_id' => $article->category_id,
            'editor_id' => $article->editor_id,
            'doi' => $article->doi,
            'editor_pick' => $article->editor_pick,
            'authors' => [1, $new_author->id]
        ])->assertSessionHas('db_feedback');

        $this->assertDatabaseHas('articles', [
            'title' => 'New title'
        ])->assertDatabaseMissing('articles', [
            'title' => $article->title
        ]);
    }

    /** @test */
    public function a_manager_can_reorder_the_authors_of_an_article()
    {
        $this->signIn();
        $article = $this->article;
        $new_author = factory('App\Author')->create();
        $article->authors()->save($new_author);
        
        $this->assertArraySubset(ArticleAuthor::where('article_id', $article->id)->pluck('relevance_order'), [0,0]);

        $this->post('/admin/breaks/'.$article->slug.'/breakers-order', [
            'order' => [0,1]
        ]);

        $this->assertArraySubset(ArticleAuthor::where('article_id', $article->id)->pluck('relevance_order'), [1,0]);
    }

    /** @test */
    public function a_manager_can_upload_a_pdf_when_editing_an_article()
    {
        $this->signIn();
        $article = $this->article;

        $this->patch('/admin/breaks/'.$article->slug, [
            'title' => $article->title,
            'content' => $article->content,
            'reading_time' =>$article->reading_time,
            'original_article' => $article->original_article,
            'category_id' => $article->category_id,
            'editor_id' => $article->editor_id,
            'doi' => $article->doi,
            'editor_pick' => $article->editor_pick,
            'authors' => [1],
            'pdf' => $file = UploadedFile::fake()->create('document.pdf', 20)
        ]);

        Storage::assertExists('breaks/'.str_slug($article->title).'.pdf');
    }

    /** @test */
    public function a_manager_can_upload_a_cover_image_when_editing_an_article()
    {
        $this->signIn();
        $article = $this->article;
        $slug = str_slug($article->title);

        $this->patch('/admin/breaks/'.$article->slug, [
            'title' => $article->title,
            'content' => $article->content,
            'reading_time' =>$article->reading_time,
            'original_article' => $article->original_article,
            'category_id' => $article->category_id,
            'editor_id' => $article->editor_id,
            'doi' => $article->doi,
            'editor_pick' => $article->editor_pick,
            'authors' => [1],
            'image' => $file = UploadedFile::fake()->create('image.jpeg', 200)
        ]);

        Storage::assertExists('breaks/images/'.$slug.'/'.$slug.'.jpeg');
    }
}