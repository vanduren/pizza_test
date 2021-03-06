@extends('layouts.app2')
@section('content')
<div class="py-6 px-4">
    <div class="bg-gray-100 text-xl mb-10">
        Maak een eenheid (unit)
    </div>
    <div>
        <form method="post" action="{{ route('unit.store') }}">
            @csrf
            <label class="block">
                <span class="text-gray-700">Name</span>
                <input
                    class="border-2 border-grey-dark mb-10 form-input mt-1 block w-full"
                    placeholder="geef een eenheid bijv 10 gram 1 stuk"
                    name="name">
            </label>
            <input type="submit" value="maak eenheid" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">
        </form>
    </div>
</div>
@endsection
