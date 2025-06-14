<?php

namespace App\Http\Controllers\RestApi\parametres;

use App\Http\Controllers\Controller;
use App\Models\parametres\Produitfini;
use Illuminate\Http\Request;

class ProduitfiniController extends Controller
{
    protected $produitfini;
    public function __construct()
    {
        $this->produitfini = new Produitfini();
    }

    public function index()
    {
        $pf=Produitfini::with('culture')
            ->with('colis')
            ->with('barquette')
            ->with('couvercle')
            ->with('stabilisateur')
            ->with('etiquette')
            ->with('etiquette2')
            ->orderBy('culture_id')
            ->orderBy('name')
            ->get();
        return response()->json(['produitsfinis'=>$pf],200);
    }

    public function produitfiniOf(Request $request)
    {
        $cid=$request->get('culture');
        if($cid!=null){
            $pf=Produitfini::with('culture')
                ->with('colis')
                ->with('barquette')
                ->with('couvercle')
                ->with('stabilisateur')
                ->with('etiquette')
                ->with('etiquette2')
                ->where('culture_id',"=",$cid)
                ->orderBy('name')
                ->get();
            return response()->json(['produitsfinis'=>$pf],200);
        }
        return $this->index();
    }

    public function store(Request $request)
    {
        return $this->produitfini->create($request->all());
    }


    public function show(string $id)
    {
        return $this->produitfini->find($id);
    }


    public function update(Request $request, string $id)
    {
        $produitfini = $this->produitfini->find($id);
        $produitfini->update($request->all());
        return $produitfini;
    }

    public function destroy(string $id)
    {
        $produitfini = $this->produitfini->find($id);
        return $produitfini->delete();
    }
}
