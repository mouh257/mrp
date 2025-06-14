<?php

namespace App\Http\Controllers\RestApi\parametres;

use App\Http\Controllers\Controller;
use App\Models\parametres\Calibre;
use Illuminate\Http\Request;

class CalibreController extends Controller
{
    protected $calibre;
    public function __construct()
    {
        $this->calibre = new Calibre();
    }

    public function index()
    {
        //return $this->calibre->all();
        $calibres=Calibre::with('culture')
            ->orderBy('culture_id')
            ->orderBy('name')
            ->get();
        return response()->json(['calibres'=> $calibres],200);
    }

    public function calibresOf(Request $request)
    {
        $culture_id=$request->get('culture');

        if($culture_id!=null){
            $calibres=Calibre::with('culture')
                ->where('culture_id','=',$culture_id)
                ->orderBy('name')
                ->get();
            return response()->json(['calibres'=> $calibres],200);
        }
        else return $this->index();
    }

    public function store(Request $request)
    {
        return $this->calibre->create($request->all());
    }


    public function show(string $id)
    {
        return $this->calibre->find($id);
    }


    public function update(Request $request, string $id)
    {
        $calibre = $this->calibre->find($id);
        $calibre->update($request->all());
        return $calibre;
    }

    public function destroy(string $id)
    {
        $calibre = $this->calibre->find($id);
        return $calibre->delete();
    }
}
