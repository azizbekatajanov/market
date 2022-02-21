<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrdersUsersRequest;
use App\Http\Requests\UsersOrdersRequest;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use App\Models\UserOrder;
use App\Models\UserOrdersItem;
use Illuminate\Http\Request;

class UserOrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart=UserOrder::all()->where('user_id','=',auth()->id());
        return $cart;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersOrdersRequest $request)
    {
        if( Cart::where('user_id','=',1)->get()!='[]') {

            $OrdersUsers = new UserOrder();
            $OrdersUsers->user_id = auth()->id();
            $OrdersUsers->first_name = $request->first_name;
            $OrdersUsers->last_name = $request->last_name;
            $OrdersUsers->email = $request->email;
            $OrdersUsers->address = $request->address;
            $OrdersUsers->city = $request->city;
            $OrdersUsers->country = $request->country;
            $OrdersUsers->zip_code = $request->zip_code;
            $OrdersUsers->tel = $request->tel;
            $OrdersUsers->order_notes = $request->order_notes;
            $OrdersUsers->save();
            $search = UserOrder::all()->where('user_id', '==', auth()->id())->sortByDesc('id')->first();
            $usercart = Cart::where('user_id', '=', $search->user_id)->get();

            $sum = 0;
            $price = 0;
            $amount = 0;
            $product = new Product();
            foreach ($usercart as $value) {

                $OrdersUsersList = new UserOrdersItem();
                $OrdersUsersList->user_orders_id = $search->id;
                $OrdersUsersList->user_id = $search->user_id;
                $OrdersUsersList->product_id = $value->product_id;
                $price = $OrdersUsersList->price = $product::findOrFail($value->product_id)->price;
                $amount = $OrdersUsersList->amount = $value->amount;
                $OrdersUsersList->save();
                $sum += $price * $amount;

            }
            $total_amount = UserOrder::findOrFail($search->id);
            $total_amount->total_amount = $sum;
            $total_amount->save();
            foreach (Cart::where('user_id','=',auth()->id())->get() as $value){
                Cart::destroy($value->id);
            }
            return $total_amount;
        }else{
            return "your cart is empty";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

      $search=UserOrdersItem::where('user_orders_id',$id)->get();
      $search1=$search[0];
      if(auth()->id()==$search1->id){
          return $search;
      }
      else{
          abort(404);
      }

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
