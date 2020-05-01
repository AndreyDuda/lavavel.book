<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\BlogPost;
use Faker\Generator as Faker;

$factory->define(BlogPost::class, function (Faker $faker) {
    $categoryId = rand(1, 10);
    $title = $faker->sentence(rand(3,8));
    $text = $faker->text(rand(1000, 4000));
    $isPublished = rand(1, 5) > 1;
    $createdAt = $faker->dateTimeBetween('-2 mounths', '-1 days');
    return [
        BlogPost::PROP_CATEGORY_ID => $categoryId,
        BlogPost::PROP_USER_ID => (rand(1, 5) == 5) ? 1 : 2,
        BlogPost::PROP_TITLE => $title,
        BlogPost::PROP_SLUG => Str::slug($title),
        BlogPost::PROP_EXCERPT => $faker->text(rand(40, 100)),
        BlogPost::PROP_CONTENT_RAW => $text,
        BlogPost::PROP_CONTENT_HTML => $text,
        BlogPost::PROP_IS_PUBLISHED => $isPublished,
        BlogPost::PROP_PUBLISHED_AT => $isPublished ? $createdAt : null,
        BlogPost::PROP_CREATED_AT => $createdAt,
        BlogPost::PROP_UPDATE_AT => $createdAt
    ];
});
