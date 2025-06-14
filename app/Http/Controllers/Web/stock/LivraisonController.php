<?php

namespace App\Http\Controllers\Web\stock;

use App\Http\Controllers\Controller;
use App\Models\parametres\Article;
use App\Models\parametres\Fournisseur;
use App\Models\stock\Approvisionnement;
use App\Models\stock\Livraison;
use Illuminate\Http\Request;

class LivraisonController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $livraisons=Livraison::latest()->paginate(9);
        return view('stock.livraison.index'
            ,compact('livraisons'))
            ->with('i',(request()->input('page',1)-1)*9);
    }

    public function create()
    {
        $fournisseurs = Fournisseur::all();
        $articles=Article::all();
        $commandes=Approvisionnement::all();
        return view('stock.livraison.create'
            ,compact('fournisseurs','articles','commandes'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'date'=>'required',
            'nbl'=>'required',
            'fournisseur_id'=>'required',
            'article_id'=>'required',
            'quantite'=>'required'
        ]);

        Livraison::create($request->all());
        return redirect()->route('livraison.index')
            ->with('success','Livraison ajoutée avec success');
    }


    public function show(Livraison $livraison)
    {
        return view('stock.livraison.show'
            ,compact('livraison'));
    }


    public function edit(Livraison $livraison)
    {
        $fournisseurs = Fournisseur::all();
        $articles=Article::all();
        $commandes=Approvisionnement::all();
        return view('stock.livraison.edit'
            ,compact('livraison','fournisseurs','articles','commandes'));
    }


    public function update(Request $request, Livraison $livraison)
    {
        $request->validate([
            'date'=>'required',
            'nbl'=>'required',
            'fournisseur_id'=>'required',
            'article_id'=>'required',
            'quantite'=>'required'
        ]);

        $livraison->update($request->all());
        return redirect()->route('livraison.index')
            ->with('success','livraison modifiée avec success');
    }


    public function destroy(Livraison $livraison)
    {
        $livraison->delete();
        return redirect()->route('livraison.index')
            ->with('success','livraison supprimée avec success');
    }
}
