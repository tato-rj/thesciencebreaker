<?php

namespace App\Xml;

use Illuminate\Validation\ValidationException;
use App\{Category, Article};

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
			$info = [
				'first_name' => $breaker['givenname'] ?? null,
				'last_name' => $breaker['familyname'] ?? null,
				'email' => $breaker['email'] ?? null,
				'position' => $breaker['biography'] ? preg_replace('/\s/', ' ', strip_tags($breaker['biography'])) : null,
				'research_institute' => $breaker['affiliation'] ?? null,
			];

			$this->sanitize($info, $except = ['position', 'research_institute']);

			array_push($data, $info);
		}

		return $data;
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

		$this->sanitize($data);

		if (Article::where('slug', str_slug($data['title']))->exists())
			throw ValidationException::withMessages(['break' => 'This break already exists']);
		
		return $data;
	}

	public function keywords()
	{
        return $this->request['keywords']['keyword'] ?? [];
	}

	public function sanitize($data, $except = [])
	{
		foreach ($data as $field => $value) {
			if (! in_array($field, $except) && ! $value)
				throw ValidationException::withMessages([$field => 'The '. $field .' is missing']);
		}
	}
}