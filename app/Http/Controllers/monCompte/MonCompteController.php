<?php

namespace App\Http\Controllers\monCompte;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MonCompteController extends Controller
{
    public function index(){

        $annonce = Auth::user()->annonces;

        return view('dashboard',['annonces'=>$annonce]);
    }

}
