<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Person;
use App\Models\meal;
use App\Models\Order_meals;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Customer;
use Illuminate\Support\Str;

class OrderController extends Controller
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
        $Person = $request->session()->get('Person');
        $Person->Telf = $request->phone ;
        $Person->FullName = $request->FullName;
        $Person->Address = $request->Address;
        $Person->save();



        $id = Str::random(10) ;

        $Restaurant = Restaurant::where('id_restaurant', $request->restaurant )->first();



        $Order = new Order();
        $Order->id_order = $id ;
        $Order->id_people  = $Person->id_people ;
        $Order->id_restaurant  = $request->restaurant;
        $Order->id_Livrour  = $Restaurant->Livreur[0]->id_livreur;
        $Order->type_payment = $request->type_payment;
        $Order->total = $request->total;
        $Order->buy = $request->buy;
        $Order->Order_serves = 0 ;
        $Order->save();

        

        foreach ( $request->dataorder as $dataorder ) {
            $Order_meals = new Order_meals();
            $Order_meals->id_order = $id ;
            $Order_meals->id_meal = $dataorder['id_order'] ;
            $Order_meals->ordered_number = $dataorder['ordered_number'] ;
            $Order_meals->save();
        }

        $Customer = Customer::where('id_restaurant', $request->restaurant)->where('id_people', $Person->id_people)->first();
        
        
        if(  isset( $Customer )){
            return 'yes' ;
        }

        $Customer = new Customer() ;
        $Customer->id_people = $Person->id_people ;
        $Customer->id_restaurant = $request->restaurant ;
        $Customer->star = 0 ;
        $Customer->save();
        return 'yes' ;
    }

    public function stor(Request $request)
    {
        $Person = Person::where('id_people',$request->id_person)->first();
        if(!isset($Person)){
            return 'No' ;
        }
        if(isset($request->phone)){
            $Person->Telf = $request->phone ;
            $Person->save();
        }
        if(isset($request->Address)){
            $Person->Address = $request->Address;
            $Person->save();
        }

        
        $Restaurant = Restaurant::where('id_restaurant', $request->id_restaurant )->first();
        if(!isset($Restaurant)){
            return 'No' ;
        }

        $id = Str::random(10) ;

        $Order = new Order();
        $Order->id_order = $id ;
        $Order->id_people  = $request->id_person;
        $Order->id_restaurant  = $request->id_restaurant;
        $Order->id_Livrour   = $Restaurant->Livreur[0]->id_livreur;
        $Order->type_payment = "Payment upon receipt";
        $Order->total = $request->total;
        $Order->Order_serves = '0';
        $Order->active_Delivery_price = $request->active_Delivery_price;
        $Order->save();


        foreach ( $request->orders as $dataorder ) {
            $Order_meals = new Order_meals();
            $Order_meals->id_order = $id ;
            $Order_meals->id_meal = $dataorder['id_meal'] ;
            $Order_meals->ordered_number = $dataorder['nomber_meal'] ;
            $Order_meals->save();
        }

        $Customer = Customer::where('id_restaurant', $request->id_restaurant)->where('id_people', $Person->id_people)->first();
        

        
        
        if(  isset( $Customer )){
            return 'yes' ;
        }

        
        $Customer = new Customer() ;
        $Customer->id_people = $Person->id_people ;
        $Customer->id_restaurant = $request->id_restaurant ;
        $Customer->star = 0 ;
        $Customer->save();
        return 'yes' ;

    }

    public function servesorder(Request $request)
    {
        $Order = Order::where('id_order', $request->id_order )->first();
        $Order->Order_serves = $request->servesorder;
        $Order->save();
        return "yes" ;
    }

    public function showorder(Request $request)
    {
        $array = [] ;
        $Order = Order::where('id_order', $request->id )->first();
        if(isset($Order)){
            $array['Delivery_price'] = $Order->Restaurant_order->PriceDelivery ;
            $array['Order'] = $Order ;
            $array['Person'] = $Order->Person_order ;
            $array['Restaurant'] = $Order->Restaurant_order->NameRestaurant ;
            $array['Manager'] = Person::select('UserName', 'Email')->where('id_people', $Order->Restaurant_order->id_manager )->first();
            $array['Chef'] = Person::select('UserName', 'Email')->where('id_people', $Order->Restaurant_order->id_chef  )->first();
            $array['Livrour'] = $Order->Livrour ;
            $array['order_meals'] = [];
            foreach( $Order->image_order as $order ){
                $meal = meal::where('id_meal', $order->id_meal )->first();
                $array['order_meals'][] = [ 'meals'  => $meal  , 'ordered_number' => $order->ordered_number ];
            }
            return $array ;
        }
        return "No" ;
    }




    public function edit(Order $order)
    {
        //
    }


    public function update(Request $request)
    {
        $Person = Person::where('id_people',$request->id_person)->first();
        if(!isset($Person)){
            return 'No' ;
        }
        if(isset($request->phone)){
            $Person->Telf = $request->phone ;
            $Person->save();
        }
        if(isset($request->Address)){
            $Person->Address = $request->Address;
            $Person->save();
        }

        $Restaurant = Restaurant::where('id_restaurant', $request->id_restaurant )->first();
        if(!isset($Restaurant)){
            return 'No' ;
        }

        $Order = Order::where('id_order', $request->id_order )->first();

        if(isset($Order)){
            $Order->id_people  = $request->id_person;
            $Order->id_restaurant  = $request->id_restaurant;
            $Order->type_payment = "Payment upon receipt";
            $Order->total = $request->total;
            $Order->Order_serves = '0';
            $Order->active_Delivery_price = $request->active_Delivery_price;
            $Order->save();
    
            $Order_meals = Order_meals::where('id_order', $request->id_order )->delete();
    
            foreach ( $request->orders as $dataorder ) {
                $Order_meals = new Order_meals();
                $Order_meals->id_order = $Order->id_order ;
                $Order_meals->id_meal = $dataorder['id_meal'] ;
                $Order_meals->ordered_number = $dataorder['nomber_meal'] ;
                $Order_meals->save();
            }
            return "Yes" ;
        };

        return "No" ;
    }

    public function UpdateLivreur(Request $request)
    {
        $order = Order::where('id_order',$request->order)->first();
        if(isset($order)){
            $order->id_Livrour = $request->id ;
            $order->save();
            return 'Yes' ;
        }
        return "No" ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $Order = Order::where('id_order', $request->id )->first();
        if(isset($Order)){
            Order_meals::where('id_order', $Order->id_order )->delete();
            $Order = Order::where('id_order', $request->id )->delete();
            if($Order == 1 ){
                return 'Yes' ;
            };
        }
        return 'No' ;
    }
}
