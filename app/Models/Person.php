<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $primaryKey = 'UserName';

    protected $fillable = ['UserName', 'Email', 'Password','Telf','Photo'];  
    // protected $guarded = ['Telf','Photo'];

}
