<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Journalist extends Model
{
    protected $table='journalists';
    protected $fillable=['name','logo'];
    public function magazine(){
       return  $this->hasMany(Magazine::class,'journalist_id','id');
    }
    public function  getstatus(){
        return $this -> status == 1 ? 'active'  : ' pending';
 
     }
}
