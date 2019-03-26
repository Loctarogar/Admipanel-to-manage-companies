<?php

use Faker\Generator as Faker;

$factory->define(App\Company::class, function (Faker $faker) {
    return [
        'name' => 'testCompanyFactory',
        'email' => 'test@companyFactory.com',
        'logo' => 'testCompanyFactoryLogo',
        'website' => 'testCompanyFactoryWebsite.com',
        'user_id' => 1,
        'deleted_at' => null,
    ];
});
