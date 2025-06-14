<?php

namespace App\Http\Controllers\Web\stock;

use App\Http\Controllers\Controller;
use App\Models\parametres\Article;
use App\Models\parametres\Fournisseur;
use App\Models\stock\Sortie;
use Illuminate\Http\Request;

class SortieController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $sorties=Sortie::latest()->paginate(9);
        return view('stock.sortie.index'
            ,compact('sorties'))
            ->with('i',(request()->input('page',1)-1)*9);
    }

    public function create()
    {
        $fournisseurs = Fournisseur::all();
        $articles=Article::all();

        return view('stock.sortie.create'
            ,compact('fournisseurs','articles'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'date'=>'required',
            'nbs'=>'required',
            'fournisseur_id'=>'required',
            'article_id'=>'required',
            'quantite'=>'required'
        ]);

        Sortie::create($request->all());
        return redirect()->route('sortie.index')
            ->with('success','Sortie ajoutée avec success');
    }


    public function show(Sortie $sortie)
    {
        return view('stock.sortie.show'
            ,compact('sortie'));
    }

    public function edit(Sortie $sortie)
    {
        $fournisseurs = Fournisseur::all();
        $articles=Article::all();

        return view('stock.sortie.edit'
            ,compact('sortie','fournisseurs','articles'));
    }


    public function update(Request $request, Sortie $sortie)
    {
        $request->validate([
            'date'=>'required',
            'nbs'=>'required',
            'fournisseur_id'=>'required',
            'article_id'=>'required',
            'quantite'=>'required'
        ]);

        $sortie->update($request->all());
        return redirect()->route('sortie.index')
            ->with('success','Sortie modifiée avec success');
    }


    public function destroy(Sortie $sortie)
    {
        $sortie->delete();
        return redirect()->route('sortie.index')
            ->with('success','Sortie supprimée avec success');
    }
}
