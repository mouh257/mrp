<?php

namespace App\Http\Controllers\Web\parametres;

use App\Http\Controllers\Controller;
use App\Models\parametres\Producteur;
use Illuminate\Http\Request;

class ProducteurController extends Controller
{
    public function __construct(){
        /**
         * pour imposer l'antentification.
         */
        $this->middleware('auth'); /** pour tous le controleur */
        //$this->middleware('auth')->except('show'); /** pour tous soff ... */
        //$this->middleware('auth')->only('store','create','edit','delete','update'); /** que pour ... */
    }

    public function index()
    {
        $producteur=Producteur::latest()->paginate(10);

        return view('parametres.producteur.index'
            ,compact('producteur'))
            ->with('i',(request()->input('page',1)-1)*10);

    }


    public function create()
    {
        return view('parametres.producteur.create');
    }

    public function store(Request $request)
    {
        //dd($request->all());

        $request->validate([
            'name'=>'required',
            'ref'=>'required',
            'ggn'=>'required',
        ]);

        $input=$request->all();

        if($image=$request->file('image')){
            $destination="images/";
            $newFileName=date("YmdHis").".".$image->getClientOriginalExtension();
            $image->move($destination,$newFileName);

            $input['image']=$newFileName;
        }

        Producteur::create($input);

        return redirect()
            ->route('producteur.index')
            ->with('success',"Producteur ajouté avec success");
    }

    public function show(Producteur $producteur)
    {
        return view('parametres.producteur.show'
            ,compact('producteur')
        );
    }

    public function edit(Producteur $producteur)
    {
        return view('parametres.producteur.edit',
                    compact('producteur')
                );
    }

    public function update(Request $request, Producteur $producteur)
    {
        $request->validate([
            'name'=>'required',
            'ref'=>'required',
            'ggn'=>'required',
        ]);

        $input=$request->all();

        if($image=$request->file('image')){
            $destination="images/";
            $newFileName=date("YmdHis").".".$image->getClientOriginalExtension();
            $image->move($destination,$newFileName);

            $input['image']=$newFileName;
        }else{
            unset($input['image']);
        }

        $producteur->update($input);

        return redirect()
            ->route('producteur.index')
            ->with('success',"Producteur modifié avec success");

    }

    public function destroy(Producteur $producteur)
    {
        $producteur->delete();
        return redirect()->route('producteur.index')
            ->with('success',"Producteur supprimé avec success");
    }
}
