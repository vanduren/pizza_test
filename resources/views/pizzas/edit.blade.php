@extends('layouts.app2')
@section('content')
<div class="py-6 px-4">
    <div class="bg-gray-100 text-xl mb-10">
        Wijzig een pizza
    </div>
    <div>
        <form method="post" action="{{ route('pizza.update', $pizza) }}">
            @csrf
            @method('put')
            <label class="block">
                <span class="text-gray-700">Name</span>
                <input
                    class="border mb-10 form-input mt-1 block w-full"
                    placeholder="naam voor pizza"
                    name="name"
                    value="{{ $pizza->name }}">
            </label>
            <input type="submit" value="wijzig pizza" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">
        </form>
        <div class="container mx-auto text-gray-700 mt-4">
            <?php $i = 0; ?>
            @foreach ($itemsPizza as $itemPizza)
                <form action="{{ route('item_pizza.destroy', $itemPizza) }}" method="post">
                    @csrf
                    @method('delete')
                    <div class="grid grid-cols-4 gap-6 mb-4">
                    <div>
                        {{ $pizza->items[$i]->name }}
                    </div>
                    <div>
                        <input type="submit" value="verwijder pizza item" class="bg-red-400 hover:bg-red-700 text-white font-bold py-2 px-4 border border-red-700 rounded">
                    </div>
                </div>
                <?php $i++; ?>
            </form>
            @endforeach
        </div>
        <div class="container mx-auto text-gray-700 mt-4">
            <div>
                <input
                    id="itemPizzaAddSelector"
                    type="submit"
                    value="extra pizza item?"
                    class="border-2 border-grey-dark bg-blue-400 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded"
                    onClick="showDiv()">
            </div>
            <form id="itemPizza" action="{{ route('item_pizza.store') }}" method="post" class="invisible">
                @csrf
                <select name="item_id" class="block appearance-none bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                    @foreach ($items as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                <input type="hidden" name="pizza_id" value="{{ $pizza->id }}">
                <div>
                    <input
                        type="submit"
                        value="voeg item toe"
                        class="bg-blue-400 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">
                </div>
            </form>
        </div>
        <div>
            Totale kostprijs: €{{ $pizza->items->sum('price')/100 }}
        </div>
    </div>
</div>
<script>
function showDiv() {
    var x = document.querySelector('#itemPizza');
    x.classList.toggle("invisible");
    var x = document.querySelector('#itemPizzaAddSelector');
    x.classList.toggle("invisible");
}
</script>
@endsection
