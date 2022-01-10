<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        return view('index');
    }

<<<<<<< HEAD
    public function product($id){

=======

    public function product(){
          $id=\request()->segment(3);
>>>>>>> 6278913b1bf307b5454c57a06420f8ab3fdf78f4
        return view('productes.product',compact('id'));
    }

    public function checkout(){
        return view('checkout.checkout');
    }

    public function store(){
        return view('store.store');
    }
    public function blank(){
        return view('blank.blank');
    }

}
