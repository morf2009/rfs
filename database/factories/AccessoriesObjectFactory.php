<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Rf\StoreAccessories;
use Faker\Generator as Faker;

$factory->define(\App\Models\Rf\StoreAccessories::class, function (Faker $faker) {
	$title = $faker->sentence(rand(3, 8), true); //получить предложения от 3 до 8 слов в предложении
	$createdAt = $faker->dateTimeBetween('-3 month', '-2 month');
	$typeMassive = array('Кольцо', 'Амулет');
	$type = $typeMassive[mt_rand(0, count($typeMassive) - 1)];
	
	$AccessMassive = array('25/25', '10/10', '15/15');
	$access = $AccessMassive[mt_rand(0, count($AccessMassive) - 1)];
	
	$data = [
		'category_id' => 3,
		'user_id' => (rand(1, 5) == 5) ? 1 : 2, //крайне редко посты будет опублтковывать 1й пользователь
		'title' => 'Аксессуары',
		'slug' => str_slug($title),
		'created_at' => $createdAt,
		'type' => $type,
		'kind' => $access,
		'updated_at' => $createdAt,
	];
	
	return $data;
});
