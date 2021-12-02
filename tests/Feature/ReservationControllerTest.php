<?php

use App\Models\Office;
use App\Models\Reservation;
use App\Models\User;

it('user can make a reservation', function () {
    $user = User::factory()->create();
    Office::factory()->create(['price' => 10]);

    /** @var TestCase $this */
    $response = $this->actingAs($user)->post('/reservation/1', [
        'start_at' => '2021-12-29',
        'end_at' => '2022-01-05',
    ]);

    $response->assertRedirect('/reservations');
    $this->assertDatabaseHas('reservations', [
        'start_at' => '2021-12-29',
        'end_at' => '2022-01-05',
        'price' => 80,
    ]);
});

it('user cannot make a reservation when already reserved', function () {
    $user = User::factory()->create();
    Reservation::factory()->create(['start_at' => '2021-12-29', 'end_at' => '2021-12-31']);

    /** @var TestCase $this */
    $this->actingAs($user)->post('/reservation/1', [
        'start_at' => '2021-12-26', 'end_at' => '2022-01-05',
    ])->assertSessionHasErrors();

    $this->actingAs($user)->post('/reservation/1', [
        'start_at' => '2021-12-31', 'end_at' => '2022-01-05',
    ])->assertSessionHasErrors();

    $this->assertDatabaseCount('reservations', 1);
});
