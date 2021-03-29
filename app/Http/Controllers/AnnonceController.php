<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddAnnonceRequest;
use App\Models\Annonce;
use App\Models\Category;
use App\Models\Favoris;
use App\Models\SousCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class AnnonceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        $annonces = Annonce::publier()->get();

        return view('pages.annonces',['annonces'=>$annonces]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $villes = ["Yaounde", "bafoussam", "douala", "bamenda", "buéa", "ngaoundéré"];

        $categories = Category::all();

        return view('pages.add_annonce', ['villes' => $villes, 'categories' => $categories]);


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'ville' => 'bail|required|alpha',
            'titre' => 'bail|required|min:3',
            'sous_category_id' => 'required',
            'description' => 'bail|required|min:5',
            'prix' => 'bail|required',
            'img_1' => 'required|image|max:5000',
            'img_2' => 'required|image|max:5000',
            'img_3' => 'required|image|max:5000',
        ]);

        $annonce = Auth::user()->annonces()->create($data);

        $annonce->sous_category()->associate(SousCategory::where('id', $request->input(['sous_category_id']))->first()->id);

        $this->storeImage($annonce);

        return redirect()->back()->with('message_add_annonce', 'votre annonce a bien étée  créée');

    }

    private function storeImage(Annonce $annonce)
    {
        if (request('img_1') and request('img_2') and request('img_3')) {
            $annonce->update([
                'img_1' => request('img_1')->store('annonces', 'public'),
                'img_2' => request('img_2')->store('annonces', 'public'),
                'img_3' => request('img_3')->store('annonces', 'public'),
            ]);
        }
    }

    public function getSousCategorie(Request $request)
    {

        if ($request->ajax()) {

            $sous_categories = Category::find((int)$request->post('id_categorie'))->sous_categories()->get();

            return response()->json($sous_categories);
        }
        abort(404);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $annonce = Annonce::publier()->where('id',$id)->firstOrFail();

        $annonce->update([
            'nb_vue'=>DB::raw('nb_vue+1')
        ]);

        $favorisCount=0;

       if (Auth::user()){
           $favorisCount = count(Favoris::where('annonce_id',Annonce::find($id)->id)->where('user_id',Auth::user()->id)->get());
       }

        $annonces_similaires = SousCategory::find($annonce->sous_category->id);

        return view('pages.show_annonce' ,['annonce'=>$annonce,'annonces_similaires'=>$annonces_similaires->annonces,'favorisCount'=>$favorisCount]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (File::exists(public_path('storage/' . Annonce::find($id)->img_1)) and File::exists(public_path('storage/' . Annonce::find($id)->img_2)) and File::exists(public_path('storage/'.Annonce::find($id)->img_3)) ) {

            File::delete(public_path('storage/' . Annonce::find($id)->img_1));
            File::delete(public_path('storage/' . Annonce::find($id)->img_2));
            File::delete(public_path('storage/' . Annonce::find($id)->img_3));

            Annonce::destroy($id);
        }

        return redirect()->back();
    }
}
