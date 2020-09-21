<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table='users';
    protected $fillable = [
        'name', 'email', 'password'
    ];
    public function UserSubscribe(){
        return $this->hasMany(UserSubscribe::class,'user_id','id');
    }
    
 public function  getstatus(){
        return $this -> status == 1 ? 'active': 'blocked';
 
     }
 
    
}
