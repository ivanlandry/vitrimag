<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SousCategory;
use Illuminate\Http\Request;

class SousCategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $categories = Category::all();
        $sousCategorie = SousCategory::with('category')->get();

        return view('back/annonce/categorie/sous_categorie', ['categories' => $categories, 'sousCategories' => $sousCategorie]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        SousCategory::create([
            'titre' => $request->input('titre'),
            'category_id' => $request->input('categorie')
        ])->category()->associate(Category::find($request->input('categorie')));

        return redirect()->back()->with('message_add', 'sous catégorie enrégistrée! ');
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
        SousCategory::destroy($id);
        return redirect()->back()->with('message_delete', 'suppression reussie');
    }
}
