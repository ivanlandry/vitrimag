<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddAnnonceRequest;
use App\Models\Annonce;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        //
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

        return view('pages/add_annonce', ['villes' => $villes, 'categories' => $categories]);


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

        $category = Category::where('id', $request->input(['category_id']))->first()->id;

        if (Auth::user()) {
            $user = Auth::user();

            $annonce = $user->annonces()->create($data);
            $annonce->category()->associate($category);

            $this->storeImage($annonce);

            return redirect()->back()->with('message_add_annonce', 'votre annonce a bien étée  créée');

        } else {
            // session(['data' => $data, 'categorie_id' => $categorie_id]);

            return redirect()->route('login');
        }

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

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
