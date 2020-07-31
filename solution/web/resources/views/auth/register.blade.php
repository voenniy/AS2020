@extends('layouts.auth')

@section('content')
    <div id="__layout">
        <div>
            <div class="Login flex_col"><a href="/" class="logo nuxt-link-active">DRON TAXI</a>
                <div class="Register_form">
                    <h2>Регистрация</h2>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <label>Фамилия *
                            <input placeholder="Ввведите фамилию" name="last_name" value="{{old('last_name')}}">
                            @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </label>
                        <label>Имя *
                            <input placeholder="Ввведите имя" name="name" value="{{old('name')}}">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </label>
                        <label>Отчество
                            <input placeholder="Ввведите логин" name="middle_name" value="{{old('middle_name')}}">
                            @error('middle_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </label>
                        <label>Email *
                            <input placeholder="Ввведите логин" name="email" value="{{old('email')}}">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </label>
                        <label>Пароль *
                            <input placeholder="Ввведите пароль" name="password" type="password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </label>
                        <label>Подтвердите пароль *
                            <input placeholder="Ввведите пароль" name="password_confirmation" type="password">
                            @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </label>
                        <div class="flex y_center my-3">
                            <button class="flex_1 btn_green">Зарегистрироваться</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
