<?php

namespace App\Http\Controllers\Web\reception;

use App\Http\Controllers\Controller;
use App\Models\parametres\Culture;
use App\Models\parametres\Ferme;
use App\Models\parametres\Variete;
use App\Models\reception\Reception;
use Illuminate\Http\Request;

class ReceptionController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $fermes=Ferme::all();
        $cultures=Culture::all();
        $varietes =Variete::all();
        $receptions =Reception::latest()->paginate(10);

        return view('receptions.reception.index'
            ,compact('receptions','fermes','varietes','cultures')
        )->with('i',(request()->input('page',1)-1)*10);
    }


    public function create()
    {
        $fermes=Ferme::all();
        $cultures=Culture::all();
        $varietes =Variete::all();
        return view('receptions.reception.create'
            ,compact('fermes','varietes','cultures'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'ferme_id'=>'required',
            'culture_id'=>'required',
            'variete_id'=>'required',
            'versement'=>'required',
            'nbrcaisse'=>'required',
            'nbl'=>'required',
            'nbr'=>'required',
            'pdsbrut'=>'required',
            'pdsnet'=>'required'

        ]);
        Reception::create($request->all());
        return redirect()->route('reception.index')
            ->with('success','Réception ajoutée avec success');
    }


    public function show(Reception $reception)
    {
        return view('receptions.reception.show'
            ,compact('reception'));
    }


    public function edit(Reception $reception)
    {
        $fermes=Ferme::all();
        $cultures=Culture::all();
        $varietes =Variete::all();
        return view('receptions.reception.edit'
            ,compact('reception','fermes','varietes','cultures'));
    }


    public function update(Request $request, Reception $reception)
    {
        $request->validate([
            'ferme_id'=>'required',
            'culture_id'=>'required',
            'variete_id'=>'required',
            'versement'=>'required',
            'nbrcaisse'=>'required',
            'nbl'=>'required',
            'nbr'=>'required',
            'pdsbrut'=>'required',
            'pdsnet'=>'required'
        ]);
        $reception->update($request->all());
        return redirect()->route('reception.index')
            ->with('success','Réception modifiée avec success');
    }


    public function destroy(Reception $reception)
    {
        $reception->delete();
        return redirect()->route('reception.index')
            ->with('success','Réception supprimée avec success');
    }
}
