<?php

namespace App\Http\Controllers;
use App\Models\meal;
use Illuminate\Http\Request;

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
            'title_English' => 'required|string|max:255',
            'title_Arabic' => 'required|string|max:255',
            'image_meal' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $filePath = 'data-image-meal/';
        $NameImage = $request->image_meal->getClientOriginalName();
        $CodeImage = date('YmdHis') . "." . $request->image_meal->getClientOriginalExtension();
        $request->image_meal->move($filePath, $NameImage);

        $meal = new meal();
        $meal->title_English = $request->title_English;
        $meal->title_Arabic = $request->title_Arabic;
        $meal->name_image = $NameImage;
        $meal->image_meal = $CodeImage;
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
