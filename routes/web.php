<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoutesController;
use App\Http\Controllers\AdminControllers;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\LiverourController;
use App\Http\Controllers\MealController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\OrderController;
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
    Route::get('/ma/{city}','city');
    Route::get('/about','About');
    Route::get('/contacts','Contacts');
    Route::get('/FAQ','FAQ');
    Route::get('/ma/{city}/{id_restaurant}','restrand');
    Route::POST('/ajax-request','ajax_request');
    Route::POST('/ajax-update','ajax_update');
    Route::POST('/sign','sign');
    Route::POST('/login','login');
    Route::POST('/imageuser','imageuser');
    Route::POST('/addaddress','addaddress');
    Route::POST('/verificationnumber','verificationnumber');
    Route::get('/signOut','SignOut');
});

Route::middleware(['Admin'])->group(function () {
    Route::controller(AdminControllers::class)->group(function () {
        Route::get('/verification','verification');
        Route::get('/admin','dashboard');
        Route::get('/admin/users','users');
        Route::get('/admin/users/update/{Id}','updateuser');
        Route::get('/admin/restaurants','restaurants');
        Route::POST('/admin/restaurants/localimage','localimage');
        Route::get('/admin/meals','meals');
        Route::get('/admin/booking','booking');
        Route::get('/admin/contacts','contacts');
        Route::get('/admin/about','about');
        Route::get('/admin/faq','FAQ');
        Route::get('/admin/profile','Profile');
        Route::get('/admin/Update','Update');
        Route::get('/admin/signOut','SignOut');
    });
});

Route::middleware(['Manager'])->group(function () {
    Route::controller(ManagerController::class)->group(function () {
        Route::get('/manager','dashboard');
        Route::get('/manager/users','users');
        Route::get('/manager/users/update/{Id}','updateuser');
        Route::get('/manager/restaurants','restaurants');
        Route::get('/manager/meals','meals');
        Route::get('/manager/booking','booking');
        Route::get('/manager/contacts','contacts');
        Route::get('/manager/profile','Profile');
        Route::get('/manager/Update','Update');
        Route::get('/manager/Updatepassword','Updatepassword');
        Route::get('/manager/signOut','SignOut');
    });
});

Route::middleware(['Liverour'])->group(function () {
    Route::controller(LiverourController::class)->group(function () {
        Route::get('/liverour','dashboard');
        Route::get('/liverour/restaurants','restaurants');
        Route::get('/liverour/booking','booking');
        Route::get('/liverour/contacts','contacts');
        Route::get('/liverour/profile','Profile');
        Route::get('/liverour/Update','Update');
        Route::get('/liverour/Updatepassword','Updatepassword');
        Route::get('/liverour/signOut','SignOut');
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
    Route::POST('/users/showuser','showuser');
    Route::POST('/users/update/{Id}','update');
    Route::POST('/users/delete','destroy');
    Route::POST('/users/manager','manager');
    Route::POST('/users/livreur','livreur');
    Route::POST('/users/stars','stars');
    Route::POST('/users/profile','profile');
});


Route::controller(RestaurantController::class)->group(function () {
    Route::POST('/admin/restaurants/store','store');    
});


Route::controller(OrderController::class)->group(function () {
    Route::POST('/order/store','store');    
    Route::POST('/order/managerstore','stor');    
Route::POST('/order/servesorder','servesorder');    
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



