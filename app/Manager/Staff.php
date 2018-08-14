<?php

namespace App\Manager;

class Staff
{
	private $email;
	protected $managers = ['max.caine@thesciencebreaker.org', 'arthurvillar@gmail.com'];

	public static function check($email)
	{
		$staff = new self;
		$staff->email = $email;

		return $staff;
	}

	public function role($role)
	{
		return in_array($this->email, $this->$role);
	}
}
