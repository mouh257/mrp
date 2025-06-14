<?php

namespace App\Http\Controllers\RestApi\parametres;

use App\Http\Controllers\Controller;
use App\Models\parametres\Serre;
use Illuminate\Http\Request;

class SerreController extends Controller
{
    protected $serre;

    public function __construct()
    {
        $this->serre = new Serre();
    }

    public function index()
    {
        //return $this->serre->all();
        $serres=Serre::with('ferme')
            ->with('culture')
            ->with('variete')
            ->orderBy('ferme_id')
            ->orderBy('name')
            ->get();
        return response()->json(['serres'=>$serres],200);
    }

    public function serresOf(Request $request)
    {
        $ferme_id=$request->get('ferme');
        if($ferme_id!=null){
            $serres=Serre::with('ferme')
                ->with('culture')
                ->with('variete')
                ->where('ferme_id','=',$ferme_id)
                ->orderBy('name')
                ->get();
            return response()->json(['serres'=>$serres],200);
        }
        return $this->index();
    }

    public function culturesOf(Request $request)
    {
        $ferme_id=$request->get('ferme');
        if($ferme_id!=null){
            $cultures=Serre::select('cultures.*')->distinct()
                ->where('ferme_id', $ferme_id)
                ->join('cultures', 'culture_id', '=', 'cultures.id')
                ->get();
            return response()->json(['cultures'=>$cultures],200);
        }
        return $this->index();
    }

    public function varietesIn(Request $request)
    {
        $ferme_id=$request->get('ferme');
        if($ferme_id!=null){
            $varietes=Serre::select('varietes.*')->distinct()
                ->where('ferme_id', $ferme_id)
                ->join('varietes', 'variete_id', '=', 'varietes.id')
                ->get();
            return response()->json(['varietes'=>$varietes],200);
        }
        return $this->index();
    }

    public function store(Request $request)
    {
        return $this->serre->create($request->all());
    }


    public function show(string $id)
    {
        return $this->serre->find($id);
    }


    public function update(Request $request, string $id)
    {
        $serre = $this->serre->find($id);
        $serre->update($request->all());
        return $serre;
    }

    public function destroy(string $id)
    {
        $serre = $this->serre->find($id);
        return $serre->delete();
    }
}
