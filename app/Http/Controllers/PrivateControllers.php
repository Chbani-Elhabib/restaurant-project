<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Person;

class PrivateControllers extends Controller
{
    public function verification(Request $request)
    {
        $Person = $request->session()->get('Person');
        return view('verification', ['Person' => $Person]);
    }

    public function dashboard(Request $request)
    {
        $Person = $request->session()->get('Person');
        return view('admin.dashboard', ['Person' => $Person]);
    }

    public function users(Request $request)
    {
        $Person = $request->session()->get('Person');
        return view('admin.Users', ['Person' => $Person]);
    }
    public function updateuser(Request $request,$Id)
    {
        $userUpdate = Person::where('Id', $Id)->first();
        $Person = $request->session()->get('Person');
        if (isset($userUpdate)) {
            return view('admin.UpdateUser', ['Person' => $Person , 'UpdateUser' => $userUpdate]);
        }else{
            return redirect()->back();
        }
    }
    public function restaurants(Request $request)
    {
        $Person = $request->session()->get('Person');
        return view('admin.Restaurants', ['Person' => $Person]);
    }
    public function booking(Request $request)
    {
        $Person = $request->session()->get('Person');
        return view('admin.Booking', ['Person' => $Person]);
    }
    public function contacts(Request $request)
    {
        $Person = $request->session()->get('Person');
        return view('admin.Contacts', ['Person' => $Person]);
    }
    public function about(Request $request)
    {
        $Person = $request->session()->get('Person');
        return view('admin.About', ['Person' => $Person]);
    }
    public function Profile(Request $request)
    {
        $Person = $request->session()->get('Person');
        return view('admin.Profile', ['Person' => $Person]);
    }
    public function Settings(Request $request)
    {
        $Person = $request->session()->get('Person');
        return view('admin.Settings', ['Person' => $Person]);
    }
    public function SignOut(Request $request)
    {
        $request->session()->forget('Person');
        return redirect('/');
    }

}
