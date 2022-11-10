<?php

use App\Models\User;
use function Pest\Laravel\get;
use function Pest\Laravel\post;
uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

it('shows the register page')->get('/auth/login')->assertStatus(200);

it('redirects authenticated user', function() {
    expect(User::factory()->create())->toBeRedirectedTo('/auth/login');
});

it('shows an error if details are not provided')
    ->post('/login')
    ->assertSessionHasErrors(['email', 'password']);

it('logs the user in', function() {
    $user = User::factory()->create([
        'password' => bcrypt('test12345')
    ]);
    post('/login', [
       'email' => $user->email,
       'password' => 'test12345'
    ])
    ->assertRedirect('/');
    $this->assertAuthenticated();
});
