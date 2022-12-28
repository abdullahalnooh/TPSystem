<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{
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
        return view('products.edit', [
            'item' => Product::findOrFail($id) 
        ]);

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
        // $updated->count = strip_tags($request->input('product-count'));

        // $updated->save();
        // return redirect()->route('products.show' , $id);

        $request->validate([
            'product-name' => 'required',
            'product-count' => 'required | integer',
            'sections' => 'required | in:buying,selling',
        ]);

        $product = Product::findOrFail($id);
        $section = $request->input('sections');
        $product->name = strip_tags($request->input('product-name'));
        $itemnumber = strip_tags($request->input('product-count'));

        if($section == 'buying'){
            $updatedItemsBought = $product->count + $itemnumber;
            $product->count = $updatedItemsBought;

        }elseif ($section == 'selling') {
            $updatedItemssold = $product->count - $itemnumber;
            $product->count = $updatedItemssold;

        }
        $product->save();
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $to_delete = Product::findOrFail($id);
        $to_delete->delete();
        return redirect()->route('products.index');
    }
}
