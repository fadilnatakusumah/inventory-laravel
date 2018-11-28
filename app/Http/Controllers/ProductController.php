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
        ->with('categoriesProduct', $categoriesProduct);;
    }

    public function addingProduct(Request $req){
        // $checkRequest = Validator::make($req->all(), [
        //     'name' => 'required|max:255',
        //     'category_product_id' => 'required',
        //     'supplier_id' => 'required',
        //     'code' => 'required|max:255',
        //     'description' => 'required',
        //     'weight' => 'required|numeric|max:255',
        //     'price' => 'required|numeric|max:255',
        //     'stock' => 'required|numeric|max:255',
        //     'status' => 'required'
        // ]);
        $this->validate($req, [
            'name' => 'required|max:255',
            'category_product_id' => 'required',
            'supplier_id' => 'required',
            'code' => 'required|max:255',
            'description' => 'required',
            'weight' => 'required|numeric|max:255',
            'price' => 'required|numeric|max:255',
            'stock' => 'required|numeric|max:255',
            'status' => 'required'
        ]);

        // dd($req);

        // if($checkRequest->fails()){
        //     Session::flash('fail', "Please check all the fields before submit");
        //     return redirect()->route('products.view')
        //     ->withErrors('errors');
        // }else{
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
        // }

    }

    public function editProductView($id){
        $title = "Edit Products";
        $product = Product::find($id);

        return view('ProductViews.edit')
        ->with('product', $product)
        ->with('title', $title);
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
