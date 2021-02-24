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
        $oferantate = Ofertante::get();
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
            'vae'=>$variable->vae

        ]);

       //$i=home::get('hiddenLabel');
       
       $v=[0,1];
    //    if($i<2){
    //        $i++;
    //     $viewV=view('home',$i);
    //    } else {
    //     return redirect()->route('resultados');
    //    }
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