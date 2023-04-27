<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;
use App\Models\Restaurant;
use App\Models\Livreur;
use App\Models\Order;

class LiverourController extends Controller
{
    public function dashboard(Request $request)
    {
        $Person = $request->session()->get('Person');
        return view('admin.dashboard', ['Person' => $Person]);
    }

    public function restaurants(Request $request)
    {
        $Person = $request->session()->get('Person');
        $Livreur = Livreur::where('id_livreur', $Person->id_people )->get();
        return view('admin.Restaurants', ['Person' => $Person , 'restaurants' => $Livreur]);
    }

    public function order(Request $request)
    {
        $Person = $request->session()->get('Person');
        $Orders = Order::orderBy('created_at', 'desc')->where('id_Livrour' , $Person->id_people )->whereIn('Order_serves', [3,4,6])->get();
        return view('admin.Order', ['Person' => $Person , 'Orders' => $Orders ]);
    }

    public function contacts(Request $request)
    {
        $Person = $request->session()->get('Person');
        return view('admin.Contacts', ['Person' => $Person]);
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
