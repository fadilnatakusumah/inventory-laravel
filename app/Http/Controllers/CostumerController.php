<?php

namespace App\Http\Controllers;

use App\Costumer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CostumerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Costumers';
        $costumers = Costumer::all();

        return view('CostumerViews.index')
        ->with('title', $title)
        ->with('costumers', $costumers);
    }

    public function addingCostumer(Request $req){
        $checkValid = Validator::make($req->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'phone' => 'required|numeric',
            'birthday' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'status' => 'required',
        ]);

        if($checkValid->fails()){
            Session::flash('fail', 'Fail when adding new Costumer');
            return redirect()->route('costumers.view')
            ->withErrors($checkValid)
            ->withInput();
        }else{
            $newCostumer = Costumer::create([
                'name' => $req->name,
                'email' => $req->email,
                'address' => $req->address,
                'phone' => $req->phone,
                'birthday' => $req->birthday,
                'country' => $req->country,
                'state' => $req->state,
                'city' => $req->city,
                'status' => $req->status,
            ]);
            
            Session::flash('success', 'Success adding new Costumer');
            return redirect()->route('costumers.view');
        }
    }

    public function editCostumerView($id){
        $title = "Edit Costumer";
        $costumer = Costumer::find($id);

        return view('CostumerViews.edit')
        ->with('title', $title)
        ->with('costumer', $costumer);
    }

    public function editingCostumer(Request $req){
        $costumer = Costumer::find($req->id);
        $checkValid = Validator::make($req->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'phone' => 'required|numeric',
            'birthday' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'status' => 'required',
        ]);

        if($checkValid->fails()){
            Session::flash('fail', 'Fail when updating Costumer');
            return redirect()->route('costumers.view')
            ->withErrors($checkValid)
            ->withInput();
        }else{
            $costumer->name = $req->name;
            $costumer->email = $req->email;
            $costumer->address = $req->address;
            $costumer->phone = $req->phone;
            $costumer->birthday = $req->birthday;
            $costumer->country = $req->country;
            $costumer->state = $req->state;
            $costumer->city = $req->city;
            $costumer->status = $req->status;
            $costumer->save();
            
            Session::flash('success', 'Success updating Costumer');
            return redirect()->route('costumers.view');
        }
    }

    public function deletingCostumer($id){
        $deleteCostumer = Costumer::find($id);
        $deleteCostumer->delete();

        Session::flash('success', 'Success deleting Costumer');
        return redirect()->route('costumers.view');
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
     * @param  \App\Costumer  $costumer
     * @return \Illuminate\Http\Response
     */
    public function show(Costumer $costumer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Costumer  $costumer
     * @return \Illuminate\Http\Response
     */
    public function edit(Costumer $costumer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Costumer  $costumer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Costumer $costumer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Costumer  $costumer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Costumer $costumer)
    {
        //
    }
}
