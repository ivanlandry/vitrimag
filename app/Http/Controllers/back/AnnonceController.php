<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Mail\ValidationAnnonce;
use App\Models\Annonce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;

class AnnonceController extends Controller
{
    public function index()
    {

        $annonces = Annonce::with('sous_category')->get();

        return view('back/annonce/annonces', ['annonces' => $annonces]);
    }

    public function valider_annonce($id)
    {
        Annonce::find($id)->update([
            'publier' => true
        ]);

        $annonce = Annonce::find($id);

        Mail::to($annonce->user->email)->send(new ValidationAnnonce(Auth::user(), "Mr/Mme " . $annonce->user->name . "votre annonce a étée validée"));

        return redirect()->back()->with('message_valider', 'validation réussie');
    }

    public function destroy($id)
    {

        if (File::exists(public_path('storage/' . Annonce::find($id)->img_1)) and File::exists(public_path('storage/' . Annonce::find($id)->img_2)) and File::exists(public_path('storage/' . Annonce::find($id)->img_1))) {
            File::delete(public_path('storage/' . Annonce::find($id)->img_1));
            File::delete(public_path('storage/' . Annonce::find($id)->img_2));
            File::delete(public_path('storage/' . Annonce::find($id)->img_3));

            Annonce::destroy($id);
        }


        return redirect()->back()->with('message_delete', 'suppression réussie');
    }
}
