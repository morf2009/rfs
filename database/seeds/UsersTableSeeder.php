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
        		'name' => 'Автор',
        		'email' => 's@sfss.ru',
        		'password' => bcrypt('123123'),
	        ],
        ];
        
        DB::table('users')->insert($data);
    }
}
