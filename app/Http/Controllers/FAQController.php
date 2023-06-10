<?php

namespace App\Http\Controllers;

use App\Models\FAQ;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FAQController extends Controller
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
            'Langue' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);
        
        
        if( $request->Langue !== 'English' && $request->Langue !== 'Arabic' ){
            return redirect()->back();
        }
        $FAQ = new FAQ();
        $FAQ->id_faq  = Str::random(10) ;
        $FAQ->title = $request->title;
        $FAQ->body = $request->body;
        $FAQ->Language = $request->Langue;
        $FAQ->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FAQ  $fAQ
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $FAQ = FAQ::where('id_faq', $request->id)->first();
        if(isset($FAQ)){
            return $FAQ ;
        }
        return 'No';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FAQ  $fAQ
     * @return \Illuminate\Http\Response
     */
    public function edit(FAQ $fAQ)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FAQ  $fAQ
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $FAQ = FAQ::where('id_faq', $id)->first();
        if(isset($FAQ)){
            // Validate the inputs
            $request->validate([
                'Langue' => 'required|string|max:255',
                'title' => 'required|string|max:255',
                'body' => 'required|string',
            ]);
            
            if( $request->Langue !== 'English' && $request->Langue !== 'Arabic' ){
                return redirect()->back();
            }
            $FAQ->title = $request->title;
            $FAQ->body = $request->body;
            $FAQ->Language = $request->Langue;
            $FAQ->save();
            return redirect('/admin/faq');
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FAQ  $fAQ
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $FAQ = FAQ::where('id_faq', $request->id)->first();
        if(isset($FAQ)){
            $FAQ = FAQ::where('id_faq', $request->id)->delete();
            if( $FAQ  == 1){
                return 'Yes' ;
            } 
        }
        return 'No';
    }
}
