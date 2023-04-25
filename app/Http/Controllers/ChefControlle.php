<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;
use App\Models\Restaurant;
use App\Models\meal;
use App\Models\Order;

class ChefControlle extends Controller
{

    public function dashboard(Request $request)
    {
        $Person = $request->session()->get('Person');
        return view('admin.dashboard', ['Person' => $Person]);
    }

    public function restaurants(Request $request)
    {
        $Person = $request->session()->get('Person');
        $restaurants = Restaurant::where('id_chef', $Person->id_people )->get();
        return view('admin.Restaurants', ['Person' => $Person , 'restaurants' => $restaurants]);
    }

    public function meals(Request $request)
    {
        $Person = $request->session()->get('Person');
        $meals = meal::all() ;
        return view('admin.Meals', ['Person' => $Person , 'meals' => $meals ]);
    }

    public function order(Request $request)
    {
        $Person = $request->session()->get('Person');
        $restaurants = Restaurant::where('id_chef', $Person->id_people )->first();
        $Orders = Order::orderBy('created_at', 'desc')->where('id_restaurant' , $restaurants->id_restaurant )->where('Order_serves', '1')->get();
        return view('admin.Order', ['Person' => $Person , 'Orders' => $Orders ]);
    }

    
    public function Profile(Request $request)
    {
        $Person = $request->session()->get('Person');
        return view('admin.Profile', ['Person' => $Person]);
    }

    public function Update(Request $request)
    {
        $Person = $request->session()->get('Person');
        return view('admin.Update', ['Person' => $Person]);
    }

    public function Updatepassword(Request $request)
    {
        $Person = $request->session()->get('Person');
        return view('admin.Updatepassword', ['Person' => $Person]);
    }

    public function SignOut(Request $request)
    {
        $request->session()->forget('Person');
        return redirect('/');
    }
}
