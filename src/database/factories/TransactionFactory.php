<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Transaction;
use Faker\Generator as Faker;
use App\IOMethod;
use App\Category;
use App\User;
use Carbon\Carbon;

$factory->define(Transaction::class, function (Faker $faker) {
    return [
        'transdate' => $faker->datetime('now'),
        'amount' => $faker->randomFloat(2, 0.01, 9999),
        'description' => $faker->realText(10),
        'user_id' => (User::all()->random(1)->first())->id,
        'iomethod_id' => (IOMethod::all()->random()->first())->id,
        'category_id' => (Category::all()->random()->first())->id,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
    ];
});
