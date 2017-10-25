<?php

function create($class, $attributes = [])
{
	return factory($class)->create($attributes);
}