<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Person;

class PrivateControllers extends Controller
{
    public function dashboard(Request $request)
    {
        $UserName = $request->session()->get('UserName');
        $person = new Person;
        $person = Person::find($UserName);
        return view('admin.dashboard');
        // return view('admin.dashboard', ['person' => $person]);
    }

    public function verification(Request $request)
    {
        $UserName = $request->session()->get('UserName');
        $person = new Person;
        $person = Person::find($UserName);
        return view('verification', ['person' => $person]);
    }
}
