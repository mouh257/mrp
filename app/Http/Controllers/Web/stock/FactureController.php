<?php

namespace App\Http\Controllers\Web\stock;

use App\Http\Controllers\Controller;
use App\Models\parametres\Fournisseur;
use App\Models\stock\Facture;
use Illuminate\Http\Request;

class FactureController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $factures=Facture::latest()->paginate(9);
        return view('stock.facture.index'
            ,compact('factures'))
            ->with('i',(request()->input('page',1)-1)*9);
    }


    public function create()
    {
        $fournisseurs = Fournisseur::all();

        return view('stock.facture.create'
            ,compact('fournisseurs'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'date'=>'required',
            'reference'=>'required',
            'fournisseur_id'=>'required',
            'montant'=>'required'
        ]);
        Facture::create($request->all());
        return redirect()->route('facture.index')
            ->with('success','Facture ajoutée avec success');
    }


    public function show(Facture $facture)
    {
        return view('stock.facture.show'
            ,compact('facture'));
    }


    public function edit(Facture $facture)
    {
        $fournisseurs = Fournisseur::all();
        return view('stock.facture.edit'
            ,compact('facture','fournisseurs'));
    }


    public function update(Request $request, Facture $facture)
    {
        $request->validate([
            'date'=>'required',
            'reference'=>'required',
            'fournisseur_id'=>'required',
            'montant'=>'required'
        ]);

        $facture->update($request->all());
        return redirect()->route('facture.index')
            ->with('success','Facture modifiée avec success');
    }

    public function destroy(Facture $facture)
    {
        $facture->delete();
        return redirect()->route('facture.index')
            ->with('success','Facture supprimée avec success');
    }
}
