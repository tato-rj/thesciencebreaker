<?php

namespace App\Xml;

class Validator
{
	function __construct(array $request)
	{
		$this->request = $request;
	}

	public function validate()
	{
		$data = [
			'title' => $this->request['title'] ?? null,
			'description' => $this->request['abstract'] ?? null,
			'image' => $this->request['covers']['cover']['cover_image'] ?? null,
			'reading_time' => $this->request['subjects']['subject'] ?? null,
			'original_article' => $this->request['citations']['citation'] ?? null,
			'category' => $this->request['@attributes']['section_ref'] ?? null,
			'doi' => $this->request['id'] ?? null,
		];

		foreach ($data as $field => $value) {
			if (! $value)
				dd('The ' . $field . ' is missing');
		}

		return $this->request;
	}
}