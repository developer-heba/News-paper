<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Journalist;
use Illuminate\Http\Request;

class JournalistController extends Controller
{
    public function Getall(){
        $journalists= Journalist::all();
        return response()->json($journalists, 200);


    }
}
