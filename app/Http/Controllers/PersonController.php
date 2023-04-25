<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\Person;
use App\Models\Restaurant;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Str;

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
                'Telf' => 'required|string',
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
            case('Chef'):
                $UserGroup = 'Chef';
                break;
            case('Liverour'):
                $UserGroup = 'Liverour';
                $request->validate([
                    'Country' => 'required|string|max:255',
                    'Regions' => 'required|string|max:255',
                    'city' => 'required|string|max:255',
                ]);
                switch($request->Regions) {
                    case(1):
                        $Regions = 'Tanger-Tetouan-Al Hoceima';
                        break;
                    case(2):
                        $Regions = "l'Oriental";
                        break;
                    case(3):
                        $Regions = 'Fès-Meknès';
                        break;
                    case(4):
                        $Regions = 'Rabat-Salé-Kénitra';
                        break;
                    case(5):
                        $Regions = 'Béni Mellal-Khénifra';
                        break;
                    case(6):
                        $Regions = 'Casablanca-Settat';
                        break;
                    case(7):
                        $Regions = 'Marrakesh-Safi';
                        break;
                    case(8):
                        $Regions = 'Drâa-Tafilalet';
                        break;
                    case(9):
                        $Regions = 'Souss-Massa';
                        break;
                    case(10):
                        $Regions = 'Guelmim-Oued Noun';
                        break;
                    case(11):
                        $Regions = 'Laâyoune-Sakia El Hamra';
                        break;
                    case(12):
                        $Regions = 'LiverDakhla-Oued Ed-Dahabour';
                        break;
                    default:
                        return redirect()->back();
                }
                break;
            default:
                $UserGroup = 'User';
        }

        if (isset($Regions)) {
            $Country = $request->Country ;
            $city = $request->city ;
        }else{
            $Regions = "";
            $Country = 'Morroco' ;
            $city = '' ;
        }

        if (isset($request->FullName)) {
            $FullName = $request->FullName ;
        }else{
            $FullName = "" ;
        }

        if (isset($request->Address)) {
            $Address = $request->Address ;
        }else{
            $Address = "" ;
        }


        $Person = new Person();
        $Person->id_people  = Str::random(10);
        $Person->FullName = $FullName;
        $Person->Country = $Country;
        $Person->Regions = $Regions ;
        $Person->city = $city;
        $Person->Address = $Address;
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
    
    public function showuser(Request $request)
    {
        $Person = Person::where('id_people',$request["id"])->first();
        return $Person;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $userUpdate = Person::where('id_people', $request->id)->delete();
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
        $Person = Person::where('id_people',$Id)->first();
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
                case('Chef'):
                    $UserGroup = 'Chef';
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

    public function updateuser(Request $request)
    {
        $Person = $request->session()->get('Person');

        if (isset($Person)) {
            // Validate the inputs
            $request->validate([
                'UserName' => 'required|string|max:255',
                'Email' => 'required|string|max:255',
            ]);

            // Validate the Telf
            if (isset($request->Telf)) {
                $request->validate([
                    'Telf' => 'required|string',
                ]);
                $telf = $request->Telf;
            }else{
                $telf = '';
            }

            // Validate the FullName
            if (isset($request->FullName)) {
                $request->validate([
                    'FullName' => 'required|string',
                ]);
                $FullName = $request->FullName;
            }else{
                $FullName = '';
            }

            // Validate the Regions
            if (isset($request->Regions)) {
                switch($request->Regions) {
                    case(1):
                        $Regions = 'Tanger-Tetouan-Al Hoceima';
                        break;
                    case(2):
                        $Regions = "l'Oriental";
                        break;
                    case(3):
                        $Regions = 'Fès-Meknès';
                        break;
                    case(4):
                        $Regions = 'Rabat-Salé-Kénitra';
                        break;
                    case(5):
                        $Regions = 'Béni Mellal-Khénifra';
                        break;
                    case(6):
                        $Regions = 'Casablanca-Settat';
                        break;
                    case(7):
                        $Regions = 'Marrakesh-Safi';
                        break;
                    case(8):
                        $Regions = 'Drâa-Tafilalet';
                        break;
                    case(9):
                        $Regions = 'Souss-Massa';
                        break;
                    case(10):
                        $Regions = 'Guelmim-Oued Noun';
                        break;
                    case(11):
                        $Regions = 'Laâyoune-Sakia El Hamra';
                        break;
                    case(12):
                        $Regions = 'LiverDakhla-Oued Ed-Dahabour';
                        break;
                    default:
                        return redirect()->back();
                }
            }else{
                $Regions = '';
            }

            // Validate the city
            if (isset($request->city)) {
                $city = $request->city ;
            }else{
                $city = '' ;
            }

            // Validate the Address
            if (isset($request->Address)) {
                $Address = $request->Address ;
            }else{
                $Address = '' ;
            }
            
            // Validate the Photo
            if (isset($request->image)) {
                if (in_array($request->image->extension() , [ 'jpeg' , 'png' , 'gif', 'jpg' , 'svg' ])) {
                    if($Person->Photo != 'Users.png' ){
                        if(File::exists(public_path('ImageUsers/' . $Person->Photo))){
                            $deleteimage = 'ImageUsers/' . $Person->Photo ;
                            File::delete(public_path($deleteimage));
                        }
                    }
                    $image = time().'.'.$request->image->extension();
                    $request->image->move('ImageUsers/', $image );
                } else {
                    $image = 'Users.png';
                }
            }else{
                $image = 'Users.png';
            };


            $Person->UserName = $request->UserName;
            $Person->Email = $request->Email;
            $Person->Telf = $telf;
            $Person->Photo = $image;
            $Person->FullName = $FullName;
            $Person->Country = 'Morroco' ;
            $Person->Regions = $Regions;
            $Person->city = $city;
            $Person->Address = $Address;
            $Person->save();


        }
        return redirect()->back();

    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $userUpdate = Person::where('id_people', $request->id)->delete();
        return $userUpdate ;
    }

    public function manager(Request $request )
    {  
        $manager = Restaurant::all()->pluck('id_manager');
        $people = Person::where('User_Group', 'Manager')->whereNotIn('id_people', $manager)->get();
        return $people  ;         
    }

    public function chef(Request $request )
    {  
        $chef = Restaurant::all()->pluck('id_chef');
        $people = Person::where('User_Group', 'chef')->whereNotIn('id_people', $chef)->get();
        return $people  ;         
    }

    public function livreur(Request $request )
    {
        $Person = Person::where('User_Group', "Liverour")->get();
        return $Person;
    }

    public function stars(Request $request )
    {
        $Person = $request->session()->get('Person');
        $Customer = Customer::where('id_people', $Person->id_people)->first();
        $Customer->star = $request->Number + 1 ;
        $Customer->save();
        return 'yes';
    }

    public function profile(Request $request )
    {
        $Person = Person::where('id_people', $request->id)->first();
        if(isset($Person)){
            return $Person ;
        }
        return "true";
    }
}
