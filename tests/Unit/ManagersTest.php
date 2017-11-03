<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ManagersTest extends TestCase
{
	use DatabaseMigrations;

    /** @test */
    public function managers_have_their_own_page()
    {
    	$manager = $this->manager;
    	$this->get("/core-team/$manager->slug")->assertSee($manager->first_name);
    }
}
