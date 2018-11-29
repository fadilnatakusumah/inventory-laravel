<?php

namespace App\Http\Controllers;

use App\CategoryProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Category Products";
        
        $categoryProducts = CategoryProduct::all();
        return view('CategoryProductViews.index')
        ->with('title', $title)
        ->with('categoryProducts', $categoryProducts);
    }

    public function addingCategory(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required'
        ]);

        if($request->parent_id === 0){
            $newCategory = CategoryProduct::create([
                'name' => $request->name,
                'parent_id' => $newCategory->id,
                'description' => $request->description
            ]);
        }else{
            $newCategory = CategoryProduct::create([
                'name' => $request->name,
                'parent_id' => $request->parent_id,
                'description' => $request->description
            ]);
        }

        Session::flash('success', 'New category for product successfully created');
        return redirect()->route('categoryProducts.view');

    }

    public function editCategoryView($id){
        $title = "Edit Category Product";
        $categoryProduct = CategoryProduct::find($id);
        $categoryProducts = CategoryProduct::all();
        
        return view('CategoryProductViews.edit')
        ->with('title', $title)
        ->with('categoryProduct', $categoryProduct)
        ->with('categoryProducts', $categoryProducts);
    }

    public function editingCategory(Request $request){
        $editCategory = CategoryProduct::find($request->id);

        $this->validate($request, [
            'name' => 'required',
            'description' => 'required'
        ]);

        $editCategory->name = $request->name;
        $editCategory->parent_id = $request->parent_id;
        $editCategory->description = $request->description;
        $editCategory->save();
        
        Session::flash('success', 'Category successfully edited');
        return redirect()->route('categoryProducts.view');
    }

    public function deletingCategoryProduct($id){
        $deleteCategory = CategoryProduct::find($id);
        $deleteCategory->delete();

        Session::flash('success', 'Category successfuly deleted');
        return redirect()->route('categoryProducts.view');
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
     * @param  \App\CategoryProduct  $categoryProduct
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryProduct $categoryProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CategoryProduct  $categoryProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryProduct $categoryProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CategoryProduct  $categoryProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoryProduct $categoryProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CategoryProduct  $categoryProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryProduct $categoryProduct)
    {
        //
    }
}
