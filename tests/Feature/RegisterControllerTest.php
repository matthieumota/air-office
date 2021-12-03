<?php

it('has register page', function () {
    $response = $this->get('/register');

    $response->assertStatus(200);
});

it('guest can create an account', function () {
    /** @var TestCase $this */
    $response = $this->post('/register', [
        'name' => 'Bob',
        'email' => 'bob@email.com',
        'password' => 'Motdepasse123',
        'password_confirmation' => 'Motdepasse123',
    ]);

    $response->assertRedirect('/');
    $this->assertDatabaseHas('users', [
        'name' => 'Bob',
        'email' => 'bob@email.com',
    ]);
});

it("guest can't create an account if password is not ok", function () {
    /** @var TestCase $this */
    $response = $this->post('/register', [
        'name' => 'Bob',
        'email' => 'bob@email.com',
        'password' => 'Motdepasse123',
        'password_confirmation' => 'AutreMotDePasse',
    ]);

    $response->assertRedirect('/');
    $this->assertDatabaseMissing('users', [
        'name' => 'Bob',
        'email' => 'bob@email.com',
    ]);
});

it("guest can't create an account if email is not ok", function () {
    /** @var TestCase $this */
    $response = $this->post('/register', [
        'name' => 'Bob',
        'email' => 'bobemail.com',
        'password' => 'Motdepasse123',
        'password_confirmation' => 'Motdepasse123',
    ]);

    $response->assertRedirect('/');
    $this->assertDatabaseMissing('users', [
        'name' => 'Bob',
        'email' => 'bob@email.com',
    ]);
});
