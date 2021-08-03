<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\course;
use App\photo;
use App\Question;
use App\Quiz;
use App\track;
use App\User;
use App\video;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
        'admin' => $faker->randomElement([0,1]),
        'score' => $faker->randomElement([100,150,155,160,170,175,190,200]),
    ];
});




$factory->define(track::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
    ];
});




$factory->define(course::class, function (Faker $faker) {
    return [
        'title'    => $faker->paragraph,
        'status'   => $faker->randomElement([0,1]),
        'link'     => $faker->url,
        'track_id' => track::all()->random()->id,
    ];
});







$factory->define(video::class, function (Faker $faker) {
    return [
        'title'     => $faker->paragraph,
        'link'      =>  $faker->url,
        'course_id' => course::all()->random()->id,
    ];
});




$factory->define(Quiz::class, function (Faker $faker) {
    return [
        'name'       => $faker->word,
        'course_id'  => course::all()->random()->id,
    ];
});




$factory->define(Question::class, function (Faker $faker) {

    $answers      = $faker->paragraph;
    $right_answer = $faker->randomElement(explode(' ',$answers));

    return [
        'title'         => $faker->paragraph,
        'answers'       => $answers,
        'right_answer'  => $right_answer,
        'score'         => $faker->randomElement([1,5,10,15,20]),
        'quiz_id'       => Quiz::all()->random()->id,
    ];
});



$factory->define(photo::class, function (Faker $faker) {

    $userId    = User::all()->random()->id;   // get random user id
    $courseId  = course::all()->random()->id;  // get random course id

    $photoable_id   = $faker->randomElement([$userId,$courseId]);
    $photoable_type = $photoable_id == $userId ? 'App\User' : 'App\course';

    return [
        'filename'       => $faker->randomElement(['1.jpg','2.jpg','3.jpg','4.jpg','5.jpg','6.jpg','7.jpg','8.jpg','9.jpg','10.jpg']),
        'photoable_id'   => $photoable_id,
        'photoable_type' => $photoable_type
    ];
});
