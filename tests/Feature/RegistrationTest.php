<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class RegistrationTest extends TestCase
{

    /**
     * The registration form can be displayed.
     *
     * @return void
     */
    public function testRegisterFormDisplayed()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    /**
     * A valid user can be registered.
     *
     * @return void
     */
    public function testRegistersAValidUser()
    {
        $user = User::factory()->create();

        $response = $this->post('register', [
            'name' => $user->name,
            'email' => $user->email,
            'password' => 'password',
            'password_confirmation' => 'password'
        ]);

        $response->assertStatus(302);

        //$this->assertAuthenticated();
    }

    /**
     * An invalid user is not registered.
     *
     * @return void
     */
    public function testDoesNotRegisterAnInvalidUser()
    {
        $user = User::factory()->create();

        $response = $this->post('register', [
            'name' => $user->name,
            'email' => $user->email,
            'password' => 'password',
            'password_confirmation' => 'invalid'
        ]);

        $response->assertSessionHasErrors();

        $this->assertGuest();
    }

}
