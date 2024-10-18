<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Vista extends Controller
{
   public function index(){
    return view('index');
   }
}