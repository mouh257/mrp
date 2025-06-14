<?php

namespace App\Http\Controllers\Web\parametres;

use App\Http\Controllers\Controller;
use App\Models\parametres\Fournisseur;
use Illuminate\Http\Request;

class FournisseurController extends Controller
{
    /**
     * pour imposer l'antentification.
     */
    public function __construct(){

        $this->middleware('auth');

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fournisseur = Fournisseur::latest()->paginate(5);

        return view("parametres.fournisseur.index",
            compact('fournisseur'))
            ->with('i',(request()->input('page',1)-1)*5);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('parametres.fournisseur.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
        ]);
        Fournisseur::create($request->all());
        return redirect()->route("fournisseur.index")
            ->with('success','Fournisseur ajouté avec success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Fournisseur $fournisseur)
    {
        return view(
            'parametres.fournisseur.show',
            compact('fournisseur')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fournisseur $fournisseur)
    {
        return view(
            'parametres.fournisseur.edit',
            compact('fournisseur')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fournisseur $fournisseur)
    {
        $request->validate([
            'name'=>'required',
        ]);
        $fournisseur->update($request->all());
        return redirect()->route("fournisseur.index")
            ->with('success','Fournisseur modifié avec success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fournisseur $fournisseur)
    {
        $fournisseur->delete();
        return redirect()->route('fournisseur.index')
            ->with('success',"Fournisseur supprimé avec success");
    }
}
