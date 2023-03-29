@extends('layouts.main_layout')

@section('content')
    <h2>Вход</h2>
    <div class="form-wrapper">
        <div class="form in-center">
            
            <form action="{{ route('auth') }}" method="post">
                    @csrf
                    @if($errors->any())
                    <div class="errors-block">
                        @foreach($errors->all() as $error)
                            {{ $error }}
                            <br>
                        @endforeach
                    </div>
                    @endif
                <div class="form-group mt-10">
                    <label for="" class="form-label">Логин</label>
                    <br>
                    <input type="text" name="login" required class="form-input">
                </div>
                <div class="form-group mt-10">
                    <label for="" class="form-label">Пароль</label>
                    <br>
                    <input type="password" name="password" required class="form-input">
                </div>
                <div class="form-group mt-10">
                    <input type="submit" value="Войти" class="form-submit">
                </div>
            </form>
        </div>
    </div>
@endsection
