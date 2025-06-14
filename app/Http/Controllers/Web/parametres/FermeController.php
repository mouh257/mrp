<?php

namespace App\Http\Controllers\Web\parametres;

use App\Http\Controllers\Controller;
use App\Models\parametres\Ferme;
use App\Models\parametres\Producteur;
use Illuminate\Http\Request;

class FermeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $producteurs=Producteur::all();
        $fermes =Ferme::latest()->paginate(10);
        return view('parametres.ferme.index'
            ,compact('fermes','producteurs'))
            ->with('i',(request()->input('page',1)-1)*10);
    }


    public function create()
    {
        $producteurs=Producteur::all();
        return view('parametres.ferme.create',
            compact('producteurs'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'producteur_id'=>'required'
        ]);
        Ferme::create($request->all());

        return redirect()->route('ferme.index')
            ->with('success','Ferme ajoutée avec success');
    }


    public function show(Ferme $ferme)
    {
        return view('parametres.ferme.show',
            compact('ferme'));
    }


    public function edit(Ferme $ferme)
    {
        $producteurs=Producteur::all();
        return view('parametres.ferme.edit',
            compact('ferme','producteurs')
        );
    }


    public function update(Request $request, Ferme $ferme)
    {
        $request->validate([
            'name'=>'required',
            'producteur_id'=>'required'
        ]);

        $ferme->update($request->all());

        return redirect()
            ->route('ferme.index')
            ->with('success','Ferme modifiée avec success');
    }


    public function destroy(Ferme $ferme)
    {
        $ferme->delete();
        return redirect()
            ->route('ferme.index')
            ->with('success','Ferme supprimée avec success');
    }
}
