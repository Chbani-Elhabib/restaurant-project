<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the inputs
        $request->validate([
            'UserName' => 'required|string|max:255',
            'Email' => 'required|string|max:255',
            'Password' => 'required|string|max:255',
        ]);

        // Validate the Telf
        if (isset($request->Telf)) {
            $request->validate([
                'Telf' => 'required|integer',
            ]);

            $telf = '+212' . $request->Telf;
        }else{
            $telf = '';
        }

        // Validate the Photo
        if (isset($request->Photo)) {
            $request->validate([
                'Photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ]);
            $image = time().'.'.$request->Photo->extension();
            $request->Photo->move('ImageUsers/', $image );
        }else{
            $image = 'Users.png';
        };

        switch($request->User_Group) {
            case('Admin'):
                $UserGroup = 'Admin';
                break;
            case('Manager'):
                $UserGroup = 'Manager';
                break;
            case('Liverour'):
                $UserGroup = 'Liverour';
                break;
            default:
                $UserGroup = 'User';
        }

        $Person = new Person();
        $Person->UserName = $request->UserName;
        $Person->Email = $request->Email;
        $Person->Password = Hash::make($request->Password);
        $Person->User_Group = $UserGroup;
        $Person->Telf = $telf;
        $Person->Photo = $image;
        $Person->save();
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $Person = new Person();
        if($request["User_Group"] == "All"){
            $Person = Person::all();
            return $Person;
        }else{
            $Person = Person::where('User_Group',$request["User_Group"])->get();
            return $Person;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function edit(Person $person)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Person $person)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function destroy(Person $person)
    {
        //
    }
}
