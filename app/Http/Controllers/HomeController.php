<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        $now_date = date('Y-m-d');
        $now_time = date('H:i:s');

        $annonces =  Annonce::publier()->whereDate('created_at',date('Y-m-d'))->with('sous_category')->get();

        return view('home',['annonces'=>$annonces,'categories'=>Category::categories()->get()]);
    }
}
