<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    // public $timestamps = false;

    const CREATED_AT = 'create-date';
    const UPDATED_AT = 'updated-date';

}
