@extends('layouts.app')

@section('content')
	<form method="POST" action="{{route('blog.admin.categories.update', $item->id)}}">
	<div class="container">
		<div class="row">
{{--			$item - категория--}}
			@php /** @var \App\Models\BlogCategory $item */ @endphp

					@method('PATCH')
					@csrf
					<div class="col-lg-8">
						@include('blog.admin.categories.includes.item_edit_main_col')
					</div>
					<div class="col-lg-3">
						@include('blog.admin.categories.includes.item_edit_add_col')
					</div>


		</div>
	</div>
	</form>
@endsection


























