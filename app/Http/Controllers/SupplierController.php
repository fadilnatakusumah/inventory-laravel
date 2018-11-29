<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Suppliers";

        $suppliers = Supplier::all();
        return view('SupplierViews.index')
            ->with('title', $title)
            ->with('suppliers', $suppliers);
    }

    public function addingSupplier(Request $request)
    {
        $checkValid = Validator::make($request->all(), [
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required|numeric',
            'description' => 'required',
        ]);

        if ($checkValid->fails()) {
            Session::flash('fail', 'Fail adding new supplier');
            return redirect()->route('suppliers.view');
        } else {
            $newSupplier = Supplier::create([
                'name' => $request->name,
                'address' => $request->address,
                'phone' => $request->phone,
                'description' => $request->description,
            ]);
            Session::flash('success', 'New supplier successfully added');
            return redirect()->route('suppliers.view');
        }

    }

    public function editSupplierView($id)
    {
        $title = "Edit Supplier";
        $supplier = Supplier::find($id);

        return view('SupplierViews.edit')
            ->with('title', $title)
            ->with('supplier', $supplier);
    }

    public function editingSupplier(Request $request)
    {
        $editSupplier = Supplier::find($request->id);

        $checkValid = Validator::make($request->all(), [
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required|numeric',
            'description' => 'required',
        ]);

        if ($checkValid->fails()) {
            Session::flash('fail', 'Fail adding new supplier');
            return redirect()->route('suppliers.view');
        } else {
            $editSupplier->name = $request->name;
            $editSupplier->address = $request->address;
            $editSupplier->phone = $request->phone;
            $editSupplier->description = $request->description;

            $editSupplier->save();

            Session::flash('success', 'Supplier successfully edited');
            return redirect()->route('suppliers.view');
        }
    }

    public function deletingSupplier($id)
    {
        $supplier = Supplier::find($id);
        $supplier->delete();

        Session::flash('success', 'Supplier successfuly deleted');
        return redirect()->route('suppliers.view');
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
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        //
    }
}
