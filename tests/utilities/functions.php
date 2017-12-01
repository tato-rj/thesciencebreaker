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