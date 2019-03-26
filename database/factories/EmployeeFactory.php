<?php

use Faker\Generator as Faker;

$factory->define(App\Employee::class, function (Faker $faker) {
    return [
        'firstname' => $faker->name,
        'lastname' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'phone' => '12345678',
        'created_at' => now(),
        'company_id' => function() {
            return factory(App\Company::class)->create()->id;
        },
        'deleted_at' => null,
    ];
});
