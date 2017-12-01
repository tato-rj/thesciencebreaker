<?php

namespace App\Resources;

use App\TheScienceBreaker;

abstract class Resources
{
	protected $model;

	public function __construct(TheScienceBreaker $model)
	{
		$this->model = $model;
	}
}
