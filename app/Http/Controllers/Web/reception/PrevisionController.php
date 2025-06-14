<?php

namespace App\Http\Controllers\Web\reception;

use App\Http\Controllers\Controller;
use App\Models\parametres\Culture;
use App\Models\parametres\Ferme;
use App\Models\parametres\Variete;
use App\Models\reception\Prevision;
use Illuminate\Http\Request;

class PrevisionController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $fermes=Ferme::all();
        $cultures=Culture::all();
        $varietes =Variete::all();
        $previsions =Prevision::latest()->paginate(10);

        return view('receptions.prevision.index'
            ,compact('previsions','fermes','varietes','cultures')
        )->with('i',(request()->input('page',1)-1)*10);
    }


    public function create()
    {
        $fermes=Ferme::all();
        $cultures=Culture::all();
        $varietes =Variete::all();
        return view('receptions.prevision.create'
            ,compact('fermes','varietes','cultures'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'ferme_id'=>'required',
            'culture_id'=>'required',
            'variete_id'=>'required',
            'dateprevision'=>'required',
            'pdsprevu'=>'required'

        ]);
        Prevision::create($request->all());
        return redirect()->route('prevision.index')
            ->with('success','Prevision ajoutée avec success');
    }


    public function show(Prevision $prevision)
    {
        return view('receptions.prevision.show'
            ,compact('prevision'));
    }


    public function edit(Prevision $prevision)
    {
        $fermes=Ferme::all();
        $cultures=Culture::all();
        $varietes =Variete::all();
        return view('receptions.prevision.edit'
            ,compact('prevision','fermes','varietes','cultures'));
    }


    public function update(Request $request, Prevision $prevision)
    {
        $request->validate([
            'ferme_id'=>'required',
            'culture_id'=>'required',
            'variete_id'=>'required',
            'dateprevision'=>'required',
            'pdsprevu'=>'required'

        ]);

        $prevision->update($request->all());
        return redirect()->route('prevision.index')
            ->with('success','Prevision modifiée avec success');
    }


    public function destroy(Prevision $prevision)
    {
        $prevision->delete();
        return redirect()->route('prevision.index')
            ->with('success','Prevision supprimée avec success');
    }
}
