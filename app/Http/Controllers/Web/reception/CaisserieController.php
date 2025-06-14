<?php

namespace App\Http\Controllers\Web\reception;

use App\Http\Controllers\Controller;
use App\Models\parametres\Ferme;
use App\Models\reception\Caisserie;
use Illuminate\Http\Request;

class CaisserieController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $fermes=Ferme::all();
        $caisseries =Caisserie::latest()->paginate(10);

        return view('receptions.caisserie.index'
            ,compact('caisseries','fermes')
        )->with('i',(request()->input('page',1)-1)*10);
    }


    public function create()
    {
        $fermes=Ferme::all();
        return view('receptions.caisserie.create'
            ,compact('fermes'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'ferme_id'=>'required',
            'nbrcaisse'=>'required',
        ]);

        Caisserie::create($request->all());
        return redirect()->route('caisserie.index')
            ->with('success','Sortie de caisse ajoutée avec success');
    }


    public function show(Caisserie $caisserie)
    {
        return view('receptions.caisserie.show'
            ,compact('caisserie'));
    }


    public function edit(Caisserie $caisserie)
    {
        $fermes=Ferme::all();
        return view('receptions.caisserie.edit'
            ,compact('caisserie','fermes'));
    }


    public function update(Request $request, Caisserie $caisserie)
    {
        $request->validate([
            'ferme_id'=>'required',
            'nbrcaisse'=>'required',
        ]);
        $caisserie->update($request->all());
        return redirect()->route('caisserie.index')
            ->with('success','Mouvement de caisse modifié avec success');
    }

    public function destroy(Caisserie $caisserie)
    {
        $caisserie->delete();
        return redirect()->route('caisserie.index')
            ->with('success','Mouvement de caisse supprimée avec success');
    }
}
