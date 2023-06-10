<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;
use App\Models\Restaurant;
use App\Models\meal;
use App\Models\Order;
use App\Models\Comment;
use App\Models\Livreur;

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
        $users = Person::where('User_Group', 'User')->orWhere('User_Group', 'Liverour' )->orWhere('User_Group', 'Chef' )->orderBy('updated_at', 'desc')->get();
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
        foreach ($restaurants as $restaurant) {
            $customerCounts[$restaurant->id_restaurant] = [
                'customer_count' => $restaurant->customers->count(),
                'star_customers_count' => $restaurant->customers()->where('star', '!=' , 0 )->count(),
                'star_customers_somme' =>  $restaurant->customers()->where('star', '!=' , 0 )->count() == 0 ?  0: $restaurant->customers()->where('star', '!=' , 0 )->sum('star') / $restaurant->customers()->where('star', '!=' , 0 )->count() ,
            ];
        }
        return view('admin.Restaurants', ['Person' => $Person , 'restaurants' => $restaurants , 'customerCounts' => $customerCounts ]);
    }

    public function updaterestaurants(Request $request)
    {
        $Person = $request->session()->get('Person');
        $Restaurants = Restaurant::where('id_manager', $Person->id_people )->first();
        $chef = Person::where('id_people', $Restaurants->id_chef )->first();
        $livreurs = Livreur::where('id_restaurant', $Restaurants->id_restaurant)->pluck('id_livreur');
        $livreurs = Person::where('User_Group', 'Liverour' )->where('city', $Restaurants->city )->whereNotIn('id_people', $livreurs )->get();
        return view('admin.RestaurantsUpdate', ['Person' => $Person , 'livreurs' => $livreurs ,'Restaurants' => $Restaurants , 'chef' => $chef ]);
    }


    public function meals(Request $request)
    {
        $Person = $request->session()->get('Person');
        $meals = meal::orderBy('created_at', 'DESC')->get() ;
        return view('admin.Meals', ['Person' => $Person , 'meals' => $meals ]);
    }

    public function order(Request $request)
    {
        $Person = $request->session()->get('Person');
        $Users = Person::where('User_Group' , 'User')->get();
        $meals = meal::all();
        $Restaurants = Restaurant::where('id_manager' , $Person->id_people )->get();
        $Orders = Order::orderBy('created_at', 'desc')->where('id_restaurant' , $Restaurants[0]->id_restaurant )->get();
        return view('admin.Order', ['Person' => $Person , 'Users' => $Users , 'meals' => $meals , 'Orders' => $Orders , 'Restaurants' => $Restaurants ]);
    }
    
    public function updateorder(Request $request , $id)
    {
        $Order = Order::where('id_order' , $id )->first();
        if(isset($Order)){
            $Person = $request->session()->get('Person');
            $Users = Person::where('User_Group' , 'User')->get();
            $Restaurants = Restaurant::where('id_manager' , $Person->id_people )->get();
            $meals = meal::all();
            return view('admin.UpdateOrder', ['Person' => $Person , 'Users' => $Users , 'Order' => $Order , 'meals' => $meals , 'Restaurants' => $Restaurants  ] );
        }
        return redirect()->back();
    }

    public function Comments(Request $request)
    {
        $Person = $request->session()->get('Person');
        $Users = Person::where('User_Group' , 'User')->get();
        $Restaurants = Restaurant::where('id_manager' , $Person->id_people )->get();
        $Comments = Comment::where('id_restaurant' , $Restaurants[0]->id_restaurant )->orderBy('updated_at', 'asc')->get();
        return view('admin.Comments', ['Person' => $Person , 'Users' => $Users , 'Restaurants' => $Restaurants , 'Comments' => $Comments]);
    }

    public function updateComments(Request $request ,$id )
    {
        $Comment = Comment::where('id_comment' , $id )->first();
        if(isset($Comment)){
            $Person = $request->session()->get('Person');
            return view('admin.UpdateCmment', ['Person' => $Person , 'Comment' => $Comment ]);
        }
        return redirect()->back();
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
