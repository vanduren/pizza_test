@extends('layouts.app2')
@section('content')
<div class="py-6 px-4">
    <div class="bg-gray-100 text-xl mb-10">
        Maak een pizza (na het aanmaken kun je de pizza bewerken en items toevoegen)
    </div>
    <div>
        <form method="post" action="{{ route('pizza.store') }}">
            @csrf
            <label class="block">
                <span class="text-gray-700">Name</span>
                <input
                    class="border-2 border-grey-dark mb-10 form-input mt-1 block w-full"
                    placeholder=""
                    name="name">
            </label>
            <input type="submit" value="maak item" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">
        </form>
    </div>
</div>
@endsection
