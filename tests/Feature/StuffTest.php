<?php

use App\Models\User;
use function Pest\Laravel\get;
use function Pest\Laravel\post;
uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

beforeEach(fn () => $this->user = User::factory()->create());

it('only allows auth user to post')
    ->post('/stuffs')
    ->assertStatus(302);

it('creates stuff', function () {
    $user = $this->user;
    $this->actingAs($user)
    ->post('/stuffs', [
        'title' => 'Stuff',
        'sku' => 'sku',
        'status' => 'WANT_THIS_STUFF',
    ]);
    $this->assertDatabaseHas('stuffs', [
        'title' => 'Stuff',
        'sku' => 'sku',
    ]);
    $this->assertDatabaseHas('stuff_user', [
        'user_id' => $user->id,
        'status' => 'WANT_THIS_STUFF',
    ]);
});

it('requires title, sku and status')
    ->tap(fn () => $this->actingAs($this->user))
    ->post('/stuffs')
    ->assertSessionHasErrors(['title', 'sku', 'status']);

it('requires a valid status')
    ->tap(fn () => $this->actingAs($this->user))
    ->post('/stuffs', [
        'status' => 'bad',
    ])
    ->assertSessionHasErrors(['status']);
