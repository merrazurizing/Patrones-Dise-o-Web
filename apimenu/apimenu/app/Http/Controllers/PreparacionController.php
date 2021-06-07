<?php

namespace App\Http\Controllers;
use App\Models\Preparacion;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PreparacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  response()->json(['status'=>'ok','data'=>Preparacion::all()],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!$request->input('nombre') || !$request->input('categoria') || !$request->input('estado'))
		{
			// NO estamos recibiendo los campos necesarios. Devolvemos error.
			return response()->json(['errors'=>array(['code'=>422,'message'=>'Faltan datos necesarios para procesar la solicitud.'])],422);
		}

		// Insertamos los datos recibidos en la tabla.
		$nuevaPreparacion=Preparacion::create($request->all());
       
        return response()->json(['status'=>'ok','data'=>$nuevaPreparacion],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $preparacion=Preparacion::find($id);

		// Chequeamos si encontró o no el Preparacion
		if (! $preparacion)
		{
			// Se devuelve un array errors con los errores detectados y código 404
			return response()->json(['errors'=>Array(['code'=>404,'message'=>'No se encuentra una Preparacion con ese código.'])],404);
		}

		// Devolvemos la información encontrada.
		return response()->json(['status'=>'ok','data'=>$preparacion],200);
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
        $preparacion=Preparacion::find($id);
        if (! $preparacion)
		{
			// Se devuelve un array errors con los errores detectados y código 404
			return response()->json(['errors'=>Array(['code'=>404,'message'=>'No se encuentra una Preparacion con ese código.'])],404);
        }
        $preparacion->update($request->all());
        return response()->json(['status'=>'ok','data'=>$preparacion],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 
        $preparacion=Preparacion::find($id);
        if (! $preparacion)
		{
			// Se devuelve un array errors con los errores detectados y código 404
			return response()->json(['errors'=>Array(['code'=>404,'message'=>'No se encuentra una Preparacion con ese código.'])],404);
        }
        $preparacion->delete();
        return response()->json(['status'=>'ok','data'=>$id." Eliminado"],200);
    }
}
