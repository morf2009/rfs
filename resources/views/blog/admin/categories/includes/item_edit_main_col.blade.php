@php

	/** @var \App\Models\BlogCategory $item */
	/** @var \\Illuminate\Support\Collection $categoryList */

@endphp

<div class="row justify-content-center">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<div class="card-title">
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item">
							<a href="#maindata" data-toggle="tab" role="tab" class="nav-link active">Основные данные</a>
						</li>
					</ul>
					<br>
					<div class="tab-content">
						<div class="tab-pane active" id="maindata" role="tabpanel">
							<div class="form-group">
								<label for="title"> Заголовок</label>
								<input name="title" value="{{$item->title}}" id="title" class="form-control"
								       minlength="3" required type="text">
							</div>
							<div class="form-group">
								<label for="slug"> Идентификатор</label>
								<input name="slug" value="{{$item->slug}}" id="slug" class="form-control" required
								       type="text">
							</div>
							<div class="form-group">
								<label for="parent_id"> Родитель</label>
								<select required placeholder="Выберите категорию" class="form-control" name="parent_id"
								        id="parent_id">
{{--									пробегаемся по всем элементам категорий--}}
									@foreach($categoryList as $categoryOption)
										<option value="{{$categoryOption->id}}"
										        @if($categoryOption->id == $item->parent_id) selected @endif>
											{{$categoryOption->id}}.{{$categoryOption->title}}
										</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label for="description"> Описание</label>
								<textarea name="description" rows="3" id="description" class="form-control">
{{--									{{$item->description}} если не реализовывать в методе edit ->withInput(); то можно писать и так  --}}
									{{old('description', $item->description)}}
								</textarea>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>








