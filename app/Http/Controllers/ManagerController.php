<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;
use App\Models\Restaurant;
use App\Models\meal;
use App\Models\Order;

class ManagerController extends Controller
{
    public function dashboard(Request $request)
    {
        $Person = $request->session()->get('Person');
        return view('admin.dashboard', ['Person' => $Person]);
    }

    public function users(Request $request)
    {
        $Person = $request->session()->get('Person');
        $users = Person::where('User_Group', 'User')->orWhere('User_Group', 'Liverour' )->orWhere('User_Group', 'Chef' )->get();
        return view('admin.Users', ['Person' => $Person , 'users' => $users ]);
    }

    public function updateuser(Request $request,$Id)
    {
        $userUpdate = Person::where('id_people', $Id)->first();
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
        $restaurants = Restaurant::where('id_manager', $Person->id_people )->get();
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
        $Users = Person::where('User_Group' , 'User')->get();
        $meals = meal::all();
        $Restaurants = Restaurant::where('id_manager' , $Person->id_people )->get();
        foreach( $Restaurants as $Restaurant ){
            foreach( $Restaurant->Livreur as $Livreur ){
                $Livreur->Levrour_person ;
            }
        }
        $Orders = Order::orderBy('created_at', 'desc')->where('id_restaurant' , $Restaurants[0]->id_restaurant )->get();
        foreach( $Orders as $Order ){
            $Order->Person_order ;
            $Order->Restaurant_order;
            $Order->image_order;
        }
        return view('admin.Order', ['Person' => $Person , 'Users' => $Users , 'meals' => $meals , 'Orders' => $Orders , 'Restaurants' => $Restaurants ]);
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
