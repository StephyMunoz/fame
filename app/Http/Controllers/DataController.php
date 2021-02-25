<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ofertante;
use Exception;
use App\Http\Requests\SaveOfertante;


class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$oferantate = Ofertante::get();
        
        //return view('resultados.index')->with('propuesta', $resultados);
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
        $variable = request();
       
        Ofertante::create([
            
            
            'codigoProyecto'=>$variable->codigoProyecto,
            'nombreEmpresa'=>$variable->nombreEmpresa,
            'rucEmpresa'=>$variable->rucEmpresa,
            'propuesta'=>$variable->propuesta,
            'plazoOferta'=>$variable->plazoOferta,
            'vae'=>$variable->vae,

            'nombreEmpresa'=>$variable->nombreEmpresa1,
            'rucEmpresa'=>$variable->rucEmpresa1,
            'propuesta'=>$variable->propuesta1,
            'plazoOferta'=>$variable->plazoOferta1,
            'vae'=>$variable->vae1,
             
            'nombreEmpresa'=>$variable->nombreEmpresa2,
            'rucEmpresa'=>$variable->rucEmpresa2,
            'propuesta'=>$variable->propuesta2,
            'plazoOferta'=>$variable->plazoOferta2,
            'vae'=>$variable->vae2

        ]);

       //$i=home::get('hiddenLabel');
       
    //    $v=[0,1];
       
    //    $i=0;
    //    if($i<2){
    //         $var = redirect()->route('home');
    //         $i++;
    //    } else {
    //     return redirect()->route('resultados');
    //    }
    //    return $var;
       //return $viewV;
       //return $i;
       //return redirect()->route('resultados');

        //return redirect()->route('home');
        //return redirect()->route('home');
        //return redirect()->route('resultados');
        // for($i=0;$i<=$v.length;$i++){
        //     return redirect()->route('home');
        // }
        return redirect()->route('resultados');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        dd($resultados = Ofertante::all());
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
    public function hello(){
        return redirect()->route('home');
        //return "hola";
    }
  
}