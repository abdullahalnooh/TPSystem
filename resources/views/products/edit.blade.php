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
            
            <label for="product-count" class="text-sm form-label">How many Products</label>
            <input id="product-count" name="product-count" type="text" class="text-lg border-1 form-control" />
            @error('product-count')
            <p class="text-danger">
                {{$message}}
               </p>
           @enderror
        </div>
        <div class="bt-3 form-check">
            <label for="buying" class="text-sm form-label">Buying</label>
            <input id="buying" value="buying" name="sections"  type="radio"  />
            
            <label for="selling" class="text-sm form-label">selling</label>
            <input id="selling" value="selling" name="sections"  type="radio"  />
            
            @error('sections')
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