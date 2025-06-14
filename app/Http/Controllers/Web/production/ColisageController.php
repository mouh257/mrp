<?php

namespace App\Http\Controllers\Web\production;

use App\Http\Controllers\Controller;
use App\Models\parametres\Calibre;
use App\Models\parametres\Coloration;
use App\Models\parametres\Produitfini;
use App\Models\parametres\Variete;
use App\Models\production\Colisage;
use App\Models\production\Palette;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isEmpty;

class ColisageController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {

        $colisage=Colisage::latest()->paginate(10);

        return view('production.colisage.index'
            ,compact('colisage'))
            ->with('i',(request()->input('page',1)-1)*10);
    }


    public function create()
    {

        $produitsfinis=Produitfini::all();
        $calibres=Calibre::all();
        $varietes=Variete::all();
        $colorations=Coloration::all();

        return view('production.colisage.create'
            ,compact('produitsfinis','calibres','varietes','colorations'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'produitfini_id'=>'required',
            'nbrcolis'=>'required',
            'versement'=>'required',
            'calibre_id'=>'required',
            'variete_id'=>'required',
            'coloration_id'=>'required'
        ]);

        $inputs=$request->all();

        if(!isset($inputs['palette_id'])){
            $typpal['typpal_id']=null;
            $newpal=Palette::create($typpal);
            $inputs['palette_id']=$newpal->id;
        }

        $pf= Produitfini::where('id', $request['produitfini_id'])->first();

        $pdstot= $request->nbrcolis * $pf->pdscolis ;

        $inputs['pdstotal']=$pdstot;

        //dd($inputs);

        Colisage::create($inputs);
        return redirect()->route('colisage.index')
            ->with('success','Ligne ajoutée avec success');
    }


    public function show(Colisage $colisage)
    {
        return view('production.colisage.show'
            ,compact('colisage'));
    }


    public function edit(Colisage $colisage)
    {
        $produitsfinis=Produitfini::all();
        $calibres=Calibre::all();
        $varietes=Variete::all();
        $colorations=Coloration::all();

        return view('production.colisage.edit'
            ,compact('colisage',
                'produitsfinis','calibres','varietes','colorations'));
    }

    public function pre_add(int $id)
    {
        $colisage=Colisage::where('id',$id)->first();
        $produitsfinis=Produitfini::all();
        $calibres=Calibre::all();
        $varietes=Variete::all();
        $colorations=Coloration::all();

        return view('production.colisage.add'
            ,compact('colisage',
                'produitsfinis','calibres','varietes','colorations')
        );
    }

    public function update(Request $request, Colisage $colisage)
    {
        $request->validate([
            'produitfini_id'=>'required',
            'nbrcolis'=>'required',
            'versement'=>'required',
            'calibre_id'=>'required',
            'variete_id'=>'required',
            'coloration_id'=>'required'
        ]);

        $inputs=$request->all();
        $pf= Produitfini::where('id', $request['produitfini_id'])->first();
        //dd($request->nbrcolis);
        $pdstot= $request->nbrcolis * $pf->pdscolis ;

        $inputs['pdstotal']=$pdstot;

        $colisage->update($inputs);
        return redirect()->route('colisage.index')
            ->with('success','Ligne modifiée avec success');
    }


    public function destroy(Colisage $colisage)
    {
        $colisage->delete();
        return redirect()->route('colisage.index')
            ->with('success','Ligne supprimée avec success');
    }
}
