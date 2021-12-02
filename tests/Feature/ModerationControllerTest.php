<?php

use App\Models\Office;
use App\Models\User;
use Illuminate\Foundation\Testing\TestCase;

it("user with not role moderator can't access to moderation page and redirect to connection", function () {
    $user = User::factory()->create();

    /** @var TestCase $this */
    $response = $this->actingAs($user)->get('/moderation');
    $response->assertRedirect('/connexion');
});


it('moderator can access to offices moderation page and list unvalidated offices', function () {
    $moderator = User::factory()->create([
        'name' => 'moderator',
        'role' => ['moderator']
    ]);

    $unvalid_office_1 = Office::factory()->create(['validated' => false]);
    $unvalid_office_2 = Office::factory()->create(['validated' => false]);
    $valid_office = Office::factory()->create(['validated' => true]);

    /** @var TestCase $this */
    $response = $this->actingAs($moderator)->get('/moderation/salles');
    $response->assertStatus(200);
    $response->assertSee([$unvalid_office_1->name, $unvalid_office_2->name]);
    $response->assertDontSee($valid_office->name);
});

it("moderator can access to a specific office moderation page", function () {
    $moderator = User::factory()->create([
        'name' => 'moderator',
        'role' => ['moderator'],
    ]);

    $unvalid_office = Office::factory()->create(['validated' => false]);
    /** @var TestCase $this */
    $response = $this->actingAs($moderator)->get('/moderation/salle-'.$unvalid_office->id);
    $response->assertStatus(200);
});

it("moderator can delete an office", function () {
    $moderator = User::factory()->create([
        'name' => 'moderator',
        'role' => ['moderator'],
    ]);

    $unvalid_office = Office::factory()->create(['validated' => false]);

    $this->assertDatabaseHas('offices', ['id' => $unvalid_office->id]);

    /** @var TestCase $this */
    $response = $this->actingAs($moderator)->get('/moderation/salle-'.$unvalid_office->id.'/delete');
    $response->assertRedirect('/moderation/salles');
    $this->assertDatabaseMissing('offices', ['id' => $unvalid_office->id]);
});


it("moderator can validate an office", function () {
    $moderator = User::factory()->create([
        'name' => 'moderator',
        'role' => ['moderator'],
    ]);

    $unvalid_office = Office::factory()->create(['validated' => false]);

    $this->assertDatabaseHas('offices', ['id' => $unvalid_office->id, 'validated' => false]);

    /** @var TestCase $this */
    $response = $this->actingAs($moderator)->get('/moderation/salle-'.$unvalid_office->id.'/validate');
    $response->assertRedirect('/moderation/salles');
    $response->assertDontSee($unvalid_office->name);
    $this->assertDatabaseHas('offices', ['id' => $unvalid_office->id, 'validated' => true]);
});

