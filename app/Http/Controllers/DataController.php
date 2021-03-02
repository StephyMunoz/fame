<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ofertante;
use App\Models\Result;
use App\Models\Proyecto;
use Exception;
use App\Http\Requests\SaveOfertante;
use DB;

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

        dd($variable = request());
        $cod = DB::table('proyectos')->select('codigoProyecto')->orderBy('codigoProyecto', 'DESC')->take(1)->get();
        dd($number = $request->get('value'));

        foreach ($cod as $o) {
            $codigo = $o->codigoProyecto;
        }
        

        for($i=0;$i<3;$i++){
        
            
        Ofertante::create([
            
            'codigoProyecto'=>$codigo,
            'nombreEmpresa'=>$variable->nombreEmpresa[$i],
            'rucEmpresa'=>$variable->rucEmpresa[$i],
            'propuesta'=>$variable->propuesta[$i],
            'plazoOferta'=>$variable->plazoOferta[$i],
            'vae'=>$variable->vae[$i]

            ]);
   
        }
        $ruc=$variable['rucEmpresa'];
        $proposal = $variable['propuesta'];
        $timeProposal = $variable['plazoOferta'];
        $timeScore=[];
        $priceScore=[];
        $aux=0;
        $aux2=0;
        $pivot=$timeProposal[0];
        $pivotIndex=0;
        $totalScore=[];
        
        for($i=0;$i<3;$i++){
            
            if($aux < $proposal[$i]){
                $aux=$proposal[$i];
                $aux2=$i;
            } 
            if($pivot > $timeProposal[$i]){
                $pivot=$timeProposal[$i];
                $pivotIndex=$i;
            }
        }
        for($i=0;$i<3;$i++){
            $priceScore[$i]=($proposal[$i] * 6)/$proposal[$aux2];
            $timeScore[$i]=($timeProposal[$pivotIndex]*4)/$timeProposal[$i];
            $totalScore[$i]=$priceScore[$i]+$timeScore[$i];
        }

        for($i=0;$i<3;$i++){
        Result::create([
            'codigoProyecto'=>$codigo,
            'nombreEmpresa'=>$variable->nombreEmpresa[$i],
            'rucEmpresa'=>$variable->rucEmpresa[$i],
            'puntajePropuesta'=>$priceScore[$i],
            'puntajeTiempo'=>$timeScore[$i],
            'puntajeVae'=>$variable->vae[$i],
            'puntajeTotal'=>$totalScore[$i],
            'propuesta'=>$variable['propuesta'][$i],
            'tiempoPropuesta'=>$timeProposal[$i]
            ]);
   
        }
        $results = DB::table('resultados')->where('codigoProyecto', '=', $codigo)->get();;

        return view('resultados', compact('results'));
       
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
     *;
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
    public function update(Request $request)
    {
        $number = $request->get('value');
        return view('registro', compact('number'));
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