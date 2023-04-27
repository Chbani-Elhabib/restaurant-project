<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_order';
    public $incrementing = false;
    // protected $guarded = ['id_Livrour'];
    // protected $fillable = ["id_order", "id_people", "id_restaurant" , "type_payment", "total", "Order_serves", "active_Delivery_price"];

    public function Person_order()
    {
        return $this->belongsTo(Person::class , 'id_people' , 'id_people' );
    }

    public function Livrour_order()
    {
        return $this->hasMany(Person::class , 'id_people' , 'id_Livrour' );
    }

    public function Livrour()
    {
        return $this->hasOne(Person::class , 'id_people' , 'id_Livrour' );
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
