<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Voto;
use App\Models\Partido;

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
        $votos = Voto::with('partido')->get();
        return view('votos.graph', [
            'votos' => $votos
        ]);
    }

    public function graficas()
    {
        $voto_1 = Voto::find(5);
        return view('votos.grafica',
            [
                'resultado' => $voto_1->con_letra
            ]
    
        );
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
            $existencia = Voto::where('id_partido', $id_partido)->get();

            if (count($existencia) >= 1){

                $message = 'Error: El voto para este partido o coalición ya existe.';

            }else{

                Voto::create([
                    'id_partido' => $id_partido,
                    'con_letra' => $con_letra,
                    'con_numero' => $con_numero,
                    'id_casilla' => $id_casilla
                ]);
    
                $message = 'Se agregó el voto exitosamente.';

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
}
