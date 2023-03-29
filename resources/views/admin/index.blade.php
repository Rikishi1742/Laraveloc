@extends('layouts.main_layout')

@section('content')
<h2>Панель администратора</h2>

<a href="{{ route('admin.new_category') }}">
    <button class="btn-register disp-block in-center">Новая категория</button>
</a>
<form action="{{ route('category.destroy') }}" method="post" class="in-center">
    <div class="form-group">
        @csrf
        @method('DELETE')
        <label for="" class="form-label">Категории</label>
        <br>
        <select class="form-input" name="category_id" required>
            @foreach($categories as $category)
                   <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        </div>
        <input type="submit" class="btn-delete-category mt-10" value="Удалить">
        <input type="button" class="tanya_button" onclick="location.href='/client/bid'" value="Создать заявку" />
</form>
<hr class="global-hr">
<h3>Список заявок</h3>
<div class="bid-list bid-admin admin-list">
    @foreach($bids as $bid)
    <div class="bid-panel-block in-center disp-flex-column align-center mt-20">
        <div class="bid-item disp-flex-column align-center">
            <div class="bid-info">
                <div class="bid-time">Временная метка: {{ $bid->created_at }}</div>
                <div class="bid-address mt-10">Кличка: {{ $bid->nickname }}</div>
                <div class="bid-desription mt-10">Описание: {{ $bid->description }}</div>
                <hr>
                <div class="bid-category mt-10">Категория: {{ $bid->category->name }}</div>
                <div class="bid-status mt-10">Статус: {{ $bid->getStatus() }}</div>
                @if($bid->status === 1)
                    <form action="{{ route('bid.send_for_repair', ['id' => $bid->id]) }}" class="disp-flex-column justify-between" method="post">
                            @csrf
                            @method('PATCH')
                            <p>Сменить статус на "Обработка данных"</p>
                            <label>Комментарий: </label><input name="com" type="text">
                            <div class="form-group mt-10">
                                <input type="submit" class="form-submit" value="Сменить статус">
                                <div class="form-group">
                                <label for="" class="form-label">Фото</label>
                                <br>
                                <input type="file" name="photo" class="form-input">
                            </div>
                            </div>
                        </form>
                       @endif
                @if($bid->status === 2)  
                        <form enctype="multipart/form-data"
                              action="{{ route('bid.renovate', ['id' => $bid->id]) }}" class="disp-flex-column justify-between" method="post">
                            @csrf
                            @method('PATCH')
                            <p>Сменить статус на "Услуга оказана"</p>
                            <div class="form-group">
                                <label for="" class="form-label">Фото</label>
                                <br>
                                <input type="file" name="photo" class="form-input">
                            </div>
                            <div class="form-group mt-10">
                                <input type="submit" class="form-submit" value="Сменить статус">
                            </div>
                        </form>
                @endif
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
