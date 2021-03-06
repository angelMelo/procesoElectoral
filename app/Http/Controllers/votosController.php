<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Voto;
use App\Models\Partido;
use App\Models\Candidato;
use App\Models\Casilla;
use App\Models\Proceso;

class votosController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$votos = Voto::with('partido')->get();
        $votos = Voto::join("partidos",
                            "partidos.id_partido","=","votos.id_partido"
                        )->groupBy('votos.id_partido'
                        )->selectRaw('ifnull(sum(votos.con_numero),0) as suma, partidos.nombre as nombre'
                        )->get();

        $votos_candidatos = Candidato::join("partidos", 
                    "partidos.id_candidato","=","candidatos.id_candidato"
                    )->leftjoin(
                        "votos", "votos.id_partido", "=", "partidos.id_partido"
                    )->groupBy('candidatos.id_candidato'
                    )->selectRaw('ifnull(sum(votos.con_numero),0) as suma, candidatos.nombre as nombre'
                    )->get();
        return view('votos.graph', [
            'votos' => $votos,
            'candidatos' => $votos_candidatos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('votos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            
            $id_partido = $request->get('id_partido');
            $con_letra = $request->get('con_letra');
            $con_numero = $request->get('con_numero');
            $id_casilla = $request->get('id_casilla');
            $existencia = Voto::where('id_partido', $id_partido)->where('id_casilla', $id_casilla)->get();

            if( empty($id_partido) ){

                $message = 'Error: No seleccionaste ning??n partido.';

            }else{

                if (count($existencia) >= 1){

                    $message = 'Error: El voto para este partido o coalici??n ya existe.';
    
                }else{
    
                    Voto::create([
                        'id_partido' => $id_partido,
                        'con_letra' => $con_letra,
                        'con_numero' => $con_numero,
                        'id_casilla' => $id_casilla
                    ]);
        
                    $message = 'Se agreg?? el voto exitosamente.';
    
                }

            }

        }catch (\Illuminate\Database\QueryException $e){

            $message = 'Error: Imposible de insertar.';
        }    

        return redirect()->route('casillas.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    //new functions

    public function graficas()
    {
        $voto_1 = Voto::find(5);
        return view('votos.grafica',
            [
                'resultado' => $voto_1->con_letra
            ]
    
        );
    }

    public function ajaxgraphdata()
    {
        $votos = Voto::join("partidos",
                            "partidos.id_partido","=","votos.id_partido"
                        )->groupBy('votos.id_partido'
                        )->selectRaw('ifnull(sum(votos.con_numero),0) as suma, partidos.nombre as nombre'
                        )->get();

        $votos_candidatos = Candidato::join("partidos", 
                    "partidos.id_candidato","=","candidatos.id_candidato"
                    )->leftjoin(
                        "votos", "votos.id_partido", "=", "partidos.id_partido"
                    )->groupBy('candidatos.id_candidato'
                    )->selectRaw('ifnull(sum(votos.con_numero),0) as suma, candidatos.nombre as nombre'
                    )->get();
        return response()->json([
            'votos' => $votos,
            'candidatos' => $votos_candidatos
        ]);
    }

    public function impugnar()
    {
        $idProceso= Auth::user()->id_proceso;
        $result = Proceso::find($idProceso);
        $hora_apertura = $result->hora_apertura;
        $casillas = Casilla::where('id_proceso', $idProceso)
                            ->whereTime('hora_apertura', '>=', $hora_apertura )
                            ->latest('id_casilla')
                            ->paginate(6);

        return view('votos.impugnar', [
            'casillas' => $casillas
        ]);
    }
}
