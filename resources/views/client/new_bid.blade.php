@extends('layouts.main_layout')

@section('content')
	<h2>Новая заявка</h2>
	<div class="form_wrapper">
		<div class="form in-center">
			@if($errors->any())
                <div class="errors-block">
                    @foreach($errors->all() as $error)
                        {{ $error }}
                        <br>
                    @endforeach
                </div>
            @endif
            <form action="{{ route('bid.store') }}" enctype="multipart/form-data" method="post">
            	@csrf
				<div class="form-group mt-10">
					<label for="" class="form-label">Имя</label>
					<br>
					<input type="textarea" name="nickname" required class="form-input">
				</div>
				<div class="form-group mt-10">
					<label for="" class="form-label">Описание</label>
					<br>
					<textarea name="description" required class="form-input"></textarea>
				</div>
				<div class="form-group mt-10">
					<label for="" class="form-label">Категория</label>
					<br>
					<select class="form-input" name="category_id" required>
					@foreach($categories as $category)
			               <option value="{{ $category->id }}">{{ $category->name }}</option>
			        @endforeach
					</select>
				</div>
				<div class="form-group mt-10">
					<label for="" class="form-label">Фото питомца</label>
					<br>
					<input type="file" name="photo" required class="form-input">
				</div>
				<div class="form-group mt-10">
					<input type="submit" value="Отправить" class="form-submit">
				</div>
            </form>
		</div>
	</div>
@endsection