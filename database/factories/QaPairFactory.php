<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\QaPair::class, function (Faker $faker) {
    return [
        'question' => $faker->sentence,
        'answer' => $faker->sentence,
        'score' => $faker->randomFloat(2, 5, 10)
    ];
});
