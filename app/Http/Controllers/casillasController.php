<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Casilla;
use App\Models\Partido;
use App\Models\Voto;

class casillasController extends Controller
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
        $idProceso= Auth::user()->id_proceso;
        $tipoUsuario= Auth::user()->tipo_usuario;
        $casillas = Casilla::where('id_proceso', $idProceso)->latest('id_casilla')->paginate(3);
        return view('casillas.casillas', [
            'idProceso' => $idProceso,
            'tipoUsuario' => $tipoUsuario,
            'casillas' => $casillas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('casillas.create');
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
            $id_proceso = Auth::user()->id_proceso;
            $num_casilla = $request->get('num_casilla');
            $entidad = $request->get('entidad');
            $distrito = $request->get('distrito');
            $seccion = $request->get('seccion');
            $lugar = $request->get('lugar');
            $tipo = $request->get('tipo');
            $boletas = $request->get('boletas');
            $hora_apertura = $request->get('hora_apertura');
            $fecha_apertura = date("Y-m-d H:i:s");
            $existencia = Casilla::where('num_casilla', $num_casilla)->get();

            if (count($existencia) >= 1){

                $message = 'Error: La casilla seleccionada ya existe.';

            }else{

                Casilla::create([
                    'num_casilla' => $num_casilla,
                    'entidad' => $entidad,
                    'distrito' => $distrito,
                    'seccion' => $seccion,
                    'lugar' => $lugar,
                    'tipo' => $tipo,
                    'boletas' => $boletas,
                    'hora_apertura' => $hora_apertura,
                    'fecha_apertura' => $fecha_apertura,
                    'id_proceso' => $id_proceso
                ]);
    
                $message = 'Se agregó la casilla exitosamente.';

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
    public function show($id_casilla)
    {
        $casillas = Casilla::findOrFail($id_casilla); 
        $partidos = Partido::get();
        $votos = Voto::with('partido')->where('id_casilla', $id_casilla)->get();

        return view('casillas.show', [
            'casillas' => $casillas,
            'partidos' => $partidos,
            'votos' => $votos
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($casillas)
    {
        $result = Casilla::findOrFail($casillas); 
        $num_casilla = $result->num_casilla;
        $entidad = $result->entidad;
        $distrito = $result->distrito;
        $seccion = $result->seccion;
        $lugar = $result->lugar;
        $tipo = $result->tipo;
        $boletas = $result->boletas;
        $hora_apertura = $result->hora_apertura;
        $fecha_apertura = $result->fecha_apertura;
        $hora_cierre = $result->hora_cierre;

        return view('casillas.edit', [
            'result' => $result,
            'num_casilla' => $num_casilla,
            'entidad' => $entidad,
            'distrito' => $distrito,
            'seccion' => $seccion,
            'lugar' => $lugar,
            'tipo' => $tipo,
            'boletas' => $boletas,
            'hora_apertura' => $hora_apertura,
            'fecha_apertura' => $fecha_apertura
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $result)
    {
        try {
            $hora_cierre = $request->get('hora_cierre');
            $fecha_cierre = date("Y-m-d H:i:s");

            Casilla::where('id_casilla', $result)->update([
                'hora_cierre' => $hora_cierre,
                'fecha_cierre' => $fecha_cierre

            ]);

            $message = 'Registro actualizado exitosamente.';
        } catch (\Illuminate\Database\QueryException $e) {
            $message = 'Error: imposible de actualizar.';
        }

        return redirect()->route('casillas.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($casillas)
    {
        try {
            Casilla::destroy($casillas);
            $message = 'Registro de casilla eliminado exitosamente.';
        } catch (\Illuminate\Database\QueryException $e) {
            $message = 'Error: imposible de eliminar.';
        }

        return redirect()->route('casillas.index')->with('message', $message);
    }
}
