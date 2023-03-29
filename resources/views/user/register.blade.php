@extends('layouts.main_layout')

@section('content')
    <h2>Регистрация</h2>
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
            <div class="errors-block errors-validation-block disp-none">

            </div>
            <form id="form-register" action="{{ route('user.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="" class="form-label">ФИО</label>
                    <br>
                    <input type="text" name="fio" class="form-input" >
                </div>
                <div class="form-group mt-10">
                    <label for="" class="form-label">Логин</label>
                    <br>
                    <input type="text" name="login" class="form-input" >
                </div>
                <div class="form-group mt-10">
                    <label for="" class="form-label">Email</label>
                    <br>
                    <input type="email" name="email" class="form-input" >
                </div>
                <div class="form-group mt-10">
                    <label for="" class="form-label">Пароль</label>
                    <br>
                    <input type="password" name="password" class="form-input" >
                </div>
                <div class="form-group mt-10">
                    <label for="" class="form-label">Повторите пароль</label>
                    <br>
                    <input type="password" name="password_confirmation" class="form-input" >
                </div>
                <div class="form-group mt-10">
                    <input type="checkbox" name="agreement" required id="" >
                    <span class="privacy-agreement-text">
                        Я согласен на обработку персональных данных
                    </span>
                </div>
                <div class="form-group mt-10">
                    <input type="submit" value="Зарегистрироваться" class="form-submit">
                </div>
            </form>
        </div>
    </div>
    <script src="/js/register.js"></script>
@endsection
