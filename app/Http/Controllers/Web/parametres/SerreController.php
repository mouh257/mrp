<?php

namespace App\Http\Controllers\Web\parametres;

use App\Http\Controllers\Controller;
use App\Models\parametres\Culture;
use App\Models\parametres\Ferme;
use App\Models\parametres\Serre;
use App\Models\parametres\Variete;
use Illuminate\Http\Request;

class SerreController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $fermes=Ferme::all();
        $cultures=Culture::all();
        $varietes =Variete::all();
        $serres =Serre::latest()->paginate(10);

        return view('parametres.serre.index'
            ,compact('serres','fermes','varietes','cultures')
        )->with('i',(request()->input('page',1)-1)*10);
    }


    public function create()
    {
        $fermes=Ferme::all();
        $cultures=Culture::all();
        $varietes =Variete::all();
        return view('parametres.serre.create'
            ,compact('fermes','varietes','cultures'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'superficie'=>'required',
            'ferme_id'=>'required',
            'culture_id'=>'required',
            'variete_id'=>'required'
        ]);
        Serre::create($request->all());
        return redirect()->route('serre.index')
            ->with('success','Serre ajoutée avec success');
    }


    public function show(Serre $serre)
    {
        return view('parametres.serre.show'
            ,compact('serre'));
    }


    public function edit(Serre $serre)
    {
        $fermes=Ferme::all();
        $cultures=Culture::all();
        $varietes =Variete::all();
        return view('parametres.serre.edit'
            ,compact('serre','fermes','varietes','cultures'));
    }


    public function update(Request $request, Serre $serre)
    {
        $request->validate([
            'name'=>'required',
            'superficie'=>'required',
            'ferme_id'=>'required',
            'culture_id'=>'required',
            'variete_id'=>'required'
        ]);
        $serre->update($request->all());
        return redirect()->route('serre.index')
            ->with('success','Serre modifiée avec success');
    }


    public function destroy(Serre $serre)
    {
        $serre->delete();
        return redirect()->route('serre.index')
            ->with('success','Serre supprimée avec success');
    }
}
