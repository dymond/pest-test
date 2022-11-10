<?php

use App\Models\Stuff;
use App\Models\User;
uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);
beforeEach(fn () => $this->user = User::factory()->create());

it('shows stuff with the correct status', function($my_status, $title){
    $this->user->stuffs()->attach($stuff = Stuff::factory()->create(), [
        'status' => $my_status
    ]);
    actingAs($this->user)
        ->get('/')
        ->assertSeeInOrder([$title, $stuff->title]);
})
->with([
    [
        'my_status' => 'WANT_THIS_STUFF',
        'title' => 'Want to buy',
    ],
    [
        'status' => 'HAVE_THIS_STUFF',
        'title' => 'Already own it',
    ],
    [
        'status' => 'FAKE_STATUS',
        'title' => 'Bad Status',
    ],
]);
