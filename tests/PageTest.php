<?php

use function Pest\Laravel\get;

it('has dashboard page', function () {
    get(route('admin.dashboard'))->assertOk();
});

it('redirects to login', function () {
    auth()->logout();
    dd(get(route('admin.dashboard')));
});
