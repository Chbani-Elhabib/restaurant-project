<?php

namespace App\Http\Controllers;
use App\Models\Person;
use App\Models\Restaurant;
use App\Models\Customer;
use App\Models\meal;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Aloha\Twilio\Twilio;

class RoutesController extends Controller
{
    public function index(Request $request)
    {
        $Person = $request->session()->get('Person');
        if(isset($Person)){
            return view('index', ['Person' => $Person ]);
        }
        return view('index');
    }

    public function city( Request $request , $city)
    {
        $restaurants = Restaurant::where('city', $city)->get();
        if (isset($restaurants)) {
            $customerCounts = array() ;
            foreach ($restaurants as $restaurant) {
                $customerCounts[$restaurant->id_restaurant] = [
                    'customer_count' => $restaurant->customers->count(),
                    'star_customers_count' => $restaurant->customers()->where('star', '!=' , 0 )->count(),
                    'star_customers_somme' =>  $restaurant->customers()->where('star', '!=' , 0 )->count() == 0 ?  0: $restaurant->customers()->where('star', '!=' , 0 )->sum('star') / $restaurant->customers()->where('star', '!=' , 0 )->count() ,
                ];
            }
            $Person = $request->session()->get('Person');
            if(isset($Person)){
                return view('index', ['restaurants' => $restaurants , 'city' => $city , 'Person' => $Person , 'customerCounts' => $customerCounts ]);
            }
            return view('index', ['restaurants' => $restaurants , 'city' => $city , 'customerCounts' => $customerCounts ]);
        }
        return redirect()->away('/');
    }
    
    public function addaddress(Request $request)
    {
        $restaurants = Restaurant::pluck("city")->unique();
        $city = [] ;

        foreach($restaurants as $restaurants) {
            if ( stristr($request->inpute, substr(strtolower($restaurants), 0, strlen($request->inpute)))){
                if(strlen($request->inpute) <= strlen($restaurants) ){
                    $city[] = $restaurants ;
                }else{
                    $city[] = [] ;
                }
            }
        }
        return $city ;
    }

    public function ajax_request(Request $request)
    {
        // purely username and password in database
        if(isset($request['username']) && isset($request['password'])){
            $person = new Person;
            $person = Person::where('UserName', $request['username'])->first();
            if(isset($person)){
                if (Hash::check($request['password'], $person->Password)){
                    return "Yes";
                }else{
                    return "No";
                }
            }else{
                return "No";
            }
        };

        // purely username in database
        if(isset($request['username'])){
            $person = new Person;
            if(Person::where('UserName', $request['username'])->first()){
                return "Yes" ;
            }else{
                return "No" ;
            };
        };

        // purely Email in database
        if(isset($request['Email'])){
            $Email = $request['Email'] ;
            $person = new Person;
            if(Person::where('Email', '=', $Email)->first()){
                return "Yes" ;
            }else{
                return "No" ;
            };
        };
    }
    public function ajax_update(Request $request)
    {
        // purely username in database
        if(isset($request['username']) && isset($request['user_name'])){
            $person = new Person;
            $person = Person::where('UserName', $request['username'])->first();
            if(isset($person)){
                if( $person->UserName == $request['user_name']){
                    return "Yes";
                }else{
                    return "No";
                }
            }else{
                return "Yes";
            }
        };

        // purely Email in database
        if(isset($request['Email']) && isset($request['user_Email'])){
            $person = new Person;
            $person = Person::where('Email', $request['Email'])->first();
            if(isset($person)){
                if( $person->Email === $request['user_Email']){
                    return "No";
                }else{
                    return "Yes";
                }
            }else{
                return "No";
            }
        };

        // purely Telf in database
        if(isset($request['Telf']) && isset($request['user_Tlef'])){
            $person = new Person;
            $person = Person::where('Telf', $request['Telf'])->first();
            if(isset($person)){
                if( $person->Telf === $request['user_Tlef']){
                    return "No";
                }else{
                    return "Yes";
                }
            }else{
                return "No";
            }
        };

    }


    public function login(Request $request)
    { 
        // Validate the inputs
        $request->validate([
            'UserName' => 'required|string|max:255',
            'Email' => 'required|string|max:255',
            'Password' => 'required|string|max:255',
        ]);

        $telf = '';
        $image = 'Users.png';
        $UserGroup = 'User';

        $Person = new Person();
        $Person->id_people  = Str::random(10);
        $Person->FullName  = '';
        $Person->UserName = $request->UserName;
        $Person->Email = $request->Email;
        $Person->Password = Hash::make($request->Password);
        $Person->User_Group = $UserGroup;
        $Person->Telf = $telf;
        $Person->Photo = $image;
        $Person->Country = 'Morroco';
        $Person->Regions = '';
        $Person->city = '';
        $Person->Address = '';
        $Person->star = 0 ;
        $Person->save();

        $person = Person::where('UserName', $request['UserName'])->first();
        $request->session()->put('Person',$person);
        return redirect()->back();
    
    }

    public function sign(Request $request)
    {
        $person = new Person;
        $person = Person::where('UserName', $request['UserName'])->first();
        $request->session()->put('Person',$person);
        if($person->User_Group == 'Admin'){
            return redirect('/admin');
        }else if( $person->User_Group == 'Manager'){
            return redirect('/manager');
        }else if( $person->User_Group == 'Liverour'){
            return redirect('/liverour');
        }else{
            return redirect()->back();
        }
    }

    public function imageuser(Request $request)
    {
        $person = new Person;
        $person = Person::where('UserName', $request['username'])->first();
        return $person->Photo;
    }
    public function About(Request $request)
    {
        return "About";
    }

    public function Contacts(Request $request)
    {
        return "Contacts";
    }

    public function FAQ(Request $request)
    {
        return view('FAQ');
    }

    public function restrand(Request $request ,$city , $id_restaurant)
    {
        $restaurant = Restaurant::where('city', $city)->where('id_restaurant', $id_restaurant)->first();
        $meal = meal::all();
        if (isset($restaurant)) {
            $restaurant->image ;
            $Person = $request->session()->get('Person');
            if(isset($Person)){
                return view('Restaurant', ['restaurants' => $restaurant ,'meals' => $meal , 'Person' => $Person  ]);
            }
            return view('Restaurant', ['restaurants' => $restaurant ,'meals' => $meal ]);
        }
        return redirect()->back();
    }
    
    public function verificationnumber (Request $request , Twilio $twilio )
    {
        $verificationCode = rand(100000, 999999) ;
        // $message = "Your verification code is $verificationCode";
        // $twilio->message($request->phone_number, $message);
        // session(['verification_code' => $verificationCode]);
        return $verificationCode ;
    }

    public function SignOut(Request $request)
    {
        $request->session()->forget('Person');
        return redirect()->back();
    }

    public function profile(Request $request)
    {
        $Person = $request->session()->get('Person');
        if(isset($Person)){
            return view('Profile', ['Person' => $Person ]);
        }
        return redirect()->back();
    }

    public function editprofile(Request $request)
    {
        $Person = $request->session()->get('Person');
        if(isset($Person)){
            return view('Editprofile', ['Person' => $Person ]);
        }
        return redirect()->back();
    }

    public function updatepassword(Request $request)
    {
        $Person = $request->session()->get('Person');
        if(isset($Person)){
            return view('Updatepassword', ['Person' => $Person ]);
        }
        return redirect()->back();
    }

    public function Order(Request $request)
    {
        $Person = $request->session()->get('Person');
        if(isset($Person)){
            return view('Order', ['Person' => $Person ]);
        }
        return redirect()->back();
    }


}
