@extends('layouts.app2')
@section('content')
<div class="py-6 px-4">
    <div class="bg-gray-100 text-xl mb-10">
        Maak een item (bijv deeg, uien)
    </div>
    <div>
        <form method="post" action="{{ route('item.store') }}">
            @csrf
            <label class="block">
                <span class="text-gray-700">naam pizza onderdeel</span>
                <input
                    class="border-2 border-grey-dark mb-10 form-input mt-1 block w-full"
                    type="text"
                    placeholder=""
                    name="name">
            </label>
            <label class="block">
                <span class="text-gray-700">prijs in centen</span>
                <input
                    class="border-2 border-grey-dark mb-10 form-input mt-1 block w-full"
                    type="number"
                    placeholder=""
                    name="price">
            </label>
            <label class="block">
                <span class="text-gray-700">Eenheid grootte</span>
                <select name="unit_id" class="appearance-none mb-10 form-input mt-1 block w-full">
                    @foreach ($units as $unit)
                        <option value={{ $unit->id }}>
                                {{ $unit->name }}
                        </option>
                    @endforeach
                </select>
            </label>
            <input type="submit" value="maak item" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">
        </form>
    </div>
</div>
@endsection
