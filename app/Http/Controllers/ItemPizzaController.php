<?php

namespace App\Http\Controllers;

use App\Models\ItemPizza;
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
        //
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
        dd($itemPizza);
    }
}
