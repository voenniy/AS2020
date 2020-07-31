@extends('layouts.app')

@section('content')
    <div>
        <h1>Профиль</h1>
        <div class="Main_body">
            <div class="flex">
                <div class="flex_col">
                    <img src="{{ auth()->user()->avatar ? 'data:image;base64,' . stream_get_contents(auth()->user()->avatar) : '/static/img/clear-prof.png' }}" style="width:120px">
                    <form method="GET" action="{{ route('user.update') }}">
                        <button class="mt-5 btn_blue" >Редактировать</button>
                    </form>
                </div>
                <div class="ml-5">
                    <label>Фамилия
                        <strong><a class="Nav_item"> {{ auth()->user()->last_name }} </a></strong>
                    </label>
                    <label>Имя
                        <strong> <a class="Nav_item"> {{ auth()->user()->name }} </a></strong>
                    </label>
                    <label> Отчество
                        <strong><a class="Nav_item"> {{ auth()->user()->middle_name }} </a></strong>
                    </label>
                    <div class="flex mt-3">
                        <label>
                            Дата рождения
                            <strong><a class="Nav_item"> {{ optional(auth()->user()->birthday)->format('d-m-Y') }} </a></strong>
                        </label>
                        <label class="ml-5">
                            Пол
                            <strong><a class="Nav_item"> {{ auth()->user()->gender }} </a></strong>
                        </label>
                    </div>
                </div>
                <div class="ml-5">
                    <label>Email
                        <strong><a class="Nav_item"> {{ auth()->user()->email }} </a></strong>
                    </label>
                    <label>Телефон
                        <strong><a class="Nav_item"> {{ auth()->user()->phone }} </a></strong>
                    </label>
                </div>
            </div>
        </div>
    </div>
@endsection
