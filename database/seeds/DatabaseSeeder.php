<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class); //Добавятся юзеры
        $this->call(BlogCategoriesTableSeeder::class); //Добавятся категории
//	    $factory->define(\App\Models\BlogPost::class, function (Faker $faker); //с помощью фактори создадутся 100штук постов
	    factory(\App\Models\BlogPost::class, 100)->create(); //хелпер factory
	    //росто вызывает 100 раз модель BlogPost без параметров. Как оно находит фабрику BlogPostFactory? Просто по наванию прибавляя Factory? Почему такое неочевидное решение без прямой ссылки на файл фабрики?
     
    }
}
