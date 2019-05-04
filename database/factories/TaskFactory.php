<?php

use App\Models\Task;
use Faker\Generator as Faker;

/* @var $factory \Illuminate\Database\Eloquent\Factory */
$factory->define(Task::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->sentence,
        'description' => join(PHP_EOL, $faker->sentences(2)),
        'is_finished' => $faker->randomElement([true, false]),
    ];
});

