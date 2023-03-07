<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_people';
    public $incrementing = false;

    public function Restaurant(){
        return $this->hasOne( Restaurant::class , 'id_people' , 'id_manager');
    }
    // protected $fillable = [ 'id_people' ,'UserName', 'Email', 'Password','Verif_Email','User_Group','Telf','Verif_Telf','Photo'];  

}
