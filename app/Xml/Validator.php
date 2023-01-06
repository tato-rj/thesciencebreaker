<?php

namespace App\Xml;

use Illuminate\Validation\ValidationException;

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
			'description' => $this->request['abstract'] ?? null,
			'cover_image' => $this->request['coverjs']['cover']['cover_image'] ?? null,
			'reading_time' => $this->request['subjects']['subject'] ?? null,
			'original_article' => $this->request['citations']['citation'] ?? null,
			'category' => $this->request['@attributes']['section_ref'] ?? null,
			'doi' => $this->request['id'][1] ?? null,
		];

		foreach ($data as $field => $value) {
			if (! $value)
				throw ValidationException::withMessages([$field => 'The '. $field .' is missing']);
		}

		return $data;
	}
}