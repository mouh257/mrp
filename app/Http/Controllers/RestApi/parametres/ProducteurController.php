<?php

namespace App\Http\Controllers\RestApi\parametres;

use App\Http\Controllers\Controller;
use App\Models\parametres\Producteur;
use Illuminate\Http\Request;

class ProducteurController extends Controller
{
    protected $producteur;
    public function __construct()
    {
        $this->producteur = new Producteur();
    }

    public function index()
    {
        return $this->producteur->all();
    }

    public function store(Request $request)
    {
        return $this->producteur->create($request->all());
    }


    public function show(string $id)
    {
        return $this->producteur->find($id);
    }


    public function update(Request $request, string $id)
    {
        $producteur = $this->producteur->find($id);
        $producteur->update($request->all());
        return $producteur;
    }

    public function destroy(string $id)
    {
        $producteur = $this->producteur->find($id);
        return $producteur->delete();
    }
}
