<?php

namespace App;

use App\TheScienceBreaker;
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
