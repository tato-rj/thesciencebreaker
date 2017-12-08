<?php

function create($class, $attributes = [])
{
	return factory($class)->create($attributes);
}

function check($class, $array)
{
    foreach ($array as $route) {
        $class->get($route)->assertSuccessful();         
    }	
}

function createHighlights()
{
    factory('App\Highlight', 10)->create();
}
function localize($lang)
{
    \Session::put('lang', $lang);
}