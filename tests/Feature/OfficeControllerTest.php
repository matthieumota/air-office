<?php

use App\Models\Office;
use App\Models\User;
use Tests\TestCase;

it('user can list offices', function () {
    // Given (Arrange)
    $bob = User::factory()->create(['name' => 'Bob']);
    Office::factory()->create(['name' => 'Bureau 1']);
    Office::factory()->create(['name' => 'Bureau 2']);
    Office::factory()->for($bob)->create(['name' => 'Bureau 3']);

    // When (Act)
    /** @var TestCase $this */
    $response = $this->actingAs($bob)->get('/bureaux');

    // Then (Assert)
    $response->assertStatus(200);
    $response->assertSeeInOrder(['Salut Bob', 'Bureau 1', 'Bureau 2']);
    // $response->assertDontSee('Bureau 3');
});

it('guest cannot list offices')->get('/bureaux')->assertRedirect('/connexion');

it('user can see an office', function () {
    $user = User::factory()->create();
    Office::factory()->create(['name' => 'Bureau 1']);

    $this->actingAs($user)->get('/bureau/1')
        ->assertStatus(200)
        ->assertSee('Bureau 1');
});

it('user can display a form to create an office', function () {
    $user = User::factory()->create();

    $this->actingAs($user)->get('/bureau/nouveau')
        ->assertStatus(200)
        ->assertSee('Ajouter');
});

it('user can create a valid office', function () {
    $user = User::factory()->create();

    /** @var TestCase $this */
    $response = $this->actingAs($user)->post('/bureau/nouveau', [
        'name' => 'Bureau',
        'price' => 12,
    ]);

    $response->assertRedirect('/bureaux');
    $this->assertDatabaseHas('offices', ['name' => 'Bureau', 'price' => 12]);
});

it('an invalid office cannot be created', function () {
    $user = User::factory()->create();

    /** @var TestCase $this */
    $response = $this->actingAs($user)->from('/bureau/nouveau')
        ->post('/bureau/nouveau', [
            'name' => 'B',
            'price' => 12,
        ]);

    $response->assertSessionHasErrors();
    $this->followRedirects($response)->assertSee('3 characters');
    $this->assertDatabaseCount('offices', 0);
});

it('user can display a form to edit an office', function () {
    $office = Office::factory()->create();

    $this->actingAs($office->user)->get('/bureau/modifier/1')
        ->assertStatus(200)
        ->assertSee('Modifier');
});

it('user can edit an office', function () {
    $user = User::factory()->create();
    $office = Office::factory()->create(['name' => 'Bureau 1']);

    $office->user; // Un objet user...
    $office->user()->where('...'); // Un objet query builder...

    /** @var TestCase $this */
    $response = $this->actingAs($office->user)->post('/bureau/modifier/1', [
        'name' => 'Bureau 2',
    ]);

    $response->assertRedirect('/bureaux');
    $this->assertEquals('Bureau 2', $office->refresh()->name);
    $this->actingAs($user)->post('/bureau/modifier/1')->assertStatus(403);
});

it('user can delete an office', function () {
    $user = User::factory()->create();
    $office = Office::factory()->create();

    /** @var TestCase $this */
    $this->actingAs($user)->delete('/bureau/1')->assertStatus(403);
    $response = $this->actingAs($office->user)->delete('/bureau/1');

    $response->assertRedirect('/bureaux');
    $this->assertDatabaseMissing('offices', ['id' => $office->id]);
});
