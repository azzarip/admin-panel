<?php

use function Pest\Laravel\get;

it('has dashboard page', function () {
    get(route('admin.dashboard'))
        ->assertOk()
        ->assertSee('Dashboard');
});

it('redirects to login', function () {
    auth()->logout();
    get(route('admin.dashboard'))->assertRedirectToRoute('login');
});

it('404 on other pages', function () {
    get('admin.' . env('DOMAIN_BASE') . '/other')->assertStatus(404);
});
