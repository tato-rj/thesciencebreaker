<?php

namespace App\Http\Controllers;

use App\Manager;

trait ManagersRoles
{
	public function founders()
	{
		return Manager::select('position', 'Founder of TheScienceBreaker');	
	}

	public function editors()
	{
		return Manager::select('position', 'Scientific Editor');
	}

	public function commOfficers()
	{
		return Manager::select('position', 'Communication Officer');
	}

	public function advisors()
	{
		return Manager::select('division', 'advisory_board');
	}
}
