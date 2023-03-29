@extends('layouts.main_layout')

@section('content')
<h1 class="in-center">ГрумRoom</h1>
<h2 style="text-align: center;">Вылечим вашего питомца</h2>
<a href="{{ route('register') }}">
	<button class="btn-register disp-block in-center">Регистрация</button>
</a>
<h3>
Количество заявок, завершенных успешно:
<span class="success-bids-amount"></span>
</h3>
@foreach($bids as $bid)
<div class="bid-item-client disp-flex disp-flex-column align-center mt-20">
	<div class="bid-info">
		<div class="bid-time">Временная метка: {{ $bid->created_at }}</div>
		<div class="bid-address mt-10">Кличка домашнего животного: {{ $bid->nickname }}</div>
		<div class="bid-category mt-10">Категория: {{ $bid->category->name }}</div>
		<div class="bid-category mt-10">Комментарий: {{ $bid->com }}</div>
	</div>
	<div class="bid-photo-block mt-10">
		<div class="bid-carousel">
			<img src="{{ asset('storage' . $bid->photo_before_url) }}" class="bid-photo disp-block">
			<img src="{{ asset('storage' . $bid->photo_after_url) }}" class="bid-photo disp-block">
		</div>
	</div>
</div>
@endforeach
<script src="/js/main-page.js"></script>
@endsection