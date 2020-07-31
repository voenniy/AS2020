@extends('layouts.app')

@section('content')
    <div class="flex mt-5">
        <div>
            <h2>Мои поездки</h2>
            <form method="GET" action="{{ route('orders.index') }}">
            <div class="flex mt-3">
                    <img
                    src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHZpZXdCb3g9IjAgMCAyMCAyMCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTE5LjA2MTYgMEgwLjkzODU4OUMwLjEwNTg1NSAwIC0wLjMxNDM0IDEuMDEwMzkgMC4yNzU2OTkgMS42MDA0M0w3LjQ5OTk5IDguODI1ODJWMTYuODc1QzcuNDk5OTkgMTcuMTgwOSA3LjY0OTI1IDE3LjQ2NzYgNy44OTk4OCAxNy42NDNMMTEuMDI0OSAxOS44Mjk4QzExLjY0MTQgMjAuMjYxMyAxMi41IDE5LjgyMzkgMTIuNSAxOS4wNjE3VjguODI1ODJMMTkuNzI0NSAxLjYwMDQzQzIwLjMxMzMgMS4wMTE1NiAxOS44OTYgMCAxOS4wNjE2IDBaIiBmaWxsPSJ3aGl0ZSIvPgo8L3N2Zz4K"
                    class="mr-3">
                    <input placeholder="Место отправления" name="filter_from" value="{{ request('filter_from') }}"> 
                    <input placeholder="Место назначения" name="filter_to" value="{{ request('filter_to') }}">

            </div>
            <button type="submit" class="btn_blue mt-2 ml-4">Найти</button>
            </form>
            <table class="mt-4">
                <tbody>
                <tr>
                    <th>Место отправления</th>
                    <th>Место прибытия</th>
                    <th>Время заказа</th>
                    <th>Статус</th>
                    <th>Тип</th>
                </tr>
                @foreach($orders as $order)
                <tr class="{{ $order->next_status_css  }}" data-status="{{ $order->next_status  }}" data-workflow="/orders/{{ $order->id }}?status={{ $order->next_status  }}">
                    <td>{{ $order->from }}</td>
                    <td>{{ $order->to }}</td>
                    <td>{{ $order->created_at->format('H:m d-m-Y') }}</td>
                    <td>{{ $order->status->title }}</td>
                    <td>{{ $order->transportType->title }}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
            <div class="mt-3 ml-5">
            {{ $orders->withQueryString()->links() }}
            </div>
        </div>
        <form method="post" action="{{ route('orders.create') }}">
        @csrf
        <div class="ml-5"><h2>Новая поездка</h2>
            <input placeholder="Откуда" class="my-3" name="from" value="{{ old('from') }}">
            <input placeholder="Куда" name="to" value="{{ old('to') }}">

            <label>Tранспорт
                <select placeholder="Обязательно" name="transport_type_id">
                    <option value="NULL" selected="">Выберите транспорт</option>
                    @foreach($types as $type)
                    <option value="{{ $type->id }}">{{ $type->title }}</option>
                    @endforeach
                </select>
            </label>
        </div>
        <div class="ml-5">
            <button class="btn_green mt-5" type="submit">Поехали</button>
        </div>
        </form>
    </div>
@endsection
