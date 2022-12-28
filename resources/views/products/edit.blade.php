@extends('layout')
@section("content")
<div class="text-bg-light pt-2 flex justify-content-center ">
  
    <div class="flex justify-content-center  ">
    <form action="{{route('products.update' , ['product' => $item->id])}}" method="POST" class="form p-6 mt-5  shadow  bg-white border-2">
        @csrf
        @method('PUT')
        <div class="bt-3 form-check">
            <label for="product-name" class="text-sm form-label"> Name</label>
            <input id="product-name" name="product-name" value="{{$item->name}}" type="text" class="text-lg border-1 form-control" />
            @error('product-name')
            <p class="text-danger">
             {{$message}}
            </p>
            @enderror
        </div>
        <div class="bt-3 form-check">
            
            <label for="product-count" class="text-sm form-label">Count</label>
            <input id="product-count" name="product-count" value="{{$item->count}}" type="text" class="text-lg border-1 form-control" />
            @error('product-count')
            <p class="text-danger">
                {{$message}}
               </p>
           @enderror
        </div>
        <div class="bt-3 form-check">
            <label for="buying-price" class="text-sm form-label">Buying price</label>
            <input id="buying-price" name="buying-price" value="{{$item->buying_price}}" type="text" class="text-lg border-1 form-control" />
            @error('buying-price')
            <p class="text-danger">
                {{$message}}
               </p>
           @enderror
        </div>
        <div class="bt-3 form-check">
            <label for="selling-price" class="text-sm form-label">Selling price</label>
            <input id="selling-price" type="text" value="{{$item->selling_price}}" name="selling-price" class="text-lg border-1 form-control" />
            @error('selling-price')
            <p class="text-danger">
                {{$message}}
               </p>
           @enderror
        </div>
        <div class="bt-3 form-check">
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </div>
    <div>

</div>
@endsection