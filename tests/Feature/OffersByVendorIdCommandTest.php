<?php

it('generates export', function () {

    $this->artisan('orders:export ')
        ->assertExitCode(0);
});
