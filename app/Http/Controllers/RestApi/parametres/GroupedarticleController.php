<?php

namespace App\Http\Controllers\RestApi\parametres;

use App\Http\Controllers\Controller;
use App\Models\parametres\Groupedarticle;
use Illuminate\Http\Request;

class GroupedarticleController extends Controller
{
    protected $groupe;
    public function __construct()
    {
        $this->groupe = new Groupedarticle();
    }

    public function index()
    {
        return $this->groupe->all();
    }

    public function store(Request $request)
    {
        return $this->groupe->create($request->all());
    }


    public function show(string $id)
    {
        return $this->groupe->find($id);
    }


    public function update(Request $request, string $id)
    {
        $groupe = $this->groupe->find($id);
        $groupe->update($request->all());
        return $groupe;
    }

    public function destroy(string $id)
    {
        $groupe = $this->groupe->find($id);
        return $groupe->delete();
    }
}
