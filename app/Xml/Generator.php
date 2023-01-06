<?php

namespace App\Xml;

use App\Xml\Validator;
use App\Article;

class Generator
{
	protected $publication;

	function __construct($file)
	{
        $path = \Storage::putFileAs('xml', $file, 'file.xml');

        $xmlObject = simplexml_load_string(\Storage::get($path));
        $json = json_encode($xmlObject);
        $xmlData = json_decode($json, true); 

        \Storage::delete($path);

        $this->publication = (new Validator($xmlData['publication']))->validate();
	}

	public function createBreak($attributes)
	{
		$data = [
            'title' => $this->publication['title'],
            'slug' => str_slug($this->publication['title']),
            'description' => $this->publication['description'],
            'image_path' => 'https://oap.unige.ch/journals/public/journals/8/' . $this->publication['cover_image'],
            'reading_time' => $this->publication['reading_time'],
            'original_article' => $this->publication['original_article'],
            'category_id' => $this->publication['category_id'],
            'doi' => 'https://doi.org/' . $this->publication['doi'],
            'issue' => (new Article)->resources()->generateIssue(),
            'volume' => (new Article)->resources()->generateVolume(),
        ];

        return $this->publication;
        return array_merge($data, $attributes);
        // Article::create(array_merge($data, $attribute));

        return $this;
	}
}