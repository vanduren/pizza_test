@extends('layouts.app2')
@section('content')
@foreach ($pizzas as $pizza)
    <br><br>pizzaid: {{ $pizza->id }}<br><br>
    @foreach($orderPizzas as $orderPizza)
        orderpizzaid: {{ $orderPizza->pizza_id }}<br>
        orderpizzaamount: {{ $orderPizza->amount }}<br>
    @endforeach
@endforeach
<hr>
@foreach ($pizzas as $pizza)
    <br><br>pizzaid: {{ $pizza->id }}<br><br>
    @foreach($orderPizzas as $orderPizza)
        {{($orderPizza->pizza_id == $pizza->id) ? $orderPizza->amount : ''}}
    @endforeach
@endforeach
@endsection
