<?php

namespace App\Http\Controllers\Web\production;

use App\Http\Controllers\Controller;
use App\Models\parametres\Article;
use App\Models\production\Depart;
use App\Models\production\Palette;
use Illuminate\Http\Request;

class PaletteController extends Controller
{
    //protected $palette;
    public function __construct(){
        $this->middleware('auth');
        //$this->palette =new Palette();
    }

    public function index()
    {
        $departs=Depart::all();
        $palettes =Palette::latest()->paginate(10);
        return view('production.palette.index'
            ,compact('departs','palettes'))
            ->with('i',(request()->input('page',1)-1)*10);
    }


    public function create()
    {
        $departs=Depart::all();
        $articles=Article::all();
        return view('production.palette.create'
            ,compact('departs','articles'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'typpal_id'=>'required'
        ]);
        //dd($request->all());
        $newpal=Palette::create($request->all());
        //dd($newpal->id);
        return redirect()->route('palette.index')
            ->with('success','Palette ajoutée avec success');
    }


    public function show(Palette $palette)
    {
        return view('production.palette.show'
            ,compact('palette'));
    }


    public function edit(Palette $palette)
    {
        $departs=Depart::all();
        $articles=Article::all();
        return view(
            'production.palette.edit'
            ,compact('palette','departs','articles')
        );
    }


    public function update(Request $request, Palette $palette)
    {
        $request->validate([
            'numpal'=>'required',
            'cornier'=>'required',
            'feuillard'=>'required',
            'depart_id'=>'required',
            'typpal_id'=>'required'
        ]);

        $palette->update($request->all());
        return redirect()->route('palette.index')
            ->with('success','Palette modifiée avec success');
    }


    public function destroy(Palette $palette)
    {
        $palette->delete();
        return redirect()->route('palette.index')
            ->with('success','Palette supprimée avec success');
    }
}
