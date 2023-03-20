<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function Person_order()
    {
        return $this->belongsTo(Person::class , 'id_people' , 'id_people' );
    }

    public function Restaurant_order()
    {
        return $this->belongsTo(Restaurant::class , 'id_restaurant' , 'id_restaurant' );
    }

    public function image_order()
    {
        return $this->hasMany(Order_meals::class , 'id_order' , 'id_order' );
    }
}
