<?php

namespace App\Http\Controllers\Web\production;

use App\Http\Controllers\Controller;
use App\Models\production\Depart;
use Illuminate\Http\Request;

class DepartController extends Controller
{
    public function __construct(){
        $this->middleware('auth'); /** pour tous le controleur */
    }

    public function index()
    {
        $departs=Depart::latest()->paginate(10);

        return view('production.depart.index'
            ,compact('departs'))
            ->with('i',(request()->input('page',1)-1)*10);
    }


    public function create()
    {
        return view('production.depart.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'numexp'=>'required',
            'datedepart'=>'required'
        ]);

        Depart::create($request->all());

        return redirect()
            ->route('depart.index')
            ->with('success',"Depart ajouté avec success");
    }


    public function show(Depart $depart)
    {
        return view('production.depart.show'
            ,compact('depart')
        );
    }


    public function edit(Depart $depart)
    {
        return view('production.depart.edit'
            ,compact('depart')
        );
    }


    public function update(Request $request, Depart $depart)
    {
        $request->validate([
            'numexp'=>'required',
            'datedepart'=>'required'
        ]);

        $depart->update($request->all());

        return redirect()
            ->route('depart.index')
            ->with('success',"Depart modifié avec success");
    }


    public function destroy(Depart $depart)
    {
        $depart->delete();
        return redirect()->route('depart.index')
            ->with('success',"Depart supprimé avec success");
    }
}
