<?php

use App\Models\User;
use function Pest\Laravel\get;
uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

it('greets the user if they are signed out', function () {
    get('/')
        ->assertSee('Home')
        ->assertSee('to get started.')
        ->assertDontSee(['Feed']);
});

it('shows authenticated menu items if user is signed in', function(){
    $user = User::factory()->create();
    $this->actingAs($user)
        ->get('/')
        ->assertSee(['Feed','My Stuff','Add Stuff','Friend',$user->name]);
});

it('shows unauthenticated menu items if user is not signed in', function(){
    get('/')->assertSee(['Home','Login','Register']);
});
