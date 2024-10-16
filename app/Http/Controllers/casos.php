<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class casos extends Controller
{
    public function index(){
        return view("sorteocasos");
    }
}
