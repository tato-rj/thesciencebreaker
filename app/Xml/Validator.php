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
		if (! $this->request['title'])
			dd('The title is missing');

		if (! $this->request['abstract'])
			dd('The description is missing');

		if (! $this->request['coverjs']['cover']['cover_image'])
			dd('The image is missing');

		if (! $this->request['subjects']['subject'])
			dd('The reading time is missing');

		if (! $this->request['citations']['citation'])
			dd('The original article is missing');

		if (! $this->request['@attributes']['section_ref'])
			dd('The category is missing');

		if (! $this->request['id'])
			dd('The doi is missing');

		return $this->request;
	}
}