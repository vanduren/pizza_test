<?php

namespace App\Http\Controllers;

use App\Models\ItemPizza;
use App\Models\Pizza;
use Illuminate\Http\Request;

class ItemPizzaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
        // add an item from the pizza edit form
        // item_id is the id of the item to be added
        // and pizza_id is the id of the pizza being edited
        // dd([$request->item_id, $request->pizza_id]);
        ItemPizza::create($request->all());
        // get the pizza to return to editing the correct pizza
        $pizza = Pizza::find($request->pizza_id);
        return redirect(route('pizza.edit', $pizza));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ItemPizza  $itemPizza
     * @return \Illuminate\Http\Response
     */
    public function show(ItemPizza $itemPizza)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ItemPizza  $itemPizza
     * @return \Illuminate\Http\Response
     */
    public function edit(ItemPizza $itemPizza)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ItemPizza  $itemPizza
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ItemPizza $itemPizza)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ItemPizza  $itemPizza
     * @return \Illuminate\Http\Response
     */
    public function destroy(ItemPizza $itemPizza)
    {
        // get the pizza to return to editing the correct pizza
        $pizza = Pizza::find($itemPizza->pizza_id);
        // dd($pizza);
        $itemPizza->delete();
        return redirect(route('pizza.edit', $pizza));
    }
}
