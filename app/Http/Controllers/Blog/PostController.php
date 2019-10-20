<?php

namespace App\Http\Controllers\Blog;

//use App\Http\Controllers\Controller; закоментировать
use App\Models\BlogPost; //класс модел - чтобы достать данные по постам из БД нужна для вывода сущностей
use Illuminate\Http\Request;

class PostController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //вывод сущностей
	        $items = BlogPost::all(); //в эту переменную попадают все статьи блога
	        //содержится в databaseseeder
	    
//	        dd($items);
//	        dd($items[0]);
//	        dd($items->first()); получить первый элемент
	        
	        return view('blog.posts.index', compact('items'));
	        //вернуть представление по адресу blog/posts/index.blade.php пометсить items
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
