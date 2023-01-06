<?php

namespace App\Xml;

use Illuminate\Validation\ValidationException;
use App\Category;

class Validator
{
	function __construct(array $request)
	{
		$this->request = $request;
	}

	public function validate()
	{
		$missing = [];

		$data = [
			'title' => $this->request['title'] ?? null,
			'slug' => str_slug($this->request['title'] ?? null) ?? null,
			'description' => $this->request['abstract'] ?? null,
			'cover_image' => $this->request['covers']['covedr']['cover_image'] ? 'https://oap.unige.ch/journals/public/journals/8/' . $this->request['covers']['cover']['cover_image'] : null,
			'reading_time' => $this->request['subjects']['subject'] ?? null,
			'original_article' => $this->request['citations']['citation'] ?? null,
			'category_id' => Category::byName($this->request['@attributes']['section_ref'] ?? null)->first()->id ?? null,
			'doi' => 'https://doi.org/' . $this->request['id'][1] ? 'https://doi.org/' . $this->request['id'][1] : null,
		];

		foreach ($data as $field => $value) {
			if (! $value)
				throw ValidationException::withMessages([$field => 'The '. $field .' is missing']);
		}

		return $data;
	}
}