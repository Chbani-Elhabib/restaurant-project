<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Person;
use App\Models\Order_meals;
use Illuminate\Http\Request;
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
        // return $request ;
        $Person = Person::where('id_people',$request->user)->first();
        $Person->Telf = $request->phone ;
        $Person->FullName = $request->FullName;
        $Person->customer = 1 ;
        $Person->save();

        $id = Str::random(10) ;

        $Order = new Order();
        $Order->id_order = $id ;
        $Order->id_people  = $request->user;
        $Order->id_restaurant  = $request->restaurant;
        $Order->type_payment = $request->type_payment;
        $Order->buy = $request->buy;
        $Order->save();

        foreach ( $request->dataorder as $dataorder ) {
            $Order_meals = new Order_meals();
            $Order_meals->id_order = $id ;
            $Order_meals->id_meal = $dataorder['id_order'] ;
            $Order_meals->ordered_number = $dataorder['ordered_number'] ;
            $Order_meals->save();
        }

        return 'yes' ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
