<?php

namespace App\Http\Controllers;
use App\Models\meal;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File; 

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
            case('Beverages'):
                $UserGroup = 'Beverages';
                break;
            case('Salad'):
                $UserGroup = 'Salad';
                break;
            case('Sandwiches'):
                $UserGroup = 'Sandwiches';
                break;
            case('Seafood'):
                $UserGroup = 'Seafood';
                break;
            case('Desserts'):
                $UserGroup = 'Desserts';
                break;
            case('Soup'):
                $UserGroup = 'Soup';
                break;
            case('pizza'):
                $UserGroup = 'pizza';
                break;
            case('Burger'):
                $UserGroup = 'Burger';
                break;
            case('dish'):
                $UserGroup = 'dish';
                break;
            default:
                $UserGroup = 'other';
        }

        $filePath = 'meals/';
        $NameImage = time().'.'.$request->Photo->extension();
        $request->Photo->move($filePath, $NameImage);

        $meal = new meal();
        $meal->id_meal  = Str::random(5) ;
        $meal->NameFood = $request->NameFood;
        $meal->Description = $request->Description;
        $meal->Price = $request->Price;
        $meal->TypeFood = $UserGroup;
        $meal->Photo = $NameImage;
        $meal->NumberLike = '0' ;
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
        $meal = meal::all();
        return $meal;
    }

    public function best(Request $request)
    {
        $meal = meal::where('id_meal',$request->id)->first();
        if( $meal->bestMeals == 1 ){
            $best = 0 ;
        }else{
            $best = 1 ;
        }
        $meal->bestMeals = $best ;
        $meal->save();    
        return 'yes';
    }

    public function likemeals(Request $request)
    {
        $meal = meal::where('id_meal',$request->id)->first();
        if(isset($meal)){
            if( $request->dataicon == 'true'){
                $meal->NumberLike += 1 ;
            }else{
                $meal->NumberLike -= 1 ;
            }
            $meal->save();    
            return 'yes';
        }
        return 'No' ;
    }

    public function showbest(Request $request)
    {
        $meal = new meal();
        $meal = meal::where('bestMeals', 1 )->get();
        return $meal;
    }

    public function update(Request $request, $id)
    {
        $meal = meal::where('id_meal', $id )->first();
        if(isset($meal)) {
            // Validate the inputs
            $request->validate([
                'NameFood' => 'required|string|max:255',
                'Description' => 'required|string',
                'Price' => 'required',
                'TypeFood' => 'required|string|max:255',
            ]);



            if(isset($request->image)) {
                if (in_array($request->image->extension() , [ 'jpeg' , 'png' , 'gif', 'jpg' , 'svg' ])) {
                    if(File::exists(public_path('meals/' . $meal->Photo))){
                        $deleteimage = 'meals/' . $meal->Photo ;
                        File::delete(public_path($deleteimage));
                    }
                    $image = time().'.'.$request->image->extension();
                    $request->image->move( 'meals/' , $image);
                }else{
                    $image = $meal->Photo ;
                }
            }else{
                $image = $meal->Photo ;
            }

            switch($request->TypeFood) {
                case('Beverages'):
                    $UserGroup = 'Beverages';
                    break;
                case('Salad'):
                    $UserGroup = 'Salad';
                    break;
                case('Sandwiches'):
                    $UserGroup = 'Sandwiches';
                    break;
                case('Seafood'):
                    $UserGroup = 'Seafood';
                    break;
                case('Desserts'):
                    $UserGroup = 'Desserts';
                    break;
                case('Soup'):
                    $UserGroup = 'Soup';
                    break;
                case('pizza'):
                    $UserGroup = 'pizza';
                    break;
                case('Burger'):
                    $UserGroup = 'Burger';
                    break;
                case('dish'):
                    $UserGroup = 'dish';
                    break;
                default:
                    $UserGroup = 'other';
            }


            $meal->NameFood = $request->NameFood;
            $meal->Description = $request->Description;
            $meal->Price = $request->Price;
            $meal->TypeFood = $UserGroup;
            $meal->Photo = $image;
            $meal->save();
            return redirect('/admin/meals');
        }
        return redirect()->back();  
    }


    public function destroy(Request $request)
    {
        $meal = meal::where('id_meal', $request->id )->pluck('Photo');
        if(isset($meal)){
            if(File::exists(public_path('meals/' . $meal[0] ))){
                File::delete(public_path( 'meals/' . $meal[0] ));
            }
            $meal = meal::where('id_meal', $request->id )->delete();
            if($meal == 1 ){
                return 'Yes' ;
            }else{
                return 'No' ;
            }
        }
    }
}
