<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoutesController extends Controller
{
    public function index(){
        return view('index');
    }

    public function ajaxrequestusername(){
        return "test";
    }
}
