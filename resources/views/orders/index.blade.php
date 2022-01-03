@extends('layouts.app2')

@section('content')
<div class="flex flex-col">
<div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
            <div class="my-5 mx-3">
                <a href="{{ route("order.create") }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded;">Plaats een bestelling</a>
            </div>
            <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    order id
                </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($orders as $order)
                <tr class=" items-start">
                    <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                        <a href="{{ route('order.edit', $order) }}" class="text-indigo-600 hover:text-indigo-900">{{ $order->id }}</a>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                        <a href="{{ route('order.edit', $order) }}" class="text-indigo-600 hover:text-indigo-900">{{ $order->status }}</a>
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                        <form action="{{ route('order.destroy', $order) }}" method="post">
                            @csrf
                            @method('delete')
                            <input type="submit" value="verwijder" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
        </div>
    </div>
</div>
@endsection