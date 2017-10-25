<?php

namespace Tests;

use App\Exceptions\Handler;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function setUp()
    {
    	parent::setUp();

        $this->disableExceptionHandling();

		$this->author = factory('App\Author')->create();
		$this->editor = factory('App\Manager')->create([
            'is_editor' => 1
        ]);
		$this->category = factory('App\Category')->create();
    	$this->article = factory('App\Article')->create([
    		'editor_id' => $this->editor->id,
    		'category_id' => $this->category->id
    	]);
        $this->article_author = factory('App\ArticleAuthor')->create([
            'article_id' => $this->article->id,
            'author_id' => $this->author->id
        ]);
    }

    protected function signIn($user = null)
    {
        $user = $user ?: create('App\User');
        $this->actingAs($user);
        return $this;
    }

    protected function disableExceptionHandling()
    {
        $this->oldExceptionHandler = $this->app->make(ExceptionHandler::class);

        $this->app->instance(ExceptionHandler::class, new class extends Handler {
            public function __construct(){}
            public function report(\Exception $e) {}
            public function render($request, \Exception $e) {
                throw $e;
            }
        });
    }

    protected function withExceptionHandling()
    {
        $this->app->instance(ExceptionHandler::class, $this->oldExceptionHandler);
        return $this;
    }
}
