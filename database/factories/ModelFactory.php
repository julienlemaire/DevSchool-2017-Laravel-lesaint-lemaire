<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];

});

$factory->define(App\Models\Article::class, function (Faker\Generator $faker) {
   return [
       'title' => $faker->sentence(),
       'content' => $faker->text(),
       'user_id' => rand(1, 20),
   ];
});

$factory->define(App\Models\Evenement::class, function (Faker\Generator $faker) {
    return [
        'nom' => $faker->sentence(),
        'description' => $faker->text(),
        'date_debut' => $faker->date(),
        'date_fin' => $faker->date(),
        'lieu' => $faker->text(),
        'tarif' => $faker->numberBetween(15, 30),
        'user_id' => rand(1, 20),
    ];
});
