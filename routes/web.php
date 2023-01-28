<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoutesController;
use App\Http\Controllers\PrivateControllers;
use App\Http\Controllers\MealController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\FAQController;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::controller(RoutesController::class)->group(function () {
    Route::get('/','index');
    Route::get('/about','About');
    Route::get('/contacts','Contacts');
    Route::get('/FAQ','FAQ');
    Route::get('/restrand','restrand');
    Route::POST('/ajax-request','ajax_request');
    Route::POST('/ajax-update','ajax_update');
    Route::POST('/sign','sign');
    Route::POST('/login','login');
    Route::POST('/imageuser','imageuser');
});

Route::middleware(['user'])->group(function () {
    Route::controller(PrivateControllers::class)->group(function () {
        Route::get('/verification','verification');
        Route::get('/admin','dashboard');
        Route::get('/admin/users','users');
        Route::get('/admin/users/update/{Id}','updateuser');
        Route::get('/admin/restaurants','restaurants');
        Route::get('/admin/meals','meals');
        Route::get('/admin/booking','booking');
        Route::get('/admin/contacts','contacts');
        Route::get('/admin/about','about');
        Route::get('/admin/faq','FAQ');
        Route::get('/admin/profile','Profile');
        Route::get('/admin/settings','Settings');
        Route::get('/admin/signOut','SignOut');
    });
});

 
Route::controller(MealController::class)->group(function () {
    Route::POST('/admin/meal/create','store');
    Route::POST('/admin/meal/show','show');
    Route::POST('/admin/meal/best','best');
    Route::POST('/meals/show','showbest');
});

Route::controller(PersonController::class)->group(function () {
    Route::POST('/users/sign','store');
    Route::POST('/users/show','show');
    Route::POST('/users/update/{Id}','update');
    Route::POST('/users/delete/','edit');
    Route::POST('/users/manager','manager');
    Route::POST('/users/livreur','livreur');
});


Route::controller(FAQController::class)->group(function () {
    Route::POST('/FAQ/store','store');    
    Route::POST('/FAQ/show','show');    
});

Route::get('languageConverter/{lang}', function($lang){
    if(in_array($lang , ['en','ar'])){
        session()->put('lang',$lang);
    }
    return redirect()->back();
})->name('languageConverter');



