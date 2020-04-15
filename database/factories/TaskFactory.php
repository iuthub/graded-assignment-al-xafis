<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Task;

$factory->define(App\Task::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(3),
    ];
});
