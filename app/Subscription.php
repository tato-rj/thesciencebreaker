<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Manager\TheScienceBreaker;
use Illuminate\Database\QueryException;

class Subscription extends TheScienceBreaker
{
	public static function createOrIgnore($email)
	{
		try
		{
			self::create([
				'email' => $email
			]);
		} catch (QueryException $e) {}

	}
}
