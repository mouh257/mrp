<?php

namespace App\Http\Controllers\Web\parametres;

use App\Http\Controllers\Controller;
use App\Models\parametres\Culture;
use Illuminate\Http\Request;

class CultureController extends Controller
{
    public function __construct(){

        $this->middleware('auth');
    }

    public function index()
    {
        $culture = Culture::latest()->paginate(10);

        return view('parametres.culture.index'
            ,compact('culture'))
            ->with('i',(request()->input('page',1)-1)*10);
    }


    public function create()
    {
        return view('parametres.culture.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'verstart'=>'required',
            'versend'=>'required',
        ]);
        Culture::create($request->all());
        return redirect()
            ->route('culture.index')
            ->with('success',"Culture ajoutée avec success");
    }


    public function show(Culture $culture)
    {
        return view(
            'parametres.culture.show',
            compact('culture')
        );
    }


    public function edit(Culture $culture)
    {
        return view('parametres.culture.edit',
            compact('culture'));
    }


    public function update(Request $request, Culture $culture)
    {
        $request->validate([
            'name'=>'required',
            'verstart'=>'required',
            'versend'=>'required',
        ]);

        $culture->update($request->all());
        return redirect()
            ->route('culture.index')
            ->with('success',"Culture modifiée avec success");
    }


    public function destroy(Culture $culture)
    {
        $culture->delete();
        return redirect()->route('culture.index')
            ->with('success',"Culture supprimée avec success");

    }
}
