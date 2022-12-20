<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{
    private static function productslist(){
        return [ 
            ['id' => 1, 'name' => 'hp', 'count' => 2 , 'selling_price' => 100 , 'buying_price' => 80],
            ['id' => 2, 'name' => 'lg', 'count' => 2 , 'selling_price' => 100 , 'buying_price' => 80],
            ['id' => 3, 'name' => 'acer', 'count' => 2 , 'selling_price' => 100 , 'buying_price' => 80],
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('products.index', [
            'items' => Product::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $request->validate([
            'product-name' => 'required',
            'product-count' => 'required | integer',
            'buying-price' => ['required','integer'],
            'selling-price' => ['required','integer'],
        ]);
        $product = new Product();
        
        $product->name = strip_tags($request->input('product-name'));
        $product->count = strip_tags($request->input('product-count'));
        $product->buying_price = strip_tags($request->input('buying-price'));
        $product->selling_price = strip_tags($request->input('selling-price'));

        $product->save();
        return redirect()->route('products.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $index = Product::findOrFail($id);

        return view('products.show' , [
            'item' => $index
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
