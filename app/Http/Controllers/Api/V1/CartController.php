<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CartRequest;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use function Doctrine\Common\Cache\Psr6\get;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::with('cart.product.image')->findOrFail(auth()->id());

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CartRequest $request)
    {
        $cart= Cart::where('user_id','=',auth()->id())->where('product_id','=',$request->product_id)->first();
        if($cart!=null){
            if($request->amount!=0){
                $cart->amount+=$request->amount;
                $cart->save();
                return response()->json(["status"=>"successful"]);
            }
                return response()->json(["status"=>"error","error"=>"Amount shouldn't be equal to 0"]);
        }else{
            $cart=new Cart();
            $cart->user_id=auth()->id();
            if(!Product::find($request->product_id)){

                return response()->json(["status"=>"error","error"=>"Product not faund"]);
            }
            $cart->product_id=$request->product_id;
            if($request->amount!=0){
                $cart->amount=$request->amount;
                $cart->save();
                return response()->json(["status"=>"successful"]);
            }
            return response()->json(["status"=>"error","error"=>"Amount shouldn't be equal to 0"]);
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
        return $cart = Cart::all()->where('user_id', '==', auth()->id())->where('id', '==', $id);
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
        if($user=User::find(auth()->id())->cart->where('id',$id)){
           $cart=Cart::find($id);
           if($request->amount!=0){
               $cart->amount=$request->amount;
               $cart->save();
           }else{
               return response()->json(["status"=>"error","error"=>"Amount shouldn't be equal to 0"]);
           }
           return $cart;
        }
        else{
           return response()->json('error');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $user=User::find(auth()->id())->cart->where('id',$id);
        if($user!="[]"){
            $cart=Cart::destroy($id);
            return response()->json('successful');
        }
        else{
            return response()->json([
                "message"=> "Error"
            ]);
        }
    }
}
