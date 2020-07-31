@extends('layouts.auth')

@section('content')
    <div id="__layout">
        <div>
            <div class="Login flex_col"><a href="/" class="logo nuxt-link-active">DRON TAXI</a>
                <div class="Login_form">
                    <h2>АВТОРИЗАЦИЯ</h2>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <label>Логин
                            <input placeholder="Ввведите логин" name="username" value="{{old('username')}}">
                            @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </label>
                        <label>Пароль
                            <input placeholder="Ввведите пароль" name="password" type="password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </label>
                        <div class="flex y_center my-3">
                            <label class="flex_1 flex y_center"><input type="checkbox" name="remember_me">Запомнить</label>
                            <button class="flex_1 btn_blue">Войти</button>
                        </div>
                    </form>
                    <a href="{{ route('register') }}">
                        <button class="w_100 btn_green" onclick="window.location.href = '/register'">Регистрация</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
