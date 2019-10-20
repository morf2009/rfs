<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Rf\StoreArmor;
use Faker\Generator as Faker;

$factory->define(\App\Models\Rf\StoreArmor::class, function (Faker $faker) {
	$title = $faker->sentence(rand(3, 8), true); //получить предложения от 3 до 8 слов в предложении
	$createdAt = $faker->dateTimeBetween('-3 month', '-2 month');
	$typeMassive = array('SP', 'B', 'C');
	$type = $typeMassive[mt_rand(0, count($typeMassive) - 1)];
	
	$AccessMassive = array('руки', 'Ноги', 'Голова', 'Торс', 'Ступни');
	$access = $AccessMassive[mt_rand(0, count($AccessMassive) - 1)];
	
	$levelMassive = array('65', '67', '70');
	$level = $levelMassive[mt_rand(0, count($levelMassive) - 1)];
	
	$data = [
		'category_id' => 2,
		'user_id' => (rand(1, 5) == 5) ? 1 : 2, //крайне редко посты будет опублтковывать 1й пользователь
		'title' => 'Броня',
		'slug' => str_slug($title),
		'created_at' => $createdAt,
		'type' => $type,
		'kind' => $access,
		'level' => $level,
		
		'updated_at' => $createdAt,
	];
	
	return $data;
});
