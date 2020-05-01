<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\BlogCategory;
use Faker\Generator as Faker;

$factory->define(BlogCategory::class, function (Faker $faker) {
    static $max = 0;
    $parentId = $faker->numberBetween(0, $max++);
    $title = $faker->sentence($faker->numberBetween(1,2));
    return [
        BlogCategory::PROP_TITLE => $title,
        BlogCategory::PROP_SLUG => Str::slug($title),
        BlogCategory::PROP_PARENT_ID => $parentId
    ];
});
