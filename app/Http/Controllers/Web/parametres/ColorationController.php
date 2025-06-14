<?php

namespace App\Http\Controllers\Web\parametres;

use App\Http\Controllers\Controller;
use App\Models\parametres\Coloration;
use App\Models\parametres\Culture;
use Illuminate\Http\Request;

class ColorationController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $cultures=Culture::all();
        $colorations =Coloration::latest()->paginate(10);
        return view('parametres.coloration.index'
            ,compact('colorations','cultures'))
            ->with('i',(request()->input('page',1)-1)*10);
    }


    public function create()
    {
        $cultures=Culture::all();
        return view('parametres.coloration.create'
            ,compact('cultures'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'culture_id'=>'required'
        ]);
        Coloration::create($request->all());
        return redirect()->route('coloration.index')
            ->with('success','Coloration ajoutée avec success');
    }


    public function show(Coloration $coloration)
    {
        return view('parametres.coloration.show'
            ,compact('coloration'));
    }


    public function edit(Coloration $coloration)
    {
        $cultures=Culture::all();
        return view('parametres.coloration.edit'
            ,compact('coloration','cultures'));
    }


    public function update(Request $request, Coloration $coloration)
    {
        $request->validate([
            'name'=>'required',
            'culture_id'=>'required'
        ]);
        $coloration->update($request->all());
        return redirect()->route('coloration.index')
            ->with('success','Coloration modifiée avec success');
    }


    public function destroy(Coloration $coloration)
    {
        $coloration->delete();
        return redirect()->route('coloration.index')
            ->with('success','Coloration supprimée avec success');
    }
}
