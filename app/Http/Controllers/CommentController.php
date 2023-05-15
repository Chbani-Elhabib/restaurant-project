<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Person;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CommentController extends Controller
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


    public function store(Request $request)
    {
        $Person = $request->session()->get('Person');
        $Comment = new Comment();
        $Comment->id_comment = Str::random(10) ;
        $Comment->id_people = $Person->id_people ;
        $Comment->id_restaurant = $request->restaurant ;
        $Comment->comment = $request->message ;
        $Comment->save();
       return  'yes' ;
    }

    public function stor(Request $request)
    {
        $Users = Person::where('id_people' , $request->UserName )->first();
        if(!isset($Users)){
            return redirect()->back();
        }

        $Restaurant = Restaurant::where('id_restaurant' , $request->Restaurant )->first();
        if(!isset($Restaurant)){
            return redirect()->back();
        }
        
        $Comment = new Comment();
        $Comment->id_comment = Str::random(10) ;
        $Comment->id_people = $Users->id_people ;
        $Comment->id_restaurant = $Restaurant->id_restaurant ;
        $Comment->comment = $request->Comment ;
        $Comment->save();
        
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
