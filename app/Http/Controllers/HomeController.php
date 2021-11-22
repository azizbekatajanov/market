<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('index');
    }


    public function product($id){

        return view('productes.product',compact('id'));
    }


    public function contact(){
        return view('contactes.contact');
    }


    public function categories(){
        return view('categories.categori');
    }
}
