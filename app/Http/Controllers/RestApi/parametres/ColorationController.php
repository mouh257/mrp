<?php

namespace App\Http\Controllers\RestApi\parametres;

use App\Http\Controllers\Controller;
use App\Models\parametres\Coloration;
use Illuminate\Http\Request;

class ColorationController extends Controller
{
    protected $coloration;
    public function __construct()
    {
        $this->coloration = new Coloration();
    }

    public function index()
    {
        //return $this->coloration->all();
        $colorations= Coloration::with('culture')
            ->orderBy('culture_id')
            ->orderBy('name')
            ->get();
        return response()->json(['colorations'=>$colorations ],200);
    }

    public function colorationsOf(Request $request)
    {
        $culture_id=$request->get('culture');

        if($culture_id!=null) {
            $colorations = Coloration::with('culture')
                ->where('culture_id','=',$culture_id)
                ->orderBy('name')
                ->get();
            return response()->json(['colorations' => $colorations], 200);
        }else
            return $this->index();
    }

    public function store(Request $request)
    {
        return $this->coloration->create($request->all());
    }


    public function show(string $id)
    {
        return $this->coloration->find($id);
    }


    public function update(Request $request, string $id)
    {
        $coloration = $this->coloration->find($id);
        $coloration->update($request->all());
        return $coloration;
    }

    public function destroy(string $id)
    {
        $coloration = $this->coloration->find($id);
        return $coloration->delete();
    }
}
