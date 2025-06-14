<?php

namespace App\Http\Controllers\Web\stock;

use App\Http\Controllers\Controller;
use App\Models\parametres\Article;
use App\Models\parametres\Fournisseur;
use App\Models\stock\Approvisionnement;
use Illuminate\Http\Request;

class ApprovisionnementController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $commandes=Approvisionnement::latest()->paginate(9);
        return view('stock.approvisionnement.index'
            ,compact('commandes'))
            ->with('i',(request()->input('page',1)-1)*9);
    }


    public function create()
    {
        $fournisseurs = Fournisseur::all();
        $articles=Article::all();

        return view('stock.approvisionnement.create'
            ,compact('fournisseurs','articles'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'date'=>'required',
            'article_id'=>'required',
            'quantite'=>'required'
        ]);
        Approvisionnement::create($request->all());
        return redirect()->route('approvisionnement.index')
            ->with('success','commande ajoutée avec success');
    }


    public function show(Approvisionnement $approvisionnement)
    {
        return view('stock.approvisionnement.show'
            ,compact('approvisionnement',));
    }


    public function edit(Approvisionnement $approvisionnement)
    {
        $fournisseurs = Fournisseur::all();
        $articles=Article::all();

        return view('stock.approvisionnement.edit'
            ,compact('approvisionnement','fournisseurs','articles'));
    }


    public function update(Request $request, Approvisionnement $approvisionnement)
    {
        $request->validate([
            'date'=>'required',
            'article_id'=>'required',
            'quantite'=>'required'
        ]);

        $approvisionnement->update($request->all());
        return redirect()->route('approvisionnement.index')
            ->with('success','Commande modifiée avec success');

    }


    public function destroy(Approvisionnement $approvisionnement)
    {
        $approvisionnement->delete();
        return redirect()->route('approvisionnement.index')
            ->with('success','Commande supprimée avec success');
    }
}
