<?php

namespace App\Http\Controllers\Web\stock;

use App\Http\Controllers\Controller;
use App\Models\parametres\Article;
use App\Models\parametres\Fournisseur;
use App\Models\stock\Inventaire;
use Illuminate\Http\Request;

class InventaireController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $inventaires= Inventaire::latest()->paginate(9);
        return view('stock.inventaire.index'
            ,compact('inventaires'))
            ->with('i',(request()->input('page',1)-1)*9);
    }


    public function create()
    {
        $fournisseurs = Fournisseur::all();
        $articles=Article::all();

        return view('stock.inventaire.create'
            ,compact('fournisseurs','articles'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'date'=>'required',
            'article_id'=>'required',
            'quantite'=>'required'
        ]);
        Inventaire::create($request->all());
        return redirect()->route('inventaire.index')
            ->with('success','Inventaire ajouté avec success');
    }


    public function show(Inventaire $inventaire)
    {
        return view('stock.inventaire.show'
            ,compact('inventaire'));
    }


    public function edit(Inventaire $inventaire)
    {
        $fournisseurs = Fournisseur::all();
        $articles=Article::all();

        return view('stock.inventaire.edit'
            ,compact('inventaire','fournisseurs','articles'));
    }


    public function update(Request $request, Inventaire $inventaire)
    {
        $request->validate([
            'date'=>'required',
            'article_id'=>'required',
            'quantite'=>'required'
        ]);

        $inventaire->update($request->all());
        return redirect()->route('inventaire.index')
            ->with('success','Inventaire modifié avec success');
    }


    public function destroy(Inventaire $inventaire)
    {
        $inventaire->delete();
        return redirect()->route('inventaire.index')
            ->with('success','Inventaire supprimé avec success');
    }
}
