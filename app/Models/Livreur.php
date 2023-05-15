<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livreur extends Model
{
    use HasFactory;

    public function Levrour()
    {
        return $this->belongsTo(Restaurant::class , 'id_restaurant' , 'id_restaurant' );
    }

    public function Levrour_person()
    {
        return $this->hasMany(Person::class , 'id_people' , 'id_livreur' );
    }

    public function LevrourPerson()
    {
        return $this->hasOne(Person::class , 'id_people' , 'id_livreur' );
    }
}
