@extends('layouts.app2')
@section('content')
<div class="py-6 px-4">
    <div class="bg-gray-100 text-xl mb-10">
        Wijzig uw bestelling met ordernummer {{ $order->id }}<br>
        Uw bestelling is {{ $order->status }}<br>
        Totaal te betalen: €{{ $order->price }} <small>uw totaal bedrag wordt bijgewerkt na wijzigen</small>
    </div>
    <div>
        <form method="post" action="{{ route('order.update', [$order]) }}">
            @csrf
            @method('put')
            @foreach ($pizzas as $pizza)
                <div class="border-2 border-grey-dark mb-10 form-input mt-1 block w-full">
                    <input
                        type="checkbox"
                        id="{{ $pizza->id }}"
                        name="pizzas[]"
                        {{-- {{ foreach($orderPizzas as $orderPizza){($orderPizza->pizza_id == $pizza->id) ? 'selected' : ''} }}                        value="{{ $pizza->id }}"> --}}
                        @foreach($orderPizzas as $orderPizza)
                            {{ ($orderPizza->pizza_id == $pizza->id) ? 'checked' : '' }}
                        @endforeach
                        value="{{ $pizza->id }}">
                    <label for="{{ $pizza->id }}">{{ $pizza->name }}</label>
                    <input
                        type="number"
                        name="amounts[{{ $pizza->id }}]"
                        class="ml-2"
                        placeholder="Aantal"
                        value=
                            @foreach($orderPizzas as $orderPizza)
                                {{($orderPizza->pizza_id == $pizza->id) ? $orderPizza->amount : ''}}
                            @endforeach>
                    <div>
                        ingredienten:
                        @foreach ($pizza->items as $item)
                            {{ $item->name }},
                        @endforeach
                    </div>
                    <div>
                        <input type="hidden" name="price_{{ $pizza->id }}" value="{{ round($pizza->items->sum('price')/100*1.21*2, 2) }}">
                        prijs: €{{ round($pizza->items->sum('price')/100*1.21*2, 2) }}
                    </div>
                </div>
            @endforeach
            <div class="flex gap-5">
                <button
                    type="submit"
                    class="basis-1/6 text-center bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                    {{ ($order->status <> 'pending') ? 'hidden' : '' }}>
                    wijzig bestelling
                </button>
                <a href="{{ route('order.index') }}" class="basis-1/6 text-center bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    terug
                </a>
            </div>
        </button>
        </form>
    </div>
</div>
@endsection
