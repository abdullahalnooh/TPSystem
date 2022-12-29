@extends('layouts.app')

@section("content")
<div class=" py-4 ">
    @if (auth()->check())
    <h3 class="mb-2">Products list</h3>
    <th scope="row">{{$item['id']}}</th>
    <td>{{$item['name']}}</td>
    <td>{{$item['count']}}</td>
    <td>{{$item['buying_price']}}</td>
    <td>{{$item['selling_price']}}</td>
    @else
    <p>you must login</p>
    @endif
</div>
@endsection