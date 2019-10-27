<?php
	
	namespace App\Http\Controllers\Blog\Admin;
	
	use App\Models\BlogCategory;
	use Illuminate\Http\Request;
	
	class CategoryController extends BaseController
	{
		/**
		 * Display a listing of the resource.
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function index()
		{
//    	$dsd = BlogCategory::all();
			$paginator = BlogCategory::paginate(5); //вывести по 5 элементов на страницу
//	    dd($dsd, $paginator);
			//страница от роута admin/blog/
			//Route::resource('categories) следовательно для index полный путь admin/blog/categories
			return view('blog.admin.categories.index', compact('paginator'));
		}
		
		/**
		 * Show the form for creating a new resource.
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function create()
		{
			//
		}
		
		/**
		 * Store a newly created resource in storage.
		 *
		 * @param \Illuminate\Http\Request $request
		 * @return \Illuminate\Http\Response
		 */
		public function store(Request $request) //страница сохранения новой категории
		{
			//
		}
		
		/**
		 * Display the specified resource.
		 *
		 * @param int $id
		 * @return \Illuminate\Http\Response
		 */
		public function show($id)
		{
//			dd(2);
			//страница от роута admin/blog/
			//Route::resource('categories) следовательно для index полный путь admin/blog/categories
			// + id пользователя  //  admin/blog/categories/1/
		}
		
		/**
		 * Show the form for editing the specified resource.
		 *
		 * @param int $id
		 * @return \Illuminate\Http\Response
		 */
		public function edit($id)
		{
//	    dd(2);
			//страница от роута admin/blog/
			//Route::resource('categories) следовательно для index полный путь admin/blog/categories
			// + id пользователя + edit //  admin/blog/categories/1/edit
			
			//В реальном проекте так не писать
			//$item получаем сущность
			
			$item = BlogCategory::FindOrFail($id); //если не найдет то вернет 404
			//$item = BlogCategory::Find($id); //
			//$item = BlogCategory::where('id', '=', $id)-first(); //если равен то венуть его
			$categoryList = BlogCategory::all();
			
			return view('blog.admin.categories.edit',
				compact('item', 'categoryList'));
			//кладем item и кладем список категорий categoryList
		}
		
		/**
		 * Update the specified resource in storage.
		 *
		 * @param \Illuminate\Http\Request $request
		 * @param int $id
		 * @return \Illuminate\Http\Response
		 */
		public function update(Request $request, $id)
			// $id -идентификатор категории
			//$request - объект класса request (инструмент для работы с входящими данными, можем определять путь IP PUT GET название маршрута...)
		{
			$item = BlogCategory::find($id);
			//вернет либо объект класа BlogCategory либо NULL
//			dd($item);
			if (empty($item)) {
				//если не нашлось (empty) делаем редирект назад
				return back()
					//кладем в сессию сооющение
					->withErrors(['msg' => "Запись id=[{$id}] не найдена"])
					//вернуть данные в инпут который он заполнял
					->withInput();
			}
			//получаем массив данных которые пришли вместе с реквестом
			$data = $request->all();
			$result = $item
				->fill($data) //обновляю свойства в обекте по ключу (такое то поле рвно такому то, будет пробегаться по массиву $data
				//будет находить соответствующее поле в нашем объекте и менять тем значением которое пришло)\
					// метод запись в базу
				->save();
			
			if ($result) {
				//если все хорошо, то попадаем сюда
				return redirect() //хелпер
					->route('blog.admin.categories.edit', $item->id) //вернуться на туже страницу по идентификатору категории
					->withInput(['success' => 'Успешно сохранено']); //в сессию записать сообщение с помощью метода with
			} else {
				return back()
					->withErrors(['msg' => "Ошибка сохранения"])
					->withInput();
			}
		}
		
		/**
		 * Remove the specified resource from storage.
		 *
		 * @param int $id
		 * @return \Illuminate\Http\Response
		 */
		public function destroy($id)
		{
			//
			
		}
	}























