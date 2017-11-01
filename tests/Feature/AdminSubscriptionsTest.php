<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Subscription;

class AdminSubscriptionsTest extends TestCase
{
	use DatabaseMigrations;

    /** @test */
    public function an_authenticated_user_can_see_all_subscriptions_on_the_admin_page()
    {
        $this->signIn();
        $this->get('/admin/subscriptions')->assertSee($this->subscription->email);
    }

    /** @test */
    public function an_authenticated_user_can_add_a_new_subscription()
    {
        $this->signIn();

        $this->post('/admin/subscriptions', [
            'subscription' => 'new@subscription.com'
        ])->assertSessionHas('db_feedback');

        $this->assertDatabaseHas('subscriptions', [
            'email' => 'new@subscription.com'
        ]);
    }

    /** @test */
    public function an_authenticated_user_can_remove_a_subscription()
    {
        $this->signIn();
        $email = $this->subscription;

        $this->delete('/admin/subscriptions/'.$email->id)->assertSessionHas('db_feedback');

        $this->assertDatabaseMissing('subscriptions', [
            'email' => $email->email
        ]);
    }
}