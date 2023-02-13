<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 

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

            $telf = $request->Telf;
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
        $Person->id = time()-999999999 ;
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
    public function edit(Request $request)
    {
        $userUpdate = Person::where('id', $request->id)->delete();
        $Person = new Person();
        $Person = Person::all();
        return $Person;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request ,$Id)
    {
        $Person = Person::where('id',$Id)->first();
        if (isset($Person)) {
            // Validate the inputs
            $request->validate([
                'UserName' => 'required|string|max:255',
                'Email' => 'required|string|max:255',
            ]);
            // Validate the password
            if(isset($request->Password)){
                $request->validate([
                    'Password' => 'required|string|max:255',
                ]);
                $Password = Hash::make($request->Password);
            }else{
                $Password = $Person->Password ;
            }
            // Validate the Telf
            if (isset($request->Telf)) {
                $request->validate([
                    'Telf' => 'required|integer',
                ]);
                $telf = $request->Telf;
            }else{
                $telf = $Person->Telf;
            }
            // Validate the User group
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
            // Validate the Verif_Email
            if($request->verifEmail){
                $verifEmail = 1 ;
            }else{
                $verifEmail = 0 ;
            }
            // Validate the Verif_Telf
            if($request->verifTelf){
                $verifTelf = 1 ;
            }else{
                $verifTelf = 0 ;
            }
            // Validate the Photo
            if (isset($request->image)) {
                $request->validate([
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
                ]);
                if($Person->Photo != 'Users.png' ){
                    if(File::exists(public_path('ImageUsers/' . $Person->Photo))){
                        $deleteimage = 'ImageUsers/' . $Person->Photo ;
                        File::delete(public_path($deleteimage));
                    }
                }
                $image = time().'.'.$request->image->extension();
                $request->image->move('ImageUsers/', $image );
            }else{
                $image = 'Users.png';
            };


            $Person->UserName = $request->UserName;
            $Person->Email = $request->Email;
            $Person->Password = $Password;
            $Person->User_Group = $UserGroup;
            $Person->Telf = $telf;
            $Person->Photo = $image;
            $Person->Verif_Email = $verifEmail;
            $Person->Verif_Telf = $verifTelf;
            $Person->save();
        }
        return redirect('/admin/users');
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

    public function manager(Request $request )
    {
        $Person = Person::where('User_Group', "Manager")->get();
        return $Person;
    }
    public function livreur(Request $request )
    {
        $Person = Person::where('User_Group', "Liverour")->get();
        return $Person;
    }
}
