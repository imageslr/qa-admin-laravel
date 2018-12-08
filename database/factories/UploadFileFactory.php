<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\UploadFile::class, function (Faker $faker) {
    return [
        'user_id' => $faker->randomElement([1, 2, 3]),
        'raw_name' => $faker->name,
        'type' => '默认类型',
        'path' => $faker->url,
        'status' => $faker->randomElement([0, 1])
    ];
});
