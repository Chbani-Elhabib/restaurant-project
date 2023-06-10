<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoutesController;
use App\Http\Controllers\AdminControllers;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\ChefControlle;
use App\Http\Controllers\LiverourController;
use App\Http\Controllers\MealController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\CommentController;
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
    Route::get('/verification/{id}/Restaurant/verfiry','verification');
    Route::get('/user/profile','profile');
    Route::get('/user/edit','editprofile');
    Route::get('/user/update-password','updatepassword');
    Route::get('/user/order','Order');
    Route::get('/signOut','SignOut');
});

Route::middleware(['Admin'])->group(function () {
    Route::controller(AdminControllers::class)->group(function () {
        Route::get('/verification','verification');
        Route::get('/admin','dashboard');
        Route::get('/admin/users','users');
        Route::get('/admin/users/update/{Id}','updateuser');
        Route::get('/admin/restaurants','restaurants');
        Route::get('/admin/restaurants/{id}/update','updaterestaurants');
        Route::get('/admin/meals','meals');
        Route::get('/admin/meals/{id}/update','updatemeals');
        Route::get('/admin/order','order');
        Route::get('/admin/order/{id}/update','updateorder');
        Route::get('/admin/comments','Comments');
        Route::get('/admin/comment/{id}/update','updateComments');
        Route::get('/admin/about','about');
        Route::get('/admin/faq','FAQ');
        Route::get('/admin/faq/{id}/edit','EditFAQ');
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
        Route::get('/manager/restaurants/update','updaterestaurants');
        Route::get('/manager/meals','meals');
        Route::get('/manager/order','order');
        Route::get('/manager/order/{id}/update','updateorder');
        Route::get('/manager/comments','Comments');
        Route::get('/manager/comment/{id}/update','updateComments');
        Route::get('/manager/profile','Profile');
        Route::get('/manager/Update','Update');
        Route::get('/manager/Updatepassword','Updatepassword');
        Route::get('/manager/signOut','SignOut');
    });
});

Route::middleware(['Chef'])->group(function () {
    Route::controller(ChefControlle::class)->group(function () {
        Route::get('/chef','dashboard');
        Route::get('/chef/restaurants','restaurants');
        Route::get('/chef/meals','meals');
        Route::get('/chef/order','order');
        Route::get('/chef/contacts','contacts');
        Route::get('/chef/profile','Profile');
        Route::get('/chef/Update','Update');
        Route::get('/chef/Updatepassword','Updatepassword');
        Route::get('/chef/signOut','SignOut');
    });
});

Route::middleware(['Liverour'])->group(function () {
    Route::controller(LiverourController::class)->group(function () {
        Route::get('/liverour','dashboard');
        Route::get('/liverour/restaurants','restaurants');
        Route::get('/liverour/order','order');
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
    Route::POST('/meals/like','likemeals');
    Route::POST('/meals/{id}/update','update');
    Route::POST('/meals/delete','destroy');
});

Route::controller(PersonController::class)->group(function () {
    Route::POST('/users/sign','store');
    Route::POST('/users/show','show');
    Route::POST('/users/showuser','showuser');
    Route::POST('/users/update/{Id}','update');
    Route::POST('/users/update','updateuser');
    Route::POST('/users/updatepassword','updatepassword');
    Route::POST('/users/delete','destroy');
    Route::POST('/users/manager','manager');
    Route::POST('/users/chef','chef');
    Route::POST('/users/livreur','livreur');
    Route::POST('/users/stars','stars');
    Route::POST('/users/profile','profile');
});


Route::controller(RestaurantController::class)->group(function () {
    Route::POST('/restaurants/store','store');    
    Route::POST('/restaurants/update','update');    
    Route::POST('/restaurants/show','show');    
    Route::POST('/restaurants/delete','destroy');    
    Route::POST('/restaurant/likerestaurant','likerestaurant');    
});


Route::controller(OrderController::class)->group(function () {
    Route::POST('/order/store','store');    
    Route::POST('/order/managerstore','stor');    
    Route::POST('/order/servesorder','servesorder');    
    Route::POST('/order/showorder','showorder');    
    Route::POST('/order/update','update');    
    Route::POST('/order/livreur/update','UpdateLivreur');    
    Route::POST('/order/delete','destroy');    
});


Route::controller(CommentController::class)->group(function () {
    Route::POST('/comment/store','store');    
    Route::POST('/comment/stor','stor');    
    Route::POST('/comment/bestcomments','BestComments');    
    Route::POST('/comment/show','show');    
    Route::POST('/comment/{id}/update','update')->name('comment.update');    
    Route::POST('/comment/delete','destroy');    
});


Route::controller(FAQController::class)->group(function () {
    Route::POST('/FAQ/store','store');    
    Route::POST('/FAQ/show','show');    
    Route::POST('/FAQ/{id}/update','update');    
    Route::POST('/faq/delete','destroy');    
});

Route::get('languageConverter/{lang}', function($lang){
    if(in_array($lang , ['en','ar'])){
        session()->put('lang',$lang);
    }
    return redirect()->back();
})->name('languageConverter');



