<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['auth','admin']);
    }

    public function index()
    {
        $categories = Category::all();

        return view('back/annonce/categorie/categorie', ['categories' => $categories]);
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
        $data = $request->validate([
            'titre' => 'required',
            'image' => 'required|image|max:5000'
        ]);

        $categorie = Category::create($data);

        $this->storeImage($categorie);

        return redirect()->back()->with('message_add', 'catégorie enrégistrée! ');
    }

    private function storeImage(Category $category)
    {
        if (request('image')) {
            $category->update([
                'image' => request('image')->store('categories', 'public')
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
        if (count(Category::find($id)->sous_categories()->get()) < 1) {

            if (File::exists(public_path('storage/' . Category::find($id)->image))) {
                File::delete(public_path('storage/' . Category::find($id)->image));
                Category::destroy($id);
                return redirect()->back()->with('message_delete', 'suppression reussie');
            }
        } else
            return redirect()->back()->with('message_delete_alert', 'vous ne pouvez pa supprimer cette categorie');
    }
}
