<?php

use function Pest\Laravel\get;

it('renders a client-side limit message for phone fields', function () {
    $response = get(route('create-client'));

    $response->assertOk();
    $response->assertSee('data-maxlength="10"', false);
    $response->assertSee('No puede tener más de 10 caracteres', false);
});
