<?php

namespace App\Http\Controllers;
use App\Models\Person;
use App\Models\Restaurant;
use App\Models\Livreur;
use App\Models\image_restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File; 

class RestaurantController extends Controller
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
                return "No";
        }



        if(!Person::where('id_people', $request->manager)->exists()){
            return "No";
        }

        if(!Person::where('id_people', $request->chef)->exists()){
            return "No";
        }
        
        foreach ( explode(",", $request->Liverour)  as $Liverour ) {
            if(!Person::where( 'id_people', $Liverour )->exists()){
                return "No";
            }
        }

        $id =  time() - 1677083558 . Str::random(5); 
        $Restaurant = new Restaurant();
        $Restaurant->id_restaurant  = $id ;
        $Restaurant->NameRestaurant = $request->NameRestaurant ;
        $Restaurant->Country = $request->Country ;
        $Restaurant->Regions = $Regions ;
        $Restaurant->city = $request->city ;
        $Restaurant->Address = $request->Address ;
        $Restaurant->id_manager  = $request->manager ;
        $Restaurant->id_chef   = $request->chef ;
        $Restaurant->PriceDelivery = $request->PriceDelivery;
        $Restaurant->NumberLike = 0 ;
        $Restaurant->deliverytime_of = $request->deliverytime_of ;
        $Restaurant->deliverytime_to = $request->deliverytime_to ;
        $Restaurant->save();

        foreach ( explode(",", $request->Liverour)  as $Liverour ) {
            $Livreur = new Livreur();
            $Livreur->id_restaurant = $id;
            $Livreur->id_livreur  = $Liverour;
            $Livreur->save();
        }

        foreach( $request->image as $key => $img ){
            $fileName = $key. "." . time().'.'.$img->extension();
            $img->move('ImageRestaurant/', $fileName );
            $image_restaurant = new image_restaurant();
            $image_restaurant->id_restaurant = $id;
            $image_restaurant ->Photo  = $fileName;
            $image_restaurant ->save();
        }
        return "Yes" ; 
    }
 
    public function show(Request $request)
    {
        $Restaurant = Restaurant::where('id_restaurant', $request->id)->first();
        if(isset($Restaurant)){
            $Restaurante = [] ;
            $Restaurante = $Restaurant ;
            $Restaurante['manager'] = Person::select('UserName', 'Email')->where('id_people', $Restaurant->id_manager )->first();
            $Restaurante['chef'] = Person::select('UserName', 'Email')->where('id_people', $Restaurant->id_chef  )->first();
            foreach($Restaurant->Livreur as $livreur ){
                $livreur->LevrourPerson ;
            };
            return $Restaurante ;
        }
    }

    public function edit(Restaurant $restaurant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        // validation restaurant 
        $Person = $request->session()->get('Person');
        if( $Person->User_Group == 'Admin'){
            $Restaurant = Restaurant::where('id_restaurant', $request->id_restaurant)->first();
            if(!isset($Restaurant)){
                return 'No';
            }
        }else{
            $Restaurant = Restaurant::where('id_manager', $Person->id_people )->first();
            if(!isset($Restaurant)){
                return 'No';
            }
        }

        // validation manager 
        $manager = Person::where('id_people', $request->manager )->where('User_Group' , 'Manager')->first();
        if(!isset($manager)){
            return 'No';
        }

        // validation Chef 
        $chef = Person::where('id_people', $request->chef )->where('User_Group' , 'Chef')->first();
        if(!isset($chef)){
            return 'No';
        }

        // validation Livreur 
        foreach ( explode(",", $request->Livreurs)  as $Livreur ) {
            $livreur = Person::where('id_people', $Livreur )->where('User_Group' , 'Liverour')->first();
            if(!isset($livreur)){
                return 'No';
            }
        }

        $Restaurant->NameRestaurant = $request->NameRestaurant ;
        $Restaurant->PriceDelivery = $request->PriceDelivery ;
        $Restaurant->id_manager  = $request->manager ;
        $Restaurant->id_chef  = $request->chef ;
        $Restaurant->deliverytime_of = $request->deliverytime_of ;
        $Restaurant->deliverytime_to = $request->deliverytime_to ;
        $Restaurant->save() ;


        $x = Livreur::where('id_restaurant', $Restaurant->id_restaurant )->delete();
        foreach ( explode(",", $request->Livreurs)  as $Livreurr ) {
            $Livreur = new Livreur();
            $Livreur->id_restaurant = $Restaurant->id_restaurant ;
            $Livreur->id_livreur  = $Livreurr ;
            $Livreur->save();
        }

        if(isset($request->deleteimage)){
            foreach ( explode(",", $request->deleteimage)  as $image ) {
                $img = image_restaurant::where('id_restaurant', $Restaurant->id_restaurant )->where('Photo' , $image )->first();
                if(isset($img)){
                    image_restaurant::where('id_restaurant', $Restaurant->id_restaurant )->where('Photo' , $image )->delete();
                    if(File::exists(public_path('ImageRestaurant/' . $image ))){
                        File::delete(public_path( 'ImageRestaurant/' . $image ));
                    }
                }
            }
        }

        if(isset($request->image)){
            foreach( $request->image as $key => $img ){
                $fileName = $key. "." . time().'.'.$img->extension();
                $img->move('ImageRestaurant/', $fileName );
                $image_restaurant = new image_restaurant();
                $image_restaurant->id_restaurant = $Restaurant->id_restaurant ;
                $image_restaurant ->Photo  = $fileName;
                $image_restaurant ->save();
            }
        }


        return 'Yes';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        //
    }

    public function likerestaurant(Request $request)
    {
        $Restaurant = Restaurant::where('id_restaurant', $request->idrestaurant)->first();
        if(isset($Restaurant)){
            $Restaurant->NumberLike = $Restaurant->NumberLike + $request->x ;
            $Restaurant->save() ;
        }
    }

}
