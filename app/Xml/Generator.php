<?php

namespace App\Xml;

use App\Models\Article;

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

        $this->publication = $xmlData['publication'];
	}

	public function createBreak($attributes)
	{
		$data = [
            'title' => $this->publication['title'],
            'slug' => str_slug($this->publication['title']),
            'description' => $this->publication['abstract'],
            'image_path' => 'https://oap.unige.ch/journals/public/journals/8/' . $this->publication['covers']['cover']['cover_image'],
            'reading_time' => $this->publication['subjects']['subject'],
            'original_article' => $this->publication['citations']['citation'],
            'category_id' => Category::byName($this->publication['@attributes']['section_ref'])->first()->id,
            'editor_id' => $this->editor_id,
            'doi' => 'https://doi.org/' . $this->publication['id'][1],
            // 'issue' => (new Article)->resources()->generateIssue(),
            // 'volume' => (new Article)->resources()->generateVolume(),
        ];

        return array_merge($data, $attribute);
        // Article::create(array_merge($data, $attribute));

        return $this;
	}
}