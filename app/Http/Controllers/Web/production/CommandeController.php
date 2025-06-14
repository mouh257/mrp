<?php

namespace App\Http\Controllers\Web\production;

use App\Http\Controllers\Controller;
use App\Models\parametres\Produitfini;
use App\Models\production\Commande;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $produitsfinis=Produitfini::all();
        $commandes=Commande::latest()->paginate(10);

        return view('production.commande.index'
            ,compact('commandes','produitsfinis'))
            ->with('i',(request()->input('page',1)-1)*10);
    }


    public function create()
    {
        $produitsfinis=Produitfini::all();

        return view('production.commande.create'
            ,compact('produitsfinis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'produitfini_id'=>'required',
            'nbrcolis'=>'required',
            'numcmd'=>'required',
            'client'=>'required',
            'datefab'=>'required',
            'nbrpal'=>'required',
        ]);

        $inputs=$request->all();
        $pf= Produitfini::where('id', $request['produitfini_id'])->first();
        //dd($request->nbrcolis);
        $pdstot= $request->nbrcolis * $pf->pdscolis ;

        $inputs['pdstotal']=$pdstot;

        Commande::create($inputs);
        return redirect()->route('commande.index')
            ->with('success','Commande ajoutée avec success');
    }


    public function show(Commande $commande)
    {
        return view('production.commande.show'
            ,compact('commande'));
    }


    public function edit(Commande $commande)
    {
        $produitsfinis=Produitfini::all();

        return view('production.commande.edit'
            ,compact('produitsfinis','commande'));
    }


    public function update(Request $request, Commande $commande)
    {
        $request->validate([
            'produitfini_id'=>'required',
            'nbrcolis'=>'required',
            'numcmd'=>'required',
            'client'=>'required',
            'datefab'=>'required',
            'nbrpal'=>'required'

        ]);

        $inputs=$request->all();
        $pf= Produitfini::where('id', $request['produitfini_id'])->first();
        //dd($request->nbrcolis);
        $pdstot= $request->nbrcolis * $pf->pdscolis ;

        $inputs['pdstotal']=$pdstot;

        $commande->update($inputs);
        return redirect()->route('commande.index')
            ->with('success','Commande modifiée avec success');

    }


    public function destroy(Commande $commande)
    {
        $commande->delete();
        return redirect()->route('commande.index')
            ->with('success','Commande supprimée avec success');
    }
}
