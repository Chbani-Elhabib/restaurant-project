<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_people';
    public $incrementing = false;

    public function manger()
    {
        return $this->hasMany(Restaurant::class , 'id_people' , 'id_manager' );
    }


}
