<?php

namespace App\Resources;

abstract class Resources
{
	protected $model;

	public function __construct($model)
	{
		$this->model = $model;
	}
}
