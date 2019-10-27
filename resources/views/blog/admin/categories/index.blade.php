@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<nav>
					<a href="{{route('blog.admin.categories.create')}}"> добавить</a>
					{{--					route - хелпер--}}
				</nav>
				<table>
					<thead>
					<tr>
						<th>#</th>
						<th>категория</th>
						<th>родитель</th>
					</tr>
					</thead>
					<tbody>
					@foreach($paginator as $item)
						{{--						пробегаемся по $paginator и каждый ее элемент это $item--}}
						@php /** возможно здесь код https://youtu.be/fqogoFzH5kA?t=844 */ @endphp
						<tr>
							<td>{{$item->id}}</td>
							<td>
								{{--								ссылка на редактирование--}}
								{{--								blog.admin.categories.edi - название маршрута--}}
								{{--								$item->id - идентификатор текущей записи--}}
								<a href="{{route('blog.admin.categories.edit', $item->id)}}">
									{{$item->title}}
								</a>
							</td>
							{{--							то является главной категорией и красим в красный--}}
							<td @if(in_array($item->parent_id, [0,1])) style="color: red" @endif>

								{{$item->parent_id}}
								{{--								выводим идентификатор родителя--}}
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>
				@if($paginator->total() > $paginator->count())
{{--					если количество записей больше чем указано в CategoryController.php то отработает блок ниже--}}
					<br>
					<div class="row">
						<div class="col-lg-12">
							<div class="card">
								<div class="card-body">
									{{$paginator->links()}}
								</div>
							</div>
						</div>
					</div>
				@endif
			</div>
		</div>
	</div>
@endsection


























