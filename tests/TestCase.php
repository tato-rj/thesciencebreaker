<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function setUp()
    {
    	parent::setUp();

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

}
