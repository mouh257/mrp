<?php

namespace App\Http\Controllers\RestApi\parametres;

use App\Http\Controllers\Controller;
use App\Models\parametres\Fournisseur;
use Illuminate\Http\Request;

class FournisseurController extends Controller
{
    protected $fournisseur;
    public function __construct()
    {
        $this->fournisseur = new Fournisseur();
    }

    public function index()
    {
        return $this->fournisseur->all();
    }

    public function store(Request $request)
    {
        return $this->fournisseur->create($request->all());
    }


    public function show(string $id)
    {
        return $this->fournisseur->find($id);
    }


    public function update(Request $request, string $id)
    {
        $fournisseur = $this->fournisseur->find($id);
        $fournisseur->update($request->all());
        return $fournisseur;
    }

    public function destroy(string $id)
    {
        $fournisseur = $this->fournisseur->find($id);
        return $fournisseur->delete();
    }
}
