<?php

namespace App\Http\Controllers\RestApi\parametres;

use App\Http\Controllers\Controller;
use App\Models\parametres\Ferme;
use Illuminate\Http\Request;

class FermeController extends Controller
{
    protected $ferme;
    public function __construct()
    {
        $this->ferme = new Ferme();
    }

    public function index()
    {
        //return $this->ferme->all();

        $fermes = Ferme::with('producteur')
            ->with('serres') // hasMany
            ->orderBy('producteur_id')
            ->orderBy('name')
            ->get();
        return response()->json(['fermes'=>$fermes ],200);
        //return $fermes;

    }

    public function fermesOf(Request $request)
    {
        $producteur=$request->get('producteur');

        if($producteur !=null) {
            $fermes = Ferme::with('producteur')
                ->where('producteur_id', '=',$producteur)
                ->orderBy('name')
                ->get();
            return response()->json(['fermes' => $fermes], 200);
        }

    }

    public function store(Request $request)
    {
        return $this->ferme->create($request->all());
    }


    public function show(string $id)
    {
        return $this->ferme->find($id);
    }


    public function update(Request $request, string $id)
    {
        $ferme = $this->ferme->find($id);
        $ferme->update($request->all());
        return $ferme;
    }

    public function destroy(string $id)
    {
        $ferme = $this->ferme->find($id);
        return $ferme->delete();
    }
}
