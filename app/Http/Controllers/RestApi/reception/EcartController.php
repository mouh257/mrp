<?php

namespace App\Http\Controllers\RestApi\reception;

use App\Http\Controllers\Controller;
use App\Models\reception\Ecart;
use App\Models\reception\Reception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EcartController extends Controller
{
    protected $ecart;

    public function __construct(){
        $this->ecart=new Ecart();
    }

    public function index()
    {
        $ecarts=Reception::select(
                        'ecarts.id',
                        'ecarts.pdsecart',
                        'receptions.versement',
                        DB::raw('SUM(receptions.pdsnet) as pdsnet')
                    )
            ->leftJoin('ecarts', 'ecarts.versement', '=', 'receptions.versement')
            ->groupBy('ecarts.id','ecarts.pdsecart','receptions.versement')
            ->get();
        return response()->json(['ecarts'=>$ecarts],200);
    }

    public function ecartsOf(Request $request)
    {
        $ferme_id=$request->get('ferme');
        if($ferme_id!=null){
            $ecarts=Ecart::leftjoin('receptions', 'versement', '=', 'ecarts.versement')
                ->select('receptions.*', 'ecarts.pdsecart')
                ->with('ferme')
                ->with('culture')
                ->with('variete')
                ->where('receptions.ferme_id',$ferme_id)
                ->orderBy('receptions.created_at','desc')
                ->get();
            return response()->json(['ecarts'=>$ecarts],200);
        }
        else return $this->index();
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'versement' => 'required|integer',
            'pdsecart' => 'required|numeric',
        ]);

        $ecart = Ecart::create($validatedData);

        return response()->json(['ecart' => $ecart], 201);

    }

    public function show(string $id)
    {
        return $this->ecart->find($id);
    }

    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'versement' => 'required|integer',
            'pdsecart' => 'required|numeric',
        ]);

        $ecart = Ecart::findOrFail($id);
        $ecart->update($validatedData);

        return response()->json(['ecart' => $ecart], 200);
    }


    public function destroy(string $id)
    {
        $ecart=$this->ecart->find($id);
        return $ecart->delete();
    }
}
