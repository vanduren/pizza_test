<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemPizza;
use App\Models\Pizza;
use Illuminate\Http\Request;

class PizzaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Pizza::find(2)->items);
        // dd(Pizza::find(2)->items->sum('price'));
        $pizzas = Pizza::all();
        return view('pizzas.index', ['pizzas' => $pizzas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pizzas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Pizza::create($request->all());
        return redirect(route('pizza.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pizza  $pizza
     * @return \Illuminate\Http\Response
     */
    public function show(Pizza $pizza)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pizza  $pizza
     * @return \Illuminate\Http\Response
     */
    public function edit(Pizza $pizza)
    {
        // get all items in case an item has to be added
        $items = Item::all();
        // get all items for the selected pizza
        $itemsPizza = ItemPizza::where('pizza_id', '=', $pizza->id)->get();
        // dd($itemsPizza);
        return view('pizzas.edit', ['pizza' => $pizza, 'itemsPizza' => $itemsPizza, 'items' => $items]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pizza  $pizza
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pizza $pizza)
    {
        // only pizza is edited
        // the items are edited using different buttons (form)
        $pizza->update($request->all());
        return redirect(route('pizza.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pizza  $pizza
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pizza $pizza)
    {
        // delete all items in item_pizza table
        // delete the pizza
        // $itemsPizza = ItemPizza::where('pizza_id', '=', $pizza->id)->get();
        // dd($itemsPizza);
        ItemPizza::where('pizza_id', '=', $pizza->id)->delete();
        Pizza::destroy($pizza->id);
        return redirect(route('pizza.index'));
    }
}
