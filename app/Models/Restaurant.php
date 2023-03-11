<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_restaurant';
    public $incrementing = false;

    public function image()
    {
        return $this->hasMany(image_restaurant::class , 'id_restaurant' );
    }



}
