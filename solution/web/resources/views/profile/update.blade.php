@extends('layouts.app')

@section('content')
    <div>
        <h1>Профиль</h1>
        <div class="Main_body">
            <form method="post" action="{{ route('user.save') }}" enctype="multipart/form-data">
            @csrf
            <div class="flex">
                <div class="flex_col"><img src="{{ $user->avatar ? 'data:image;base64,' . stream_get_contents($user->avatar) : '/static/img/clear-prof.png' }}" style="width:120px">
                    <input id="file-upload" type="file" name="avatar">
                    <label for="file-upload" class="custom-file-upload mt-3">Обновить</label>
                    @error('avatar')
                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                </div>

                <div class="ml-5">
                    <label>Фамилия
                        <input placeholder="Фамилия" name="last_name" value="{{ $user->last_name }}">
                        @error('last_name')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </label>
                    <label>Имя
                        <input placeholder="Имя" name="name" value="{{ $user->name }}">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </label>
                    <label>Отчество
                        <input placeholder="Отчество" name="middle_name" value="{{ $user->middle_name }}">
                        @error('middle_name')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </label>

                    <label>Дата рождения
                        <div class="Calendar_Input">
                            <input id="date" name="birthday" class="Calendar_Input_inp" placeholder="15.02.2001" value="{{ optional($user->birthday)->format('d-m-Y')}}">
                        </div>
                        @error('birthday')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </label>
                    <label>Пол
                        <div>
                            <input type="radio"  value="М" name="gender" {{ $user->gender == 'М' ? 'checked' : '' }}>M
                            <input type="radio"  value="Ж" name="gender" class="ml-4"  {{ $user->gender == 'Ж' ? 'checked' : '' }}>Ж
                        </div>
                        @error('gender')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </label>
                </div>
                <div class="ml-5">
                    <label>Email
                        <input placeholder="Email" value="{{ $user->email }}" name="email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </label>
                    <label>Телефон
                        <input placeholder="Телефон" value="{{ $user->phone }}" name="phone" id="phone">
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </label>
                    <label>Пароль
                        <input placeholder="Пароль" name="password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </label>
                    <label>Подтверждение пароля
                        <input placeholder="Подтверждение пароля" name="password_confirmation">
                        @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </label>
                    <div class="mt-4 flex x_end">
                        <button class="btn_green" type="submit">Сохранить</button>
                         
                        <button class="btn_blue" onclick="document.location.href='/'; return false">Отмена</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
@endsection
