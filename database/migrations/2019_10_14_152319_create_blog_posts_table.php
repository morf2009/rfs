<?php
	
	use Illuminate\Database\Migrations\Migration;
	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Support\Facades\Schema;
	
	class CreateBlogPostsTable extends Migration
	{
		/**
		 * Run the migrations.
		 *
		 * @return void
		 */
		public function up()
		{
			Schema::create('blog_posts', function (Blueprint $table) {
				$table->bigIncrements('id');
				$table->bigInteger('category_id')->unsigned(); //id категории к которой принадлежит данный пост (ссылка к таблице категорий)
				$table->bigInteger('user_id')->unsigned(); //id автора который создал статью (будет связь с табличкой пользователей)
				$table->string('slug')->unique(); // строиться URL будет на основании этого slug и slug категории
				$table->string('title'); //Обязательно для заполнения
				$table->text('excerpt')->nullable(); //кусочек статьи для выдержки
				$table->text('content_raw'); //сырая разметка markdown
				$table->text('content_html'); //которая будет превращаться в html котоый будет доступен только для чтения
				$table->timestamps();//когда создано
				$table->softDeletes(); //когда удалено
				$table->boolean('is_published')->default(false); //были опубликована статься (нет по умолчанию)
				$table->timestamp('published_at')->nullable(); //когда была опубликована статья (запоминает дату когда сверху меняется значение на true)
				//связь между таблицами этой о полю  user_id и таблицей users по полю id у таблицы users
				
				$table->foreign('user_id')->references('id')->on('users');
				//связь между таблицами этой по полю category_id  и таблицей blog_categories по полю id у таблицы users
				$table->foreign('category_id')->references('id')->on('blog_categories');
				$table->index('is_published'); //устанавливаем индекс по полю is_published для последующего поиска выборки...
			});
		}
		
		/**
		 * Reverse the migrations.
		 *
		 * @return void
		 */
		public function down()
		{
			Schema::dropIfExists('blog_posts');
		}
	}

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	