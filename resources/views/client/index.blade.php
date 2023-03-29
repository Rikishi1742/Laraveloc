@extends('layouts.main_layout')

@section('content')
<form action="{{ route('client.index') }}" class="in-center client-filter" method="get">
	@csrf
	<div class="form-group">
		<label for="" class="form-label"></label>
		<br>
		<select class="form-input" name="status" required>
			<option value="0" @if(!$filter) selected @endif>Все</option>
			<option value="1" @if($filter == 1) selected @endif>Новые</option>
			<option value="2" @if($filter == 2) selected @endif>Обработка данных</option>
			<option value="3" @if($filter == 3) selected @endif>Услуга оказана</option>
		</select>
	</div>
	<input type="submit" class="form-submit mt-10" value="Фильтр">
	<input class="tanya_button" value="Создать заявку" type="button" onclick="location.href='/client/bid'" />
</form>

	@foreach($bids as $bid)
	<div class="bid-item bid-item-client disp-flex-column align-center">
		@if($bid->status === 1)
		<div class="bid-head disp-flex">
			<form class="form-bid-delete" action="{{ route('bid.destroy', ['id' => $bid->id]) }}" enctype="multipart/form-data" method="post">
				@csrf
				@method('DELETE')
				<input type="submit" class="btn-delete" value="&times;">
			</form>
		</div>
		@endif
		<div class="bid-info">
			<div class="bid-time">Временная метка: {{ $bid->created_at }}</div>
			<div class="bid-address mt-10">Кличка домашнего животного: {{ $bid->nickname }}</div>
			<div class="bid-desription mt-10">Описание: {{ $bid->description }}</div>
			<div class="bid-category mt-10">Комментарий: {{ $bid->com }}</div>
			<hr>
			<div class="bid-category mt-10">Категория: {{ $bid->category->name }}</div>
			<div class="bid-status mt-10">Статус: {{ $bid->getStatus() }}</div>
		</div>
	</div>
	@endforeach
<script src="/js/client.js"></script>
@endsection

