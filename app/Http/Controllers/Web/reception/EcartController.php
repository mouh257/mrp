<?php

namespace App\Http\Controllers\Web\reception;

use App\Http\Controllers\Controller;
use App\Models\reception\Ecart;
use App\Models\reception\Reception;
use Illuminate\Http\Request;

class EcartController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $receptions =Reception::all();
        $ecarts =Ecart::latest()->paginate(10);

        return view('receptions.ecart.index'
            ,compact('receptions','ecarts')
        )->with('i',(request()->input('page',1)-1)*10);
    }


    public function create()
    {
        $receptions =Reception::all();
        return view('receptions.ecart.create'
            ,compact('receptions'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'reception_id'=>'required',
            'pdsecart'=>'required'
        ]);

        Ecart::create($request->all());
        return redirect()->route('ecart.index')
            ->with('success','Ecart ajouté avec success');
    }


    public function show(Ecart $ecart)
    {
        return view('receptions.ecart.show'
            ,compact('ecart'));
    }


    public function edit(Ecart $ecart)
    {
        $receptions =Reception::all();
        return view('receptions.ecart.edit'
            ,compact('receptions','ecart'));
    }


    public function update(Request $request, Ecart $ecart)
    {
        $request->validate([
            'reception_id'=>'required',
            'pdsecart'=>'required'
        ]);
        $ecart->update($request->all());
        return redirect()->route('ecart.index')
            ->with('success','Ecart modifié avec success');
    }


    public function destroy(Ecart $ecart)
    {
        $ecart->delete();
        return redirect()->route('ecart.index')
            ->with('success','Ecart supprimé avec success');
    }
}
