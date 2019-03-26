<?php

use Faker\Generator as Faker;

$factory->define(\Dsc\Services\Auth\Api\Token::class, function (Faker $faker) {
    return [
        'id' => str_random(40),
        'user_id' => function () {
            return factory(\Dsc\User::class)->create()->id;
        },
        'ip_address' => $faker->ipv4,
        'user_agent' => substr($faker->userAgent, 0, 500),
        'expires_at' => \Carbon\Carbon::now()->addMinutes(60)
    ];
});
