<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() //создаем модель blog_categories накатывает миграцию
    { //здесь создаются поля
        Schema::create('blog_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            //создаем поле parent_id, тип integer, unsigned - будет от 1 и выше, default - по умолчанию там значение 1
	        //то есть 1 - каогда создаем категорию у нее нет по умолчанию parent
            $table->bigInteger('parent_id')->unsigned()->default(1);
            $table->string('slug')->unique(); //название категории title в трансилте, по нему будут строиться URL
            $table->string('title'); //Обязательно для заполнения
            $table->text('description')->nullable(); //nullable - НеОбязательно для заполнения
            $table->timestamps(); //когда создано
            $table->softDeletes(); //когда удалено
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() //удаляем модель blog_categories
    {
        Schema::dropIfExists('blog_categories');
    }
}
