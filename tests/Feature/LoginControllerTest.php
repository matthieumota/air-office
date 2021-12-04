<?php

use App\Models\User;
use Tests\TestCase;

it('guest can login', function () {
    $user = User::factory()->create();

    /** @var TestCase $this */
    $response = $this->post('/connexion', [
        'email' => $user->email,
        'password' => 'password',
    ]);

    $this->assertAuthenticated();
    $response->assertRedirect('/bureaux');
});

it('guest cannot login with an invalid password', function () {
    $user = User::factory()->create();

    /** @var TestCase $this */
    $this->post('/connexion', [
        'email' => $user->email,
        'password' => 'wrong',
    ]);

    $this->assertGuest();
});

it('user can logout', function () {
    $user = User::factory()->create();

    /** @var TestCase $this */
    $response = $this->actingAs($user)->delete('/deconnexion');

    $response->assertRedirect();
    $this->assertGuest();
});
