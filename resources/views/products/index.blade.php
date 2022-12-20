@extends('layout')
@section("content")
<div class=" py-4 ">
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
          </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
            
                <tr>  
                  
                    <th scope="row">{{$item['id']}}</th>
                    <td>{{$item['name']}}</td>
                    <td>{{$item['count']}}</td>
                    <td>{{$item['buying_price']}}</td>
                    <td>{{$item['selling_price']}}</td>
                    <td><a href={{route("products.show" , ['product' => $item['id']])}}><button class="btn btn-secondary">edit</button></a></td>
                  
                </tr>
              

            @endforeach
          

        </tbody>
      </table>
</div>
@endsection