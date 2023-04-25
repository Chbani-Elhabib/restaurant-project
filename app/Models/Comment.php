<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_comment';
    public $incrementing = false;

    public function Person()
    {
        return $this->hasOne(Person::class , 'id_people' , 'id_people' );
    }
}
