<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Orders\EditRequest;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::query()->paginate(config('pagination.admin.orders'));

        return view('admin.orders.index', [
            'orders' => $orders
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Order $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return view('admin.orders.edit', [
            'order' => $order
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EditRequest $request
     * @param Order $order
     * @return RedirectResponse
     */
    public function update(EditRequest $request, Order $order): RedirectResponse
    {
        $order = $order->fill($request->validated());

        if($order->save()) {
            return redirect()->route('admin.order.index')
                ->with('success', __('messages.orders.update.success'));
        }

        return back()->with('error', __('messages.orders.update.success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param Order $order
     *
     * @return RedirectResponse
     */
    public function destroy(Request $request,
                            Order $order): RedirectResponse
    {
        $orders = Order::destroy($order->id);

        if ($orders) {
            // пост не был удален, а был помещен в корзину
            return redirect()->route('admin.order.index')
                ->with('success', __('messages.orders.destroy.success'));
        }

        return back()->with('error', __('messages.orders.destroy.fail'));
    }

}
