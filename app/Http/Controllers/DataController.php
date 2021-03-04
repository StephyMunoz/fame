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
        //se toma la respuesta del formulario contenido en la vista home
        $variable = request();
        //se obtiene el valor extraido del controlador ProyectoController y pasado a la vista home
        $number = $variable->get("number");
        $codigo;

        //se realiza una consulta a la tabla proyecto para extraer el codigo del proyecto y se toma el ultimo valor guardadp
        $cod = DB::table('proyectos')->select('codigoProyecto')->orderBy('created_at', 'DESC')->take(1)->get();

        //se extrae el valor de la consulta anterior
        foreach ($cod as $o) {
            $codigo = $o->codigoProyecto;
        }
        

        //con la variable extraida previamente se guarda en la tabla ofertantes lo devuelto por el request
        for($i=0;$i<$number;$i++){
       
        Ofertante::create([
            'codigoProyecto'=>$codigo,
            'nombreEmpresa'=>$variable->nombreEmpresa[$i],
            'rucEmpresa'=>$variable->rucEmpresa[$i],
            'propuesta'=>$variable->propuesta[$i],
            'plazoOferta'=>$variable->plazoOferta[$i],
            'vae'=>$variable->vae[$i]

            ]);
   
        }
        //se definen diferentes variables que ayudaran a los calculos de los resultados del concurso
        $proposal = $variable['propuesta'];
        $timeProposal = $variable['plazoOferta'];
        $nameProp=$variable['nombreEmpresa'];
        $timeScore=[];
        $priceScore=[];
        $aux=0;
        $aux2=0;
        $pivot=$timeProposal[0];
        $pivotIndex=0;
        $totalScore=[];
        $winner=null;
        
        for($i=0;$i<$number;$i++){
            
            //se define cual es la mejor propuesta de los ofertantes
            if($aux < $proposal[$i]){
                $aux=$proposal[$i];
                $aux2=$i;
            } 
            //se define cual es el menor tiempo de entrega propuesto por los ofertantes
            if($pivot > $timeProposal[$i]){
                $pivot=$timeProposal[$i];
                $pivotIndex=$i;
            }
        }
        //se realiza regla de tres y regla de tres inversa para obtener los puntajes de los anteriores campos
        //se realiza la suma del puntaje total de cada ofertante
        for($i=0;$i<$number;$i++){
            $win=0;
            $priceScore[$i]=($proposal[$i] * 6)/$proposal[$aux2];
            $timeScore[$i]=($timeProposal[$pivotIndex]*4)/$timeProposal[$i];
            $totalScore[$i]=$priceScore[$i]+$timeScore[$i];
            if($win<$totalScore[$i]){
                $win=$totalScore[$i];
                $winner=$nameProp[$i];
            }
        }
       
        //se guarda en la table resultados los valores obtenidos antes
        //ademas se incluyen el codigo del proyecto consultado previamente
        //y el nombre y ruc de la empresa en esta tabla
        for($i=0;$i<$number;$i++){
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
        
        //se extraen los valores de la tabla resultados
        $results = DB::table('resultados')->where('codigoProyecto', '=', $codigo)->get();;
        //dd($winner);
        //se retornan estos resultados a la vista resultados
        return view('resultados', compact('results', 'winner'));
       
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