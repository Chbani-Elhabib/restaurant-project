<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Person;
use App\Models\Restaurant;
use App\Models\meal;
use App\Models\Order;

class AdminControllers extends Controller
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
        $users = Person::all();
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
        $restaurants = Restaurant::paginate(4);
        return view('admin.Restaurants', ['Person' => $Person , 'restaurants' => $restaurants]);
    }

    public function localimage(Request $request)
    {
        $fileName = time().'.'.$request->myFile->extension();
        $request->myFile->move('ImageRestaurant/', $fileName );
        return $fileName ;
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
        $Orders = Order::orderBy('created_at', 'desc')->get();
        $Restaurants = Restaurant::all();
        return view('admin.Order', ['Person' => $Person , 'Users' => $Users , 'meals' => $meals , 'Orders' => $Orders , 'Restaurants' => $Restaurants ] );
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
    public function FAQ(Request $request)
    {
        $Person = $request->session()->get('Person');
        return view('admin.FAQ', ['Person' => $Person]);
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
    public function SignOut(Request $request)
    {
        $request->session()->forget('Person');
        return redirect('/');
    }

}
