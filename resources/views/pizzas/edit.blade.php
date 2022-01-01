@extends('layouts.app')
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
            <div class="container mx-auto text-gray-700 ">
                @foreach ($pizza->items as $item)
                <div class="grid grid-cols-4 gap-6 mb-4">
                    <div>
                        {{ $item->name }}
                    </div>
                    <div>
                        <a href="{{ route('item_pizza.destroy', $item) }}"
                        class="bg-red-600 hover:bg-yellow-200 text-white text-center py-2 px-4 rounded">Verwijder item</a>
                    </div>
                </div>
                @endforeach
            </div>
            <input type="submit" value="wijzig pizza" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">
        </form>
    </div>
</div>
@endsection
