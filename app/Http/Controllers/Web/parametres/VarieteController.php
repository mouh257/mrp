<?php

namespace App\Http\Controllers\Web\parametres;

use App\Http\Controllers\Controller;
use App\Models\parametres\Culture;
use App\Models\parametres\Variete;
use Illuminate\Http\Request;

class VarieteController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $cultures=Culture::all();
        $varietes =Variete::latest()->paginate(10);
        return view('parametres.variete.index'
            ,compact('varietes','cultures'))
            ->with('i',(request()->input('page',1)-1)*10);
    }


    public function create()
    {
        $cultures=Culture::all();
        return view('parametres.variete.create'
            ,compact('cultures'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'culture_id'=>'required'
        ]);
        Variete::create($request->all());
        return redirect()->route('variete.index')
            ->with('success','Variété ajoutée avec success');
    }


    public function show(Variete $variete)
    {
        return view('parametres.variete.show'
            ,compact('variete'));
    }


    public function edit(Variete $variete)
    {
        $cultures=Culture::all();
        return view('parametres.variete.edit'
            ,compact('variete','cultures'));
    }


    public function update(Request $request, Variete $variete)
    {
        $request->validate([
            'name'=>'required',
            'culture_id'=>'required'
        ]);
        $variete->update($request->all());
        return redirect()->route('variete.index')
            ->with('success','Variété modifiée avec success');
    }


    public function destroy(Variete $variete)
    {
        $variete->delete();
        return redirect()->route('variete.index')
            ->with('success','Variété supprimée avec success');
    }
}
