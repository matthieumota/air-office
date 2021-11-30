<?php

use App\Models\Office;
use App\Models\User;
use Tests\TestCase;

it('can list offices', function () {
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
    $response->assertDontSee('Bureau 3');
});

it('guest cannot list offices')->get('/bureaux')->assertRedirect('/connexion');
