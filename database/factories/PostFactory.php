<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

/* 	Factory
	
	Đầu tiên chạy composer dump-autoload để cài thư viện Factory
	Tiếp theo chạy php artisan make:factory PostFactory --model=Post -> tạo PostFactory
*/
$factory->define(Post::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween($min = 1, $max = 3),
        'content' => $faker->text,
        'created_at' => $faker->dateTimeBetween($startDate = '-7 days', $endDate = 'now', $timezone = 'asia/ho_chi_minh'),
        'updated_at' => $faker->dateTimeBetween($startDate = '-7 days', $endDate = 'now', $timezone = 'asia/ho_chi_minh'),
        'code' => $faker->numberBetween($min = 1, $max = 4)
    ];
});
