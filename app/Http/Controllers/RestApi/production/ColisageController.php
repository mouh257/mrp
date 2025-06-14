<?php

namespace App\Http\Controllers\RestApi\production;

use App\Http\Controllers\Controller;
use App\Models\parametres\Produitfini;
use App\Models\production\Colisage;
use Illuminate\Http\Request;

class ColisageController extends Controller
{
    /**
     * 'palette_id','produitfini_id','nbrcolis','versement','calibre_id','variete_id','coloration_id','pdstotal','observation'
     */
    protected $colisage;

    public function __construct()
    {
        $this->colisage=new Colisage();
    }

    public function index()
    {
        $colisages =Colisage::with('produitfini')
            ->with('calibre')
            ->with('variete')
            ->with('coloration')
            ->get();
        return response()->json(['colisages'=>$colisages],200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'produitfini_id'=>'required',
            'nbrcolis'=>'required',
            'versement'=>'required',
            'variete_id'=>'required',
        ]);

        $inputs=$request->all();
        $pf= Produitfini::where('id', $request['produitfini_id'])->first();
        //dd($request->nbrcolis);
        $pdstot= $request->nbrcolis * $pf->pdscolis ;

        $inputs['pdstotal']=$pdstot;

        return $this->colisage->create($inputs);
    }

    public function show(string $id)
    {
        return $this->colisage->find($id);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'produitfini_id'=>'required',
            'nbrcolis'=>'required',
            'versement'=>'required',
            'variete_id'=>'required',
        ]);

        $colisage=$this->colisage->find($id);
        $inputs=$request->all();
        $pf= Produitfini::where('id', $request['produitfini_id'])->first();
        //dd($request->nbrcolis);
        $pdstot= $request->nbrcolis * $pf->pdscolis ;

        $inputs['pdstotal']=$pdstot;

        $colisage->update($inputs);
        return $colisage;
    }

    public function destroy(string $id)
    {
        $colisage=$this->colisage->find($id);
        return $colisage->delette();
    }
}
