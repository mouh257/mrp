<?php

namespace App\Http\Controllers\Web\parametres;

use App\Http\Controllers\Controller;
use App\Models\parametres\Calibre;
use App\Models\parametres\Culture;
use Illuminate\Http\Request;

class CalibreController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $cultures=Culture::all();
        $calibres =Calibre::latest()->paginate(10);
        return view('parametres.calibre.index'
            ,compact('calibres','cultures'))
            ->with('i',(request()->input('page',1)-1)*10);
    }


    public function create()
    {
        $cultures=Culture::all();
        return view('parametres.calibre.create'
            ,compact('cultures'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'culture_id'=>'required'
        ]);
        Calibre::create($request->all());
        return redirect()->route('calibre.index')
            ->with('success','Calibre ajoutée avec success');
    }


    public function show(Calibre $calibre)
    {
        return view('parametres.calibre.show'
            ,compact('calibre'));
    }


    public function edit(Calibre $calibre)
    {
        $cultures=Culture::all();
        return view('parametres.calibre.edit'
            ,compact('calibre','cultures'));
    }


    public function update(Request $request, Calibre $calibre)
    {
        $request->validate([
            'name'=>'required',
            'culture_id'=>'required'
        ]);
        $calibre->update($request->all());
        return redirect()->route('calibre.index')
            ->with('success','Calibre modifiée avec success');
    }


    public function destroy(Calibre $calibre)
    {
        $calibre->delete();
        return redirect()->route('calibre.index')
            ->with('success','Calibre supprimée avec success');
    }
}
