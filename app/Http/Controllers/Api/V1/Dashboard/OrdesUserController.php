<?php

namespace App\Http\Controllers\Api\V1\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\OrdersUsers;
use App\Models\OrdersUsersList;
use Illuminate\Http\Request;

class OrdesUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart=OrdersUsers::all();
        return $cart;
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $search=OrdersUsersList::where('orders_users_id',$id)->get();
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
        $OrdersUsers=OrdersUsers::findOrFail($id);
        $OrdersUsers->user_id=auth()->id();
        $OrdersUsers->first_name=$request->first_name;
        $OrdersUsers->last_name=$request->last_name;
        $OrdersUsers->email=$request->email;
        $OrdersUsers->address=$request->address;
        $OrdersUsers->city=$request->city;
        $OrdersUsers->country=$request->country;
        $OrdersUsers->zip_code=$request->zip_code;
        $OrdersUsers->tel=$request->tel;
        $OrdersUsers->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroi=OrdersUsers::destroy($id);
    }
}
