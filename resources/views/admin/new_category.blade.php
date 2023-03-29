@extends('layouts.main_layout')

@section('content')
<h2>Создание новой категории</h2>
<div class="form-wrapper">
	<div class="form in-center">
		@if($errors->any())
	        <div class="errors-block">
		        @foreach($errors->all() as $error)
		       	{{ $error }}
		        <br>
		        @endforeach
	        </div>
        @endif
        <form action="{{ route('category.store') }}" method="post">
        	@csrf
        	<div class="form-group">
        		<label for="" class="form-label">Название категории</label>
        		<br>
        		<input type="text" name="name" class="form-input" required>
        	</div>
        	<div class="form-group mt-10">
        		<input type="submit" value="Создать" class="form-submit">
        	</div>
        </form>
	</div>
</div>
@endsection