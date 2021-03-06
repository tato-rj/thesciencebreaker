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
    $first_name = $faker->firstName;
    $last_name = $faker->lastName;

    return [
        'first_name' => $first_name,
        'last_name' => $last_name,
        'slug' => str_slug($first_name.' '.$last_name),
        'email' => $faker->unique()->safeEmail,
        'is_authorized' => 0,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Article::class, function (Faker $faker) {
    $title = $faker->sentence;

    return [
        'title' => $title,
        'slug' => str_slug($title),
        'description' => $faker->sentence,
        'image_caption' => $faker->sentence,
        'content' => $faker->paragraph,
        'reading_time' => $faker->randomDigitNotNull,
        'original_article' => $faker->sentence,
        'category_id' => 1,
        'editor_id' => 1,
        'doi' => 'https://doi.org/10.25250/thescbr.brk001',
        'volume' => (new App\Article)->resources()->generateVolume(),
        'issue' => (new App\Article)->resources()->generateIssue(),
        'editor_pick' => $faker->boolean($chanceOfGettingTrue = 50),
        'views' => 0
    ];
});

$factory->define(App\Author::class, function (Faker $faker) {
    $first_name = $faker->firstName;
    $last_name = $faker->lastName;

    return [
        'first_name' => $first_name,
        'last_name' => $last_name,
        'slug' => str_slug($first_name.' '.$last_name),
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
    $first_name = $faker->firstName;
    $last_name = $faker->lastName;

    return [
        'title' => $faker->title,
        'first_name' => $first_name,
        'last_name' => $last_name,
        'slug' => str_slug($first_name.' '.$last_name),
        'email' =>$faker->unique()->safeEmail,
        'division_id' => '1',
        'position' => $faker->word,
        'biography' => $faker->paragraph,
        'research_institute' => $faker->sentence,
        'is_editor' => $faker->boolean($chanceOfGettingTrue = 50)
    ];
});

$factory->define(App\Category::class, function (Faker $faker) {
    $name = $faker->word;

    return [
    	'name' => $name,
        'slug' => str_slug($name)
    ];
});

$factory->define(App\AvailableArticle::class, function (Faker $faker) {
    return [
        'article' => $faker->sentence,
        'category_id' => function() {
            return factory('App\Category')->create()->id;
        }
    ];
});

$factory->define(App\Subscription::class, function (Faker $faker) {
    return [
        'email' => $faker->unique()->safeEmail
    ];
});

$factory->define(App\Tag::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->word
    ];
});

$factory->define(App\Highlight::class, function (Faker $faker) {
    return [
        'article_id' => function() {
            return factory('App\Article')->create()->id;
        }
    ];
});