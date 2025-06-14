<?php

namespace App\Http\Controllers\RestApi\production;

use App\Http\Controllers\Controller;
use App\Models\parametres\Produitfini;
use App\Models\production\Commande;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    protected  $commande;

    public function __construct(){
        $this->commande=new Commande();
    }

    public function index()
    {
        $currentDate = Carbon::now()->toDateString();

        $commandes=Commande::with('produitfini')
            ->where("datefab","=",$currentDate)
            ->get();

        return response()->json(['commandes'=>$commandes],200);
    }

    public function commandesOf(Request $request)
    {

        $datfab=$request->get('datefab');
        if($datfab!=null){
            $commandes=Commande::with('produitfini')
                ->where("datefab","=",$datfab)
                ->get();

            return response()->json(['commandes'=>$commandes],200);
        }else
            return $this->index();

    }

    public function store(Request $request)
    {
        $request->validate([
            'produitfini_id'=>'required',
            'nbrcolis'=>'required',
            'numcmd'=>'required',
            'client'=>'required',
            'datefab'=>'required',
            'nbrpal'=>'required',
        ]);

        $inputs=$request->all();
        $pf= Produitfini::where('id', $request['produitfini_id'])->first();
        //dd($request->nbrcolis);
        $pdstot= $request->nbrcolis * $pf->pdscolis ;

        $inputs['pdstotal']=$pdstot;
        $inputs['annulee']=0;

        return $this->commande->create($inputs);

    }

    public function show(string $id)
    {
        return $this->commande->find($id);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'produitfini_id'=>'required',
            'nbrcolis'=>'required',
            'numcmd'=>'required',
            'client'=>'required',
            'datefab'=>'required',
            'nbrpal'=>'required',
        ]);

        $commande= $this->commande->find($id);

        $inputs=$request->all();
        $pf= Produitfini::where('id', $request['produitfini_id'])->first();
        $pdstot= $request->nbrcolis * $pf->pdscolis ;

        $inputs['pdstotal']=$pdstot;
        $inputs['annulee']=0;

        return $commande->update($inputs);
    }

    public function destroy(string $id)
    {
        $commande= $this->commande->find($id);
        return $commande->delete();
    }
}
