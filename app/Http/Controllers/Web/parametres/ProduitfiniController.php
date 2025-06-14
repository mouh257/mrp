<?php

namespace App\Http\Controllers\Web\parametres;

use App\Http\Controllers\Controller;
use App\Models\parametres\Article;
use App\Models\parametres\Culture;
use App\Models\parametres\Produitfini;
use Illuminate\Http\Request;

class ProduitfiniController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $les_produitfinis =Produitfini::latest()->paginate(9);
        return view('parametres.produit-fini.index'
            ,compact('les_produitfinis')
        )->with('i',(request()->input('page',1)-1)*9);
    }


    public function create()
    {
        $les_cultures=Culture::all();
        $les_colis =Article::whereIn('group_id',[1,2,3,6,7])->get();
        $les_barquettes=Article::where('group_id','=','4')->get();
        $les_couvercles=Article::where('group_id','=','5')->get();
        $les_etiquettes =Article::whereIn('group_id',[10,8])->get();
        $les_stabilisateurs=Article::where('group_id','=','9')->get();
        $les_produitfinis =Produitfini::latest()->paginate(10);

        return view('parametres.produit-fini.create'
            ,compact('les_produitfinis',
                'les_cultures','les_colis',
                'les_barquettes','les_couvercles',
                'les_etiquettes','les_stabilisateurs'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'culture_id'=>'required',
            'colis_id'=>'required',
            'pdscolis'=>'required'
        ]);

        $inputs=$request->all();


        if(! isset($inputs['brqtt_id'])){
            $inputs['nbrbrqtt']=0;
            $inputs['pdsbrqtt']=0;
            $inputs['nbretiq']=0;
            $inputs['nbretiq2']=0;
        }elseif(! isset($inputs['etiq_id'])){
            $inputs['nbretiq']=0;
            $inputs['nbretiq2']=0;
        }elseif(! isset($inputs['etiq2_id'])){
            $inputs['nbretiq2']=0;
        }

        Produitfini::create($inputs);
        return redirect()->route('produitfini.index')
            ->with('success','Produit fini ajoutée avec success');
    }


    public function show(Produitfini $produitfini)
    {
        return view('parametres.produit-fini.show'
            ,compact('produitfini'));
    }


    public function edit(Produitfini $produitfini)
    {
        $les_cultures=Culture::all();
        $les_colis =Article::whereIn('group_id',[1,2,3,6,7])->get();
        $les_barquettes=Article::where('group_id','=','4')->get();
        $les_couvercles=Article::where('group_id','=','5')->get();
        $les_etiquettes =Article::whereIn('group_id',[10,8])->get();
        $les_stabilisateurs=Article::where('group_id','=','9')->get();

        return view('parametres.produit-fini.edit'
            ,compact('produitfini',
                'les_cultures','les_colis',
                'les_barquettes','les_couvercles',
                'les_etiquettes','les_stabilisateurs'));
    }


    public function update(Request $request, Produitfini $produitfini)
    {
        $request->validate([
            'name'=>'required',
            'culture_id'=>'required',
            'colis_id'=>'required',
            'pdscolis'=>'required'
        ]);
        $inputs=$request->all();


        if(! isset($inputs['brqtt_id'])){
            $inputs['nbrbrqtt']=0;
            $inputs['pdsbrqtt']=0;
            $inputs['nbretiq']=0;
            $inputs['nbretiq2']=0;
        }elseif(! isset($inputs['etiq_id'])){
            $inputs['nbretiq']=0;
            $inputs['nbretiq2']=0;
        }elseif(! isset($inputs['etiq2_id'])){
            $inputs['nbretiq2']=0;
        }

        $produitfini->update($inputs);

        return redirect()->route('produitfini.index')
            ->with('success','Produit-fini modifiée avec success');
    }


    public function destroy(Produitfini $produitfini)
    {
        $produitfini->delete();
        return redirect()->route('produitfini.index')
            ->with('success','Produit-fini supprimée avec success');
    }
}
