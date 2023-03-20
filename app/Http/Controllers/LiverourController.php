<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;
use App\Models\Restaurant;
use App\Models\Livreur;

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
        foreach( $Livreur as $livreur ){
            $livreur->Levrour->image ;
        }
        return view('admin.Restaurants', ['Person' => $Person , 'restaurants' => $Livreur]);
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
}
