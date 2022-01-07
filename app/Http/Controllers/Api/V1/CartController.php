<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CartRequest;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $cart=User::findOrFail(1)->with('cart.product.image')->get();
        return $cart;



    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CartRequest $request)
    {
         $cart=new Cart();
         $cart->user_id=1;
         $cart->product_id=$request->product_id;
         $cart->amount=$request->amount;
         $cart->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cart=User::findOrFail(auth()->id())->cart->where('id',$id);
       return $cart;
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
        $user=User::findOrFail(auth()->id())->cart->where('id',$id);
        if($user!="[]"){
           $cart=Cart::findOrFail($id);
           $cart->amount=$request->amount;
           $cart->save();
           return $cart;
        }
        else{
           return 'error';
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::findOrFail(auth()->id())->cart->where('id',$id);
        if($user!="[]"){
            $cart=Cart::destroy($id);
        }
        else{
            return 'error';
        }
    }
}
