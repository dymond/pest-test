<?php

use App\Models\User;
use App\Models\Pivot\StuffUser;
use function Pest\Laravel\get;
use function Pest\Laravel\post;
uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

beforeEach(fn () => $this->user = User::factory()->create());

it('only allows auth user to add stuff')
    ->get('/stuff/add')
    ->assertStatus(302);

it('shows the available statuses on the form', function(){
    $user = User::factory()->create();
    $this->actingAs($user)
        ->get('/stuff/add')
        ->assertSeeTextInOrder(StuffUser::$statuses);
});
