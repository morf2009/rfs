<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
        	[
        		'name' => 'Автор не известен',
        		'email' => 'sdsd@sfsfs.ru',
        		'password' => bcrypt(str_random(16)), //получить хэш пароля
	        ],
        	[
        		'name' => 'Санек',
        		'email' => 'morf2009@gmail.com',
        		'password' => bcrypt('morf6673'),
	        ],
        ];
        
        DB::table('users')->insert($data);
    }
}
