<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        return view('home',['annonces'=> Annonce::with('sous_category')->get(),'categories'=>Category::all()]);
    }
}
