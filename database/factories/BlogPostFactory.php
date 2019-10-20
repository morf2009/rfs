<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\BlogPost::class, function (Faker $faker) { //в BlogPost кидаем Faker
	
	$title = $faker->sentence(rand(3, 8), true); //получить предложения от 3 до 8 слов в предложении
	$txt = $faker->realText(rand(1000, 4000)); //кидаем от 1000 до 4000 символов
	$isPublished = rand(1, 5) > 1; //посты опубликованы и 1 раз из 5 - не опубликован
	
	$createdAt = $faker->dateTimeBetween('-3 month', '-2 month');
	
	$data = [
		'category_id' => rand(1, 10),
		'user_id' => (rand(1, 5) == 5) ? 1 : 2, //крайне редко посты будет опублтковывать 2й пользователь
		'title' => $title,
		'slug' => str_slug($title),
		'excerpt' => $faker->text(rand(40, 100)), //выдержка статьи
		'content_raw' => $txt,
		'content_html' => $txt,
		'is_published' => $isPublished,
		'published_at' => $isPublished ? $faker->dateTimeBetween('-2 month', '-1 days') : null, //если опубликовано - факер дай дату
		'created_at' => $createdAt,
		'updated_at' => $createdAt,
	];
	
    return $data;
});
