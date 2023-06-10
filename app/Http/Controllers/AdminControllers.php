<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Person;
use App\Models\Restaurant;
use App\Models\meal;
use App\Models\Order;
use App\Models\Comment;
use App\Models\FAQ;
use App\Models\Livreur;

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
        $users = Person::orderBy('updated_at', 'desc')->get();
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
        $restaurants = Restaurant::orderBy('created_at', 'desc')->paginate(4);
        $customerCounts = array() ;
        foreach ($restaurants as $restaurant) {
            $customerCounts[$restaurant->id_restaurant] = [
                'customer_count' => $restaurant->customers->count(),
                'star_customers_count' => $restaurant->customers()->where('star', '!=' , 0 )->count(),
                'star_customers_somme' =>  $restaurant->customers()->where('star', '!=' , 0 )->count() == 0 ?  0: $restaurant->customers()->where('star', '!=' , 0 )->sum('star') / $restaurant->customers()->where('star', '!=' , 0 )->count() ,
            ];
        }
        return view('admin.Restaurants', ['Person' => $Person , 'restaurants' => $restaurants , 'customerCounts' => $customerCounts ]);
    }

    public function updaterestaurants(Request $request ,$id )
    {
        $Person = $request->session()->get('Person');
        $Restaurants = Restaurant::where('id_restaurant', $id )->first();
        if(isset($Restaurants)){
            $manager = Person::where('id_people', $Restaurants->id_manager )->first();
            $chef = Person::where('id_people', $Restaurants->id_chef )->first();
            $livreurs = Livreur::where('id_restaurant', $Restaurants->id_restaurant)->pluck('id_livreur');
            $livreurs = Person::where('User_Group', 'Liverour' )->where('city', $Restaurants->city )->whereNotIn('id_people', $livreurs )->get();
            return view('admin.RestaurantsUpdate', ['Person' => $Person ,'livreurs' => $livreurs ,'Restaurants' => $Restaurants , 'manager' => $manager , 'chef' => $chef ]);
        }
        return redirect()->back();
    }


    public function meals(Request $request)
    {
        $Person = $request->session()->get('Person');
        $meals = meal::orderBy('created_at', 'DESC')->get() ;
        return view('admin.Meals', ['Person' => $Person , 'meals' => $meals ]);
    }

    public function updatemeals(Request $request , $id )
    {
        $Person = $request->session()->get('Person');
        $meal = meal::where('id_meal' , $id )->first();
        if(isset($meal)){
            return view('admin.UpdateMeals', ['Person' => $Person , 'meal' => $meal ] );
        }
        return redirect()->back();
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

    public function updateorder(Request $request , $id)
    {
        $Order = Order::where('id_order' , $id )->first();
        if(isset($Order)){
            $Person = $request->session()->get('Person');
            $Restaurants = Restaurant::all();
            $Users = Person::where('User_Group' , 'User')->get();
            $meals = meal::all();
            return view('admin.UpdateOrder', ['Person' => $Person , 'Users' => $Users , 'Order' => $Order , 'meals' => $meals , 'Restaurants' => $Restaurants ] );
        }
        return redirect()->back();
    }

    
    public function Comments(Request $request)
    {
        $Person = $request->session()->get('Person');
        $Users = Person::where('User_Group' , 'User')->get();
        $Restaurants = Restaurant::all();
        $Comments = Comment::orderBy('updated_at', 'desc')->get();
        return view('admin.Comments', ['Person' => $Person , 'Users' => $Users , 'Restaurants' => $Restaurants , 'Comments' => $Comments ]);
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

    public function about(Request $request)
    {
        $Person = $request->session()->get('Person');
        return view('admin.About', ['Person' => $Person]);
    }

    public function FAQ(Request $request)
    {
        $Person = $request->session()->get('Person');
        $faqs = FAQ::all();
        return view('admin.FAQ', ['Person' => $Person , 'faqs' => $faqs ]);
    }

    public function EditFAQ(Request $request ,$id)
    {
        $Person = $request->session()->get('Person');
        $FAQ = FAQ::where('id_faq', $id)->first();
        if(isset($FAQ)){
            return view('admin.FAQEdit', ['Person' => $Person , 'FAQ' => $FAQ ]);
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

    public function SignOut(Request $request)
    {
        $request->session()->forget('Person');
        return redirect('/');
    }

}
