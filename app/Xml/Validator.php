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

	public function breakers()
	{
		$breakers = $this->request['authors']['author'] ?? null;

		if (! $breakers)
			throw ValidationException::withMessages(['authors' => 'The author is missing']);

		$data = [];

		foreach ($breakers as $breaker) {
			dd($breaker);
			$info = [
				'first_name' => $breaker['givenname']
			];
		}
	}

	public function break()
	{
		$data = [
			'title' => $this->request['title'] ?? null,
			'description' => $this->request['abstract'] ?? null,
			'cover_image' => $this->request['covers']['cover']['cover_image'] ?? null,
			'reading_time' => $this->request['subjects']['subject'] ?? null,
			'original_article' => $this->request['citations']['citation'] ?? null,
			'category_id' => Category::byName($this->request['@attributes']['section_ref'] ?? null)->first()->id ?? null,
			'doi' => $this->request['id'][1] ?? null,
		];

		foreach ($data as $field => $value) {
			if (! $value)
				throw ValidationException::withMessages([$field => 'The '. $field .' is missing']);
		}

		return $data;
	}
}