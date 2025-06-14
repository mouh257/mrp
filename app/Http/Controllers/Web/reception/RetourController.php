<?php

namespace App\Http\Controllers\Web\reception;

use App\Http\Controllers\Controller;
use App\Models\reception\Reception;
use App\Models\reception\Retour;
use Illuminate\Http\Request;

class RetourController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $receptions =Reception::all();
        $retours =Retour::latest()->paginate(10);

        return view('receptions.retour.index'
            ,compact('receptions','retours')
        )->with('i',(request()->input('page',1)-1)*10);
    }


    public function create()
    {
        $receptions =Reception::all();
        return view('receptions.retour.create'
            ,compact('receptions'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'reception_id'=>'required',
            'pdsretour'=>'required',
            'raison'=>'required'
        ]);

        Retour::create($request->all());
        return redirect()->route('retour.index')
            ->with('success','Retour ajouté avec success');
    }


    public function show(Retour $retour)
    {
        return view('receptions.retour.show'
            ,compact('retour'));
    }


    public function edit(Retour $retour)
    {
        $receptions =Reception::all();
        return view('receptions.retour.edit'
            ,compact('receptions','retour'));
    }


    public function update(Request $request, Retour $retour)
    {
        $request->validate([
            'reception_id'=>'required',
            'pdsretour'=>'required',
            'raison'=>'required'
        ]);
        $retour->update($request->all());
        return redirect()->route('retour.index')
            ->with('success','Retour modifié avec success');
    }


    public function destroy(Retour $retour)
    {
        $retour->delete();
        return redirect()->route('retour.index')
            ->with('success','Retour supprimé avec success');
    }
}
