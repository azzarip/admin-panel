<?php

use function Pest\Laravel\get;

it('has dashboard page', function () {
    get(route('dashboard'))->assertOk();
});
