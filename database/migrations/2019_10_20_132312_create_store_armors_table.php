<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoreArmorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_armors', function (Blueprint $table) {
	        $table->bigIncrements('id');
	        $table->bigInteger('category_id')->unsigned(); //id категории к которой принадлежит данный пост (ссылка к таблице категорий)
	        $table->bigInteger('user_id')->unsigned(); //id автора который создал статью (будет связь с табличкой пользователей)
	        $table->string('slug')->unique(); // строиться URL будет на основании этого slug и slug категории
	        $table->string('title'); //Обязательно для заполнения
	        $table->string('type'); // C B
	        $table->string('kind'); // руки
	        $table->string('level'); // 65
	        $table->timestamps();//когда создано
	        $table->softDeletes(); //когда удалено

//	        $table->string('user_id_name');
//	        $table->foreign('user_id_name')->references('id')->on('users');
	        //связь между таблицами этой о полю  user_id и таблицей users по полю id у таблицы users
	        $table->foreign('user_id')->references('id')->on('users');
	        //связь между таблицами этой по полю category_id  и таблицей store_categories по полю id у таблицы users
	        $table->foreign('category_id')->references('id')->on('store_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('store_armors');
    }
}
