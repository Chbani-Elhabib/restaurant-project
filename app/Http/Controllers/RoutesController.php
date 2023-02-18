<?php

namespace App\Http\Controllers;
use App\Models\Person;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class RoutesController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function addaddress(Request $request)
    {
        // $restaurants = Restaurant::pluck("city")->unique();
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
                if( $person->UserName === $request['user_name']){
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
        $Person->id  = time()-999999999;
        $Person->UserName = $request->UserName;
        $Person->Email = $request->Email;
        $Person->Password = Hash::make($request->Password);
        $Person->User_Group = $UserGroup;
        $Person->Telf = $telf;
        $Person->Photo = $image;
        $Person->save();
        return redirect('/verification');
    
    }

    public function sign(Request $request)
    {
        $person = new Person;
        $person = Person::where('UserName', $request['UserName'])->first();
        if($person->User_Group == 'Admin'){
            $request->session()->put('Person',$person);
            return redirect('/admin');
        }else if( $person->User_Group == 'Manager'){
            return 'Manager';
        }else if( $person->User_Group == 'Liverour'){
            return 'Liverour';
        }else if($person->User_Group == 'User'){
            return 'User';
        }
        return redirect('/');
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
    public function restrand(Request $request)
    {
        return view('Restrand');
    }


}
