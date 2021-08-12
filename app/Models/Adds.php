<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Adds extends Model
{
    protected $table='adds';
    protected $fillable=['name','image','magazine_id'];
     public function magazine(){
       return  $this->belongsTo(Magazine::class,'magazine_id','id');
    }
     public function  getstatus(){
        return $this->status == 1 ? 'active'  : ' pending';
 
     }
}
