<?php

namespace App\Http\Controllers\monCompte;

use App\Http\Controllers\Controller;
use App\Models\Favoris;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MonCompteController extends Controller
{


    public function index()
    {

        $annonce = Auth::user()->annonces;

        return view('dashboard', ['annonces' => $annonce]);
    }

    public function updateUser(Request $request, $id)
    {

        if ($request->input('ancien_password') and $request->input('nouveau_password')) {
            $request->validate([
                'ancien_password' => 'required|string|confirmed|min:8',
                'nouveau_password' => 'required|string|confirmed|min:8'
            ]);
        }

        if ($request->input('name') and $request->input('phone') and $request->input('email')) {

            User::find($id)->update([
                'name' => $request->input('name'),
                'phone' => $request->input('phone'),
                'email' => $request->input('email')
            ]);

            return redirect()->back()->with('update_compte', 'compte mise à jour');
        }
    }

    public function addFavoris(Request $request)
    {
        if ($request->ajax()) {

            $favoris = Favoris::where('user_id',(int)$request->post('user'))->where('annonce_id',(int)$request->post('annonce'))->get();

           if (count($favoris)==1){
               Favoris::destroy($favoris[0]->id);
               return response()->json("deja en favoris");
           }
            else{
                $favoris = new Favoris();
                $favoris->user()->associate($request->post('user'));
                $favoris->annonce()->associate($request->post('annonce'));

                $favoris->save();

                return response()->json("ok");
            }
        }
        abort(404);
    }

}
