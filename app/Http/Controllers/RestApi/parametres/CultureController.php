<?php

namespace App\Http\Controllers\RestApi\parametres;

use App\Http\Controllers\Controller;
use App\Models\parametres\Culture;
use Illuminate\Http\Request;

class CultureController extends Controller
{
    protected $culture;
    public function __construct()
    {
        $this->culture = new Culture();
    }

    public function index()
    {
        return $this->culture->all();
    }



    public function store(Request $request)
    {
        return $this->culture->create($request->all());
    }


    public function show(string $id)
    {
        return $this->culture->find($id);
    }


    public function update(Request $request, string $id)
    {
        $culture = $this->culture->find($id);
        $culture->update($request->all());
        return $culture;
    }

    public function destroy(string $id)
    {
        $culture = $this->culture->find($id);
        return $culture->delete();
    }
}
