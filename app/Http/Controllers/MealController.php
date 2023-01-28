<?php

namespace App\Http\Controllers;
use App\Models\meal;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MealController extends Controller
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
    public function create(Request $request)
    {

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
            'NameFood' => 'required|string|max:255',
            'Description' => 'required|string',
            'Price' => 'required|numeric',
            'TypeFood' => 'required|string|max:255',
            'Photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        switch($request->TypeFood) {
            case('meal'):
                $UserGroup = 'meal';
                break;
            case('Drink'):
                $UserGroup = 'Drink';
                break;
            default:
                $UserGroup = 'Dish';
        }

        $filePath = 'meals/';
        $NameImage = time().'.'.$request->Photo->extension();
        $request->Photo->move($filePath, $NameImage);

        $meal = new meal();
        $meal->Id = Str::random(9);
        $meal->NameFood = $request->NameFood;
        $meal->Description = $request->Description;
        $meal->Price = $request->Price;
        $meal->TypeFood = $UserGroup;
        $meal->Photo = $NameImage;
        $meal->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $meal = new meal();
        $meal = meal::all();
        return $meal;
    }

    public function best(Request $request)
    {
        $meal = new meal();
        $meal = meal::where('Id',$request->id)->first();
        if( $meal->bestMeals == 1 ){
            $best = 0 ;
        }else{
            $best = 1 ;
        }
        $meal->bestMeals = $best;
        $meal->save();
    }

    public function showbest(Request $request)
    {
        $meal = new meal();
        $meal = meal::where('bestMeals', 1 )->get();
        return $meal;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function edit(meal $meal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, meal $meal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function destroy(meal $meal)
    {
        //
    }
}
