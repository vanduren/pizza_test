@extends('layouts.app2')
@section('content')
<div class="py-6 px-4">
    <div class="bg-gray-100 text-xl mb-10">
        Voeg een pizza toe aan uw bestelling
    </div>
    <div>
        <form method="post" action="{{ route('order.store') }}">
            @csrf
            @foreach ($pizzas as $pizza)
                <div class="border-2 border-grey-dark mb-10 form-input mt-1 block w-full">
                    <input
                        type="checkbox"
                        id="{{ $pizza->id }}"
                        name="pizzas[]"
                        value="{{ $pizza->id }}">
                    <label for="{{ $pizza->id }}">{{ $pizza->name }}</label>
                    <input
                        type="number"
                        name="amounts[{{ $pizza->id }}]"
                        class="ml-2"
                        placeholder="Aantal"
                        {{-- value="{{ old('amounts.' . $pizza->id) }}"> --}}
                        value="1">
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
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Bestellen
            </button>
        </form>
    </div>
</div>
@endsection
