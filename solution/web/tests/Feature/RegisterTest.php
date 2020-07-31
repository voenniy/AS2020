<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testRegister()
    {
        $this->withoutExceptionHandling();
        $password = '1234545661qQ';
        $user = [
            'name' => 'Витя',
            'last_name' => 'Иванов',
            'email' => 'ok@ok.ru',
            'password' => $password,
            'password_confirmation' => $password
        ];
        $response = $this->post('/register', $user);
        unset($user['password_confirmation']);
        unset($user['password']);
        $response->assertStatus(302);
        $this->assertDatabaseHas('users', $user);

        auth()->logout();
        $this->assertEquals(null, auth()->id());
        $this->post('/login', [
            'username' => $user['email'],
            'password' => $password
        ]);
        $this->assertEquals(2, auth()->id());
    }
}
