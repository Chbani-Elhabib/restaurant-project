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


    public function login(Request $request){ 
        $person = Person::create([
            'UserName' => $request->input('UserName'),
            'Email' => $request->input('Email'),
            'Password' => Hash::make($request->input('Password')),
            'Telf' => ' ',
            'Photo' => ' ',
        ]);
         
        $person->save();
        // $request->session()->put('UserName',$person->UserName);
        return redirect('/verification');
    
    }

    public function sign(Request $request){
        $person = new Person;
        $person = Person::find($request['UserName']);
        if($person->User_Group == "0"){
            return $person;
        }else if($person->User_Group == "1"){
            return $person;
        }else if($person->User_Group == "2"){
            return $person;
        }else if($person->User_Group == "3"){
            $request->session()->put('UserName',$person->UserName);
            return redirect('/admin');
        }
    }
}
