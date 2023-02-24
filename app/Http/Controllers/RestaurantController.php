<?php

namespace App\Http\Controllers;
use App\Models\Person;
use App\Models\Restaurant;
use App\Models\Livreur;
use App\Models\image_restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        $request->validate([
            'NameRestaurant' => 'required|string',
            'Country' => 'required|string|max:255',
            'Regions' => 'required|integer',
            'city' => 'required|string',
            'Address' => 'required|string',
            'manager' => 'required|string',
            'Liverour' => 'required',
            'PriceDelivery' => 'required|integer',
            'deliverytime_of' => 'required|integer',
            'deliverytime_to' => 'required|integer',
            'toutimages' => 'required',
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

        if(!Person::where('id_people', $request->manager)->exists()){
            return redirect()->back();
        }
        
        foreach ( $request->Liverour  as $Liverour ) {
            if(!Person::where( 'id_people', $Liverour )->exists()){
                return redirect()->back();
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
        $Restaurant->PriceDelivery = $request->PriceDelivery;
        $Restaurant->deliverytime_of = $request->deliverytime_of ;
        $Restaurant->deliverytime_to = $request->deliverytime_to ;
        $Restaurant->save();

        foreach ( $request->Liverour  as $Liverour ) {
            $Livreur = new Livreur();
            $Livreur->id_restaurant = $id;
            $Livreur->id_livreur  = $Liverour;
            $Livreur->save();
        }

        $arrayimage = explode(",", $request->toutimages); 
        foreach ( $arrayimage  as $images  ) {
            $image_restaurant = new image_restaurant();
            $image_restaurant->id_restaurant = $id;
            $image_restaurant ->Photo  = $images;
            $image_restaurant ->save();
        }

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
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
        //
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
}
