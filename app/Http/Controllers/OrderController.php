<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderPizza;
use App\Models\Pizza;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        return view('orders.index', ['orders' => $orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // the create is a view of all pizza's that can be chosen
        $pizzas = Pizza::all();
        return view('orders.create', ['pizzas' => $pizzas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // total price of the order
        $totalPrice = 0;
        foreach($request->pizzas as $pizzaRequest) {
            $pizza = Pizza::find($pizzaRequest);
            $totalPrice += round($pizza->items->sum('price')/100*1.21*2, 2);
        }
        // dd($totalPrice);
        // create a new order
        $order = new Order();
        $order->status = 'pending';
        $order->user_id = auth()->user()->id;
        $order->price = $totalPrice;
        $order->save();
        // use order to fill order_pizza table
        // the amounts are the amounts of the pizzas amounts[pizza_id]
        // in the forach loop, the $pizza_id are the chosen pizzas
        foreach ($request->pizzas as $pizza_id) {
            $order_pizza = new OrderPizza();
            $order_pizza->order_id = $order->id;
            $order_pizza->pizza_id = $pizza_id;
            $order_pizza->amount = $request->amounts[$pizza_id];
            $order_pizza->save();
        }
        return redirect()->route('order.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        // send current order, all pizzas associated wuth order, all pizzas
        $orderPizzas = OrderPizza::where('order_id', $order->id)->get();
        // dd($orderPizzas);
        return view('orders.edit', ['order' => $order, 'orderPizzas' => $orderPizzas, 'pizzas' => Pizza::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        // total price of the order
        $totalPrice = 0;
        foreach($request->pizzas as $pizzaRequest) {
            $pizza = Pizza::find($pizzaRequest);
            $orderPizza = OrderPizza::where('order_id', $order->id)->where('pizza_id', $pizzaRequest)->first();
            // price of the pizza including tax, multiplied by the amount and 2x cost price
            $totalPrice += round($pizza->items->sum('price')/100*1.21*2*$request->amounts[$pizzaRequest], 2);
        }
        // update order
        $order->price = $totalPrice;
        $order->update();
        // use order to fill order_pizza table
        foreach ($request->pizzas as $pizza_id) {
            $order_pizza = OrderPizza::where('order_id', $order->id)->where('pizza_id', $pizza_id)->first();
            if($order_pizza) {
                $order_pizza->amount = $request->amounts[$pizza_id];
                $order_pizza->update();
            } else {
                $order_pizza = new OrderPizza();
                $order_pizza->order_id = $order->id;
                $order_pizza->pizza_id = $pizza_id;
                $order_pizza->amount = $request->amounts[$pizza_id];
                $order_pizza->save();
            }
        }
        return redirect()->route('order.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        // delete all records from order_pizzas
        OrderPizza::where('order_id', '=', $order->id)->delete();
        // delete order
        Order::destroy($order->id);
        return redirect()->route('order.index');
    }
}
