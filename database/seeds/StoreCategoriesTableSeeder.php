<?php

use Illuminate\Database\Seeder;

class StoreCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    $categories = [];
	
	    $cName = 'Без категории'; //создаем категорию без категории
	    $categories[] = [
		    'title' => $cName,
		    'slug' => str_slug($cName), //хелперы str_slug - вместо пробела тирешечки
		    'parent_id' => 0
	    ];
	
	    for ($i = 1; $i < 4; $i++) { //создаем 3 категорий
		    switch ($i) {
			    case '1':
				    $cName = 'Оружие';
				    break;
			    case '2':
				    $cName = 'Броня';
				    break;
			    case '3':
				    $cName = 'Бижа';
				    break;
			    default:
				    echo "invalid";
		    }
		
		    $parentId = ($i > 0) ? $i : 0;
		
		    $categories[] = [
			    'title' => $cName,
			    'slug' => str_slug($cName),
			    'parent_id' => $parentId
		    ];
	    }
	
	    \DB::table('store_categories')->insert($categories); //складываем это все в таблицу store_categories
    }
}
