<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Rf\StoreWeapon;
use Faker\Generator as Faker;

$factory->define(\App\Models\Rf\StoreWeapon::class, function (Faker $faker) {
	$title = $faker->sentence(rand(3, 8), true); //получить предложения от 3 до 8 слов в предложении
//	$txt = $faker->realText(rand(1000, 4000)); //кидаем от 1000 до 4000 символов
//
	$createdAt = $faker->dateTimeBetween('-3 month', '-2 month');
	
	
	
	$typeMassive = array('Leon', 'B', 'C');
	$type = $typeMassive[mt_rand(0, count($typeMassive) - 1)];
	
	$weaponMassive = array('Лук', 'Огнемет', 'Посох');
	$weapon = $weaponMassive[mt_rand(0, count($weaponMassive) - 1)];
	
	$levelMassive = array('65', '67', '70');
	$level = $levelMassive[mt_rand(0, count($levelMassive) - 1)];
	
	$data = [
		'category_id' => 1,
		'user_id' => (rand(1, 5) == 5) ? 1 : 2, //крайне редко посты будет опублтковывать 1й пользователь
		'title' => 'Оружие',
		'slug' => str_slug($title),
		'created_at' => $createdAt,
		'type' => $type,
		'kind' => $weapon,
		'level' => $level,
		
		'updated_at' => $createdAt,
	];
	
	return $data;
});
