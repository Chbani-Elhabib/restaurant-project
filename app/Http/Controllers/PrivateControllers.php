<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Person;

class PrivateControllers extends Controller
{
    public function verification(Request $request)
    {
        // $UserName = $request->session()->get('UserName');
        // $person = new Person;
        // $person = Person::find($UserName);
        // return view('verification', ['person' => $person]);
        return view('verification');
    }

    public function dashboard(Request $request)
    {
        // $UserName = $request->session()->get('UserName');
        // $person = new Person;
        // $person = Person::find($UserName);
        return view('admin.Dashboard');
        // return view('admin.dashboard', ['person' => $person]);
    }

    public function users(Request $request)
    {
        // $UserName = $request->session()->get('UserName');
        // $person = new Person;
        // $person = Person::find($UserName);
        return view('admin.Users');
        // return view('admin.dashboard', ['person' => $person]);
    }
    public function restaurants(Request $request)
    {
        // $UserName = $request->session()->get('UserName');
        // $person = new Person;
        // $person = Person::find($UserName);
        return view('admin.Restaurants');
        // return view('admin.dashboard', ['person' => $person]);
    }
    public function booking(Request $request)
    {
        // $UserName = $request->session()->get('UserName');
        // $person = new Person;
        // $person = Person::find($UserName);
        return view('admin.Booking');
        // return view('admin.dashboard', ['person' => $person]);
    }
    public function contacts(Request $request)
    {
        // $UserName = $request->session()->get('UserName');
        // $person = new Person;
        // $person = Person::find($UserName);
        return view('admin.Contacts');
        // return view('admin.dashboard', ['person' => $person]);
    }
    public function about(Request $request)
    {
        // return 'jjj';
        // $UserName = $request->session()->get('UserName');
        // $person = new Person;
        // $person = Person::find($UserName);
        return view('admin.About');
        // return view('admin.dashboard', ['person' => $person]);
    }

}
