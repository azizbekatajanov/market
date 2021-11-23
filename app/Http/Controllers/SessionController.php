<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

session_start();
class SessionController extends Controller
{
    protected $user;
    protected $name;
    public function test(Request $request){

        $data = [
            'id'=>$request->id,
            'count'=>$request->count
        ];

        $request->session()->put('cart',$data);

        dd($request->all());

        return  true;

        if (!isset($_SESSION['classTst'])) {

        }


             $s=new SessionController();
             $s->user=$id;
             $s->name="sdfsdf";

            $_SESSION['classTst'] = $s;
            dd($_SESSION['classTst']);

            return true;

    }
}
