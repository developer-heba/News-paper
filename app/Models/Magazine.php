<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Magazine extends Model
{
    protected $table='magazines';
    protected $fillable=['title','file','journalist_id'];
    public function jornalist(){
        return $this->belongsTo(Journalist::class,'journalist_id','id');
    }

 public function  getstatus(){
        return $this -> status == 1 ? 'active'  : ' pending';
 
     }

    public function adds(){
        return $this->hasMany(Adds::class,'magazine_id','id');
    }
}
