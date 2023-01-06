<?php

namespace App\Xml;

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

	public function createBreak()
	{
		return $this->publication;
	}
}