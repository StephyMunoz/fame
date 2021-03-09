<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SaveProyecto;
use App\Models\Proyecto;
use DB;

class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //se extrae en la variable la respuesta del formulario de la vista registro
        $variable = request();
        //se extrae el valor del numero de ofertantes seleccionado
        $number = $variable->get("value");
        $cod=$variable->codigoProyecto;
        //dd($cod);
        $var=DB::table('proyectos')->where('codigoProyecto', '=', $cod)->get();
        //dd($var);
        if($cod!=$var){
            //se crea en el modelo Proyecto que posteriormente guardara la tabla proyectos
        Proyecto::create([
                      
            'codigoProyecto'=>$variable->codigoProyecto,
            'nombreProyecto'=>$variable->nombreProyecto,
            'descripcionProyecto'=>$variable->descripcionProyecto

        ]);
        } 

        
        //se retorna a la vista home justo con el numero previamente extraido
        return view('home', compact('number'));
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
