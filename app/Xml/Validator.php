<?php

namespace App\Xml\Validator;

class Validator
{
	protected $fields = [
		'title' => 'title',
		'abstract' => 'description',
		'covers|cover|cover_image' => 'image',
		'subjects|subject' => 'reading time',
		'citations|citation' => 'original_article',
		'@attributes|section_ref' => 'category',
		'id' => 'doi'
	];

	function __construct(array $request)
	{
		$this->request = $request;
	}

	public function validate()
	{
		foreach ($this->fields as $key => $name) {
			$field = explode('|', $key);

			if (! array_key_exists($field, $this->request))
				dd('The ' . $name . ' is missing!');
		}

		return $this->request;
	}
}