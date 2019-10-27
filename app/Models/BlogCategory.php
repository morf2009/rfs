<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogCategory extends Model
{
    //
	
	use SoftDeletes;
	
	//только эти поля будет заполнять метод fill
	protected $fillable = [
		'title',
		'slug',
		'parent_id',
		'description'
	];
}
