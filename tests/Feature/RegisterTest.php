<?php

use App\Models\User;
use function Pest\Laravel\post;
uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

it('shows the register page')->get('/auth/register')->assertStatus(200);

it('redirects authenticated user', function() {
    expect(User::factory()->create())->toBeRedirectedTo('/auth/register');
});

it('has errors if details are not provided')
    ->post('/register')
    ->assertSessionHasErrors(['name', 'email', 'password']);

it('registers the user')
    ->tap(
        fn () => $this->post('/register', [
            'name' => 'Test',
            'email' => 'test@test.com',
            'password' => 'test12345'
        ])
        ->assertRedirect('/')
    )
    ->assertDatabaseHas('users', [
        'name' => 'Test',
        'email' => 'test@test.com'
    ]);
