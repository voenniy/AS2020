<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Http\Requests\OrderStatusRequest;
use App\Order;
use App\OrderStatus;
use App\TransportType;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $orders = Order::whereAuthorId(auth()->id())
                    ->when(request()->has('filter_from'), fn ($query) => $query->where('from', 'ilike', '%' . request('filter_from') . '%'))
                    ->when(request()->has('filter_to'), fn ($query) => $query->where('to', 'ilike', '%' . request('filter_to') . '%'))
                    ->paginate(2);

        return view(
            'orders.index',
            [
                'orders' => $orders,
                'types'  => TransportType::all()

            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param OrderRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function create(OrderRequest $request)
    {
        $data = $request->all();
        $data['author_id'] = auth()->id();
        $data['status_id'] = OrderStatus::whereTitle('Создан')->first()->id;
        Order::create($data);
        return redirect(route('orders.index'));
    }

    /**
     * @param OrderStatusRequest $request
     * @param $order_id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($order_id)
    {
        if (request()->has('status')) {
            $status = request()->get('status');
            $order = false;
            switch ($status) {
                case 'Отменен':
                    $statusIds = OrderStatus::whereIn('title', ['Создан','В работе'])->get()->pluck('id')->values();
                    $order = Order::where(['id'=>$order_id, 'author_id'=>auth()->id()])->whereIn('status_id', $statusIds)->first();
                    break;
                case 'Завершен':
                    $statusId = OrderStatus::whereTitle('Выполнен')->first()->id;
                    $order = Order::where(['id' => $order_id, 'author_id'=>auth()->id(), 'status_id' => $statusId])->first();
                    break;
            }
            if ($order) {
                $order->status_id = OrderStatus::whereTitle($status)->first()->id;
                $order->save();
            }
        }


        return redirect(route('orders.index'));
    }
}
