<?php

namespace App\Http\Controllers\RestApi\parametres;

use App\Http\Controllers\Controller;
use App\Models\parametres\Variete;
use Illuminate\Http\Request;

class VarieteController extends Controller
{
    protected $variete;
    public function __construct()
    {
        $this->variete = new Variete();
    }

    public function index()
    {
        //return $this->variete->all();
        $varietes=Variete::with('culture')
            ->orderBy('culture_id')
            ->orderBy('name')
            ->get();
        return response()->json(['varietes'=>$varietes ],200);

    }

    public function varietesOf(Request $request)
    {
        $culture_id=$request->get('culture');

        if($culture_id!=null){
            $varietes=Variete::with('culture')
                ->where('culture_id','=',$culture_id)
                ->orderBy('name')
                ->get();
            return response()->json(['varietes'=>$varietes ],200);
        }
        return $this->index();
    }

    public function store(Request $request)
    {
        return $this->variete->create($request->all());
    }


    public function show(string $id)
    {
        return $this->variete->find($id);
    }


    public function update(Request $request, string $id)
    {
        $variete = $this->variete->find($id);
        $variete->update($request->all());
        return $variete;
    }

    public function destroy(string $id)
    {
        $variete = $this->variete->find($id);
        return $variete->delete();
    }
}
