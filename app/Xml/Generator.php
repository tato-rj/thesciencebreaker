<?php

namespace App\Xml;

use App\Xml\Validator;
use App\{Article, Tag, Author};

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

        $validator = (new Validator($xmlData['publication']));

        $this->validatedBreak = $validator->break();
        $this->validatedBreakers = $validator->breakers();
        $this->validatedKeywords = $validator->keywords();
	}

	public function createBreak($attributes)
	{
		$data = [
            'title' => $this->validatedBreak['title'],
            'slug' => str_slug($this->validatedBreak['title']),
            'description' => $this->validatedBreak['description'],
            'image_path' => 'https://oap.unige.ch/journals/public/journals/8/' . $this->validatedBreak['cover_image'],
            'reading_time' => $this->validatedBreak['reading_time'],
            'original_article' => $this->validatedBreak['original_article'],
            'category_id' => $this->validatedBreak['category_id'],
            'doi' => 'https://doi.org/' . $this->validatedBreak['doi'],
            'issue' => (new Article)->resources()->generateIssue(),
            'volume' => (new Article)->resources()->generateVolume(),
        ];

        return array_merge($data, $attributes);
        // Article::create(array_merge($data, $attribute));
	}

	public function createBreakers()
	{
		dd($this->validatedBreakers);
        // $authors = collect([]);
        // foreach ($publication['authors']['author'] as $author) {
        //     if ($current = Author::where(['first_name' => $author['givenname'], 'last_name' => $author['familyname']])->first()) {
        //         $authors->push($current);
        //     } else {
        //         $authors->push(Author::create([
        //             'first_name' => $author['givenname'],
        //             'last_name' => $author['familyname'],
        //             'slug' => str_slug($author['givenname'].' '.$author['familyname']),
        //             'email' => $author['email'],
        //             'position' => strip_tags($author['biography']),
        //             'research_institute' => $author['affiliation'],
        //         ]));
        //     }
        // }

		return $this->validatedBreakers;
	}

	public function createKeywords()
	{
		$tags = collect();

        foreach ($this->validatedKeywords as $keyword) {
            $tags->push(Tag::firstOrCreate(['name' => $keyword]));
        }

        return $tags;
	}
}