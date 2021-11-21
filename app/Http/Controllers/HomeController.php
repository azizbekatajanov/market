<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $id=1;
        return view('index',compact('id'));

//        readfile('/api/category');

        return view('index');
    }
}
