<?php

namespace App\Http\Controllers;
use App\Models\Person;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class RoutesController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function ajax_request(Request $request)
    {
        // purely username and password in database
        if(isset($request['username']) && isset($request['password'])){
            $person = new Person;
            $person = Person::find($request['username']);
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
            if(Person::find($request['username'])){
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
        $person = Person::find($request['UserName']);
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
