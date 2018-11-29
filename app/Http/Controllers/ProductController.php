<?php

namespace App\Http\Controllers;

use App\Product;
use App\Supplier;
use App\CategoryProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "All Products";
        $products = Product::all();
        $suppliers = Supplier::all();
        $categoriesProduct = CategoryProduct::all();

        return view('ProductViews.index')
        ->with('title', $title)
        ->with('products', $products)
        ->with('suppliers', $suppliers)
        ->with('categoriesProduct', $categoriesProduct);
    }

    public function addingProduct(Request $req){
        $checkRequest = Validator::make($req->all(), [
            'name' => 'required',
            'category_product_id' => 'required',
            'supplier_id' => 'required',
            'code' => 'required',
            'description' => 'required',
            'weight' => 'required|numeric',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'status' => 'required'
        ]);

        if($checkRequest->fails()){
            Session::flash('fail', "Please check all the fields before submit");
            // return redirect()->route('products.view')
            // ->withErrors('errors');
            return redirect()->route('products.view')
                        ->withErrors($checkRequest)
                        ->withInput();
        }else{
            $newProduct = Product::create([
                'name' => $req->name,
                'category_product_id' => $req->category_product_id,
                'supplier_id' => $req->supplier_id,
                'code' => $req->code,
                'description' => $req->description,
                'weight' => $req->weight,
                'price' => $req->price,
                'stock' => $req->stock,
                'status' => $req->status
            ]);
            Session::flash('success', "Success adding new Product");
            return redirect()->route('products.view');
        }
    }

    public function deletingProduct($id){
        $prod = Product::find($id);

        $prod->delete();

        Session::flash('success', 'Product successfuly deleted');
        return redirect()->back();

    }

    public function editProductView($id){
        $title = "Edit Products";
        $product = Product::find($id);
        $categoriesProduct = CategoryProduct::all();
        $suppliers = Supplier::all();


        return view('ProductViews.edit')
        ->with('product', $product)
        ->with('title', $title)
        ->with('suppliers', $suppliers)
        ->with('categoriesProduct', $categoriesProduct);
    }

    public function editingProduct(Request $request){
        
        $title = "Edit Products";
        $product = Product::find($request->id);
        $product->name = $request->name;
        $product->code = $request->code;
        $product->weight = $request->weight;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->category_product_id = $request->category_product_id;
        $product->supplier_id = $request->supplier_id;
        $product->status = $request->status;
        $product->save();

        // $product = Product::where('id', $request->id)->update([
        //     $product->name => $request->name,
        //     $product->code => $request->code,
        //     $product->weight => $request->weight,
        //     $product->price => $request->price,
        //     $product->stock => $request->stock,
        //     $product->category_product_id => $request->category_product_id,
        //     $product->supplier_id => $request->supplier_id,
        //     $product->status => $request->status,
        // ]);




        Session::flash('success', 'Product successfuly edited');
        return redirect()->route('products.view');
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
