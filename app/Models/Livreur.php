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
}
