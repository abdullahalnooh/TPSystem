@extends('layouts.app')

@section("content")
<div class=" py-4 ">
    @if (auth()->check())
    <h3 class="mb-2">Products list</h3>
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">count</th>
          <th scope="col">buying price</th>
          <th scope="col">selling price</th>
          <th scope="col"></th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
  
          @foreach ($items as $item)
          
              <tr>  
              
                  <th scope="row">{{ $loop->index + 1 }}</th>
                  <td>{{$item['name']}}</td>
                  <td>{{$item['count']}}</td>
                  <td>{{$item['buying_price']}}</td>
                  <td>{{$item['selling_price']}}</td>
                  <td><a href={{route("products.edit" , ['product' => $item['id']])}}><button class="btn btn-secondary">Buy Or Sell</button></a></td>
                  <td>
                    <form method="POST" action="{{route("products.destroy" , ['product' => $item['id']])}}">
                      @csrf
                      @method('DELETE')
                      
                      <button 
                        class="btn btn-secondary" 
                        href="{{route('products.destroy' , ['product' => $item['id']])}}" 
                        value="submit" 
                        type="submit"
                        >
                        delete
                      </button>
                    </form>
                    </td>
                
              </tr>
            

          @endforeach
        

      </tbody>
  </table>
    @else
        <p>You must be logged in to view this content.</p>
    @endif

   

</div>
@endsection