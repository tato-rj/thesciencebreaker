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
		$this->editor = factory('App\Manager')->create();
		$this->category = factory('App\Category')->create();
    	$this->article = factory('App\Article')->create([
    		'editor_id' => $this->editor->id,
    		'category_id' => $this->category->id
    	]);
    }

}
