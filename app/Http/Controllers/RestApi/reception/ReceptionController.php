<?php

namespace App\Http\Controllers\RestApi\reception;

use App\Http\Controllers\Controller;
use App\Models\production\Colisage;
use App\Models\reception\Reception;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReceptionController extends Controller
{
    protected $reception;

    public function __construct()
    {
        $this->reception=new Reception();
    }

    public function index()
    {
        $receptions= Reception::with('ferme')
            ->with('culture')
            ->with('variete')
            ->orderBy('created_at','desc')
            ->get();
        return response()->json(['receptions'=>$receptions],200);
    }

    public function versementOf(Request $request)
    {
        try{
            $ferme_id=$request->get('ferme');
            $culture_id=$request->get('culture');
            $currentDate = Carbon::now()->toDateString();

            if($ferme_id!=null && $culture_id!=null){

                $versement=Reception::where('ferme_id','=',$ferme_id)
                    ->where('culture_id','=',$culture_id)
                    ->whereDate('created_at', $currentDate)
                    ->max('versement');
                if($versement===null){
                    $versement=Reception::where('culture_id','=',$culture_id)
                        ->whereDate('created_at', $currentDate)
                        ->max('versement');

                    if($versement===null){
                        $versement=Reception::where('culture_id','=',$culture_id)
                            ->max('versement');

                        if($versement===null){

//                            $versement=Culture::select('verstart As versement')
//                                ->where('id',$culture_id)
//                                ->get();
                            //return null;
                            //return response()->json($versement,200);
                            return response()->json(['versement'=>$versement],200);
                        }
                        else
                            return response()->json(['versement'=>$versement+1],200);
                    }
                    else
                        return response()->json(['versement'=>$versement+1],200);
                }
                else
                    return response()->json(['versement'=>$versement],200);
            }
            else return response()->json(['versement'=>0],200);
        } catch (\Exception $e) {
            // Log the error for further analysis
            Log::error('Error in versementOf function: ' . $e->getMessage());
            return response()->json(['error' => 'Internal_Server_Error'], 500);
        }
    }

    public function cultureOfVersement(Request $request){

        $versement=$request->get('versement');

        if($versement!=null) {
            $culture = Reception::where('versement', '=', $versement)
                ->first('culture_id');
            return response()->json(['culture'=>$culture],200);
        }
        else return response()->json(['culture'=>0],404);

    }

    public function varietesOfVersement(Request $request){

        $versement=$request->get('versement');

        if($versement!=null) {

            $varietes = Reception::select('varietes.id','varietes.name')
                ->leftjoin('varietes','varietes.id', '=', 'receptions.variete_id')
                ->where('versement', '=', $versement)
                ->get();
            return response()->json(['varietes'=>$varietes],200);
        }

    }

    public function restOfVersement(Request $request){
        // Rest= Reception - fabrication - Ecart
        $versement=$request->get('versement');
        $restOfVers=0;
        if($versement!=null) {

            $pds_recep = Reception::where('versement', '=', $versement)
                ->sum('pdsnet');
            $pds_fab = Colisage::where('versement', '=', $versement)
                ->sum('pdstotal');

//            $pds_ecart = Reception::sum('ecarts.pdsecart')
//                ->leftjoin('ecarts','ecarts.reception_id', '=', 'receptions.id')
//                ->where('versement', '=', $versement);

            $restOfVers=$pds_recep - $pds_fab;

        }
         return response()->json(['restOfVers'=>$restOfVers],200);
    }

    public function store(Request $request)
    {
        return $this->reception->create($request->all());
    }

    public function show(string $id)
    {
        return $this->reception->find($id);
    }

    public function update(Request $request, string $id)
    {
        $reception = $this->reception->find($id);
        $reception->update($request->all());
        return $reception;
    }

    public function destroy(string $id)
    {
        $reception= $this->reception->find($id);
        return $reception->delete();
    }
}
