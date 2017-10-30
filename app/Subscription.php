<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;

class Subscription extends Model
{
	protected $guarded = [];

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
