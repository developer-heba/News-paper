<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class UserSubscribe extends Model
{
    protected $table='usersubscribes';
    protected $fillable = [
        'amount', 'user_id'
    ];
    
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    
}
