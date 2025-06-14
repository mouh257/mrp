<?php

namespace App\Http\Controllers\Web\parametres;

use App\Http\Controllers\Controller;
use App\Models\parametres\Groupedarticle;
use Illuminate\Http\Request;

class GroupedarticleController extends Controller
{
    public function __construct(){

        $this->middleware('auth');

    }
    public function index()
    {
        $groupedarticle = Groupedarticle::latest()->paginate(10);
        return view('parametres.groupe-d-article.index',
        compact('groupedarticle'))
            ->with('i',(request()->input('page',1)-1)*10);
    }

    public function create()
    {
        return view('parametres.groupe-d-article.create');
    }


    public function store(Request $request)
    {
        $request->validate(['name']);
        Groupedarticle::create($request->all());
        return redirect()->route('groupedarticle.index')
            ->with('success',"Groupe d'article ajouté avec success" );
    }


    public function show(Groupedarticle $groupedarticle)
    {
        return view('parametres.groupe-d-article.show',
            compact('groupedarticle'));
    }


    public function edit(Groupedarticle $groupedarticle)
    {
        return view('parametres.groupe-d-article.edit',
            compact('groupedarticle'));
    }


    public function update(Request $request, Groupedarticle $groupedarticle)
    {
        $request->validate(['name']);
        $groupedarticle->update($request->all());
        return redirect()->route('groupedarticle.index')
            ->with('success',"Groupe d'article modifié avec success" );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Groupedarticle $groupedarticle)
    {
        $groupedarticle->delete();
        return redirect()->route('groupedarticle.index')
            ->with('success',"Groupe d'article supprimé avec success" );
    }
}
