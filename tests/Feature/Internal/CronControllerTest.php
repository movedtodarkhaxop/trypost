<?php

declare(strict_types=1);

test('cron endpoints reject requests without a token', function () {
    config(['trypost.cron.token' => 'secret-token']);

    $this->postJson(route('internal.cron.queue-work'))->assertForbidden();
    $this->postJson(route('internal.cron.schedule-run'))->assertForbidden();
});

test('cron endpoints reject an incorrect token', function () {
    config(['trypost.cron.token' => 'secret-token']);

    $this->postJson(route('internal.cron.queue-work'), [], [
        'Authorization' => 'Bearer wrong-token',
    ])->assertForbidden();
});

test('cron endpoints reject every request when no token is configured', function () {
    config(['trypost.cron.token' => null]);

    $this->postJson(route('internal.cron.queue-work'), [], [
        'Authorization' => 'Bearer anything',
    ])->assertForbidden();
});

test('queue-work drains the queue with a valid token', function () {
    config(['trypost.cron.token' => 'secret-token']);

    $this->postJson(route('internal.cron.queue-work'), [], [
        'Authorization' => 'Bearer secret-token',
    ])
        ->assertOk()
        ->assertJsonStructure(['exit_code', 'output']);
});

test('schedule-run runs the scheduler with a valid token', function () {
    config(['trypost.cron.token' => 'secret-token']);

    $this->postJson(route('internal.cron.schedule-run'), [], [
        'Authorization' => 'Bearer secret-token',
    ])
        ->assertOk()
        ->assertJsonStructure(['exit_code', 'output']);
});
