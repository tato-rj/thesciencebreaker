<?php

use Faker\Generator as Faker;

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

$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Article::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'content' => $faker->paragraph,
        'reading_time' =>$faker->randomDigitNotNull,
        'original_article' => $faker->sentence,
        'category_id' => '1',
        'editor_id' => function() {
        	return factory('App\Manager', ['is_editor' => 1])->create();
        },
        'doi' => $faker->url
    ];
});

$factory->define(App\Author::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' =>$faker->unique()->safeEmail,
        'position' => $faker->word,
        'research_institute' => $faker->sentence,
        'field_research' => $faker->word,
        'general_comments' => $faker->sentence
    ];
});

$factory->define(App\ArticleAuthor::class, function (Faker $faker) {
    return [
        'article_id' => function() {
        	return factory('App\Article')->create()->id;
        },
        'author_id' => function() {
        	return factory('App\Author')->create()->id;
        }
    ];
});

$factory->define(App\Manager::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' =>$faker->unique()->safeEmail,
        'position' => $faker->word,
        'biography' => $faker->paragraph,
        'research_institute' => $faker->sentence,
        'is_editor' => $faker->boolean($chanceOfGettingTrue = 50)
    ];
});

$factory->define(App\Category::class, function (Faker $faker) {
    return [
    	'name' => $faker->word
    ];
});
