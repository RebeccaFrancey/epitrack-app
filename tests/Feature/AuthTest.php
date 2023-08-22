<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Event;

class AuthTest extends TestCase
{
    public function test_unauthenticated_user1_cannot_access_events()
    {
        //
    }

    public function test_login_user1_redirects_to_events()
    {
        User::create([
            'name' => 'User',
            'email' => 'user@user.com',
            'password' => bcrypt('password123')
        ]);

        $response = $this->post('login',[
            'email' => 'user@user.com',
            'password'=> 'password123'
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('events');
    }

    public function test_vet_user_has_been_found()
    {
        $this->assertDatabaseHas('users', ['email'=> 'vet@vet.com']);
    }
}
