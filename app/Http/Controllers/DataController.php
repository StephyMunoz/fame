<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ofertante;
use App\Models\Result;
use App\Models\Proyecto;
use Exception;
use App\Http\Requests\SaveOfertante;
use DB;
use Illuminate\Support\Facades\Log;


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
        //variables necesitadas en la ejecucion del codigo
        $codigo;
        $win=0;
        //respuesta del vae si o no
        $response = $variable['status'];
        //vector auxiliar
        $nameEmp=$variable['nombreEmpresa'];
        $proposal = $variable['propuesta'];
        $propAux=[];
        $auxVec=[];
        //dd($response);
        for($i=0;$i<$number;$i++){
            if($response[$i] == 'NO'){
                $propAux[$i]=$proposal[$i];
                $auxVec[$i]=1;
                
            } else {
                $auxVec[$i]=0;
            }
        }
       
        
        // //se realiza una consulta a la tabla proyecto para extraer el codigo del proyecto y se toma el ultimo valor guardadp
        $cod = DB::table('proyectos')->select('codigoProyecto')->orderBy('created_at', 'DESC')->take(1)->get();

        //se extrae el valor de la consulta anterior
        foreach ($cod as $o) {
            $codigo = $o->codigoProyecto;
        }
        

        // //con la variable extraida previamente se guarda en la tabla ofertantes lo devuelto por el request
        for($i=0;$i<$number;$i++){
       
        Ofertante::create([
            'codigoProyecto'=>$codigo,
            'nombreEmpresa'=>$variable->nombreEmpresa[$i],
            'rucEmpresa'=>$variable->rucEmpresa[$i],
            'propuesta'=>$variable->propuesta[$i],
            'plazoOferta'=>$variable->plazoOferta[$i],
            'vae'=>$variable->status[$i]
            

            ]);
   
           
        }
        return view('vae', compact('auxVec','number', 'codigo', 'nameEmp','propAux'));
        // //se definen diferentes variables que ayudaran a los calculos de los resultados del concurso
        // $proposal = $variable['propuesta'];
        // $timeProposal = $variable['plazoOferta'];
        // $nameProp=$variable['nombreEmpresa'];
        // $vaeProposal=$variable['vae'];
        // $timeScore=[];
        // $priceScore=[];
        // $aux=$proposal[0];
        // $aux2=0;
        // $pivot=$timeProposal[0];
        // $pivotIndex=0;
        // $subtotalScore=[];
        // $winner=null;
        // $vaeScore=[];
        // $auxVae = 0;
        // $auxVaeIndex = 0;
        // $totalScoreOverEleven=[];
        // $totalScore=[];
        
        // for($i=0;$i<$number;$i++){
            
        //     //se define cual es la mejor propuesta de los ofertantes
        //     if($aux > $proposal[$i]){
        //         $aux=$proposal[$i];
        //         $aux2=$i;
        //     } 
        //     //se define cual es el menor tiempo de entrega propuesto por los ofertantes
        //     if($pivot > $timeProposal[$i]){
        //         $pivot=$timeProposal[$i];
        //         $pivotIndex=$i;
        //     }
        //     //se busca el ofertante con mas vae
        //     if($auxVae < $vaeProposal[$i]){
        //         $auxVae=$vaeProposal[$i];
        //         $auxVaeIndex=$i;
        //     }
        // }
        
        // //se realiza regla de tres y regla de tres inversa para obtener los puntajes de los anteriores campos
        // //se realiza la suma del puntaje total de cada ofertante
        
        // for($i=0;$i<$number;$i++){
            
        //     $priceScore[$i]=($proposal[$aux2] * 6)/$proposal[$i];
        //     $timeScore[$i]=($timeProposal[$pivotIndex]*4)/$timeProposal[$i];
        //     $subtotalScore[$i]=$priceScore[$i]+$timeScore[$i];
            
        //     //se busca el ofertante con el mayor puntaje
        //     if($win<$totalScore[$i]){
        //         $win=$totalScore[$i];
        //         $winner=$nameProp[$i];
        //     }
        //     //se define 1 punto para el ofertante con mas vae, 0 para el resto de ofertantes
        //     if($auxVaeIndex==$i){
        //         $vaeScore[$i]=1;
        //     } else {
        //         $vaeScore[$i]=0;
        //     }
        //     dd($vaeScore);
        // }
        

        // for($i=0;$i<$number;$i++){
        //     $totalScoreOverEleven[$i]=$subtotalScore[$i]+$vaeScore[$i];
        //     $totalScore[$i]=($totalScoreOverEleven[$i]*10)/11;
            
        // }
        // dd($totalScoreOverEleven);

        // //se guarda en la table resultados los valores obtenidos antes
        // //ademas se incluyen el codigo del proyecto consultado previamente
        // //y el nombre y ruc de la empresa en esta tabla
        // for($i=0;$i<$number;$i++){
        //     Result::create([
        //         'codigoProyecto'=>$codigo,
        //         'nombreEmpresa'=>$variable->nombreEmpresa[$i],
        //         'rucEmpresa'=>$variable->rucEmpresa[$i],
        //         'puntajePropuesta'=>$priceScore[$i],
        //         'puntajeTiempo'=>$timeScore[$i],
        //         'vae'=>$variable->vae[$i],
        //         'subtotal'=>$subtotalScore[$i],
        //         'propuesta'=>$variable['propuesta'][$i],
        //         'tiempoPropuesta'=>$timeProposal[$i],
        //         'puntajeVAE'=>$vaeScore[$i],
        //         'puntajeSumado'=>$totalScoreOverEleven[$i],
        //         'puntajeTotal'=>$totalScore[$i]
        //         ]);
       
        //     }
        
        // //se extraen los valores de la tabla resultados
        // $results = DB::table('resultados')->where('codigoProyecto', '=', $codigo)->get();;
        // //dd($winner);
        // //se retornan estos resultados a la vista resultados
        // return view('resultados', compact('results', 'winner'));
       
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
    public function update(Request $request)
    {
        $variable=request();
        $import=$variable['valorImportar'];
        $export=$variable['valorExtranjero'];
        $sumImports=[];
        //dd($export);
        //se definen diferentes variables que ayudaran a los calculos de los resultados del concurso
        $proposal = [];
        $timeProposal = [];
        $name=[];
        $vae=[];
        $timeScore=[];
        $priceScore=[];
        
        $subtotalScore=[];
        $winner=null;
        $vaeScore=[];
        $auxVae = 0;
        $auxVaeIndex = 0;
        $totalScoreOverEleven=[];
        $totalScore=[];
        $ruc=[];
        $win=0;

        $codigo=$variable->get("codigo");
        $number = $variable->get("number");


        $offerents = DB::table('ofertantes')->where('codigoProyecto', '=', $codigo)->get();
        $vaeValue=[];
        
        
        $name=[];
        //dd($codigo);
        for($i=0;$i<$number;$i++){
            $name[$i]=$offerents[$i]->nombreEmpresa;
            $ruc[$i]=$offerents[$i]->rucEmpresa;
            $proposal[$i]=$offerents[$i]->propuesta;
            $timeProposal[$i]=$offerents[$i]->plazoOferta;
            $vae[$i]=$offerents[$i]->vae;
            //DB::insert('insert into ofertantes (importacion, extranjero) values (?, ?)', [1, 'Dayle']);
        }
        //dd($name);
        $aux=$proposal[0];
        $aux2=0;
        $pivot=$timeProposal[0];
        $pivotIndex=0;
        
        for($i=0;$i<$number;$i++){
            
            //se define cual es la mejor propuesta de los ofertantes
            if($aux > $proposal[$i]){
                $aux=$proposal[$i];
                $aux2=$i;
            } 
            //se define cual es el menor tiempo de entrega propuesto por los ofertantes
            if($pivot > $timeProposal[$i]){
                $pivot=$timeProposal[$i];
                $pivotIndex=$i;
            }
            
            $sumImports[$i]=$import[$i]+$export[$i];
        }
        //dd($sumImports);
        //dd($sumImports);
        //se realiza regla de tres y regla de tres inversa para obtener los puntajes de los anteriores campos
        //se realiza la suma del puntaje total de cada ofertante
        $auxVae=0;
        $pivotVae=0;
        $extraPoint=[];
        
        for($i=0;$i<$number;$i++){
            
            $priceScore[$i]=($proposal[$aux2] * 6)/$proposal[$i];
            $timeScore[$i]=($timeProposal[$pivotIndex]*4)/$timeProposal[$i];
            $subtotalScore[$i]=$priceScore[$i]+$timeScore[$i];

            if($sumImports[$i]==0){
                $vaeValue[$i]=0;
            } else {
                $vaeValue[$i]=100-(($sumImports[$i]*100)/$proposal[$i]);
            }
            if($pivotVae<$vaeValue[$i]){
                $pivotVae=$vaeValue[$i];
                $auxVae=$i;
            }
            
            //se busca el ofertante con el mayor puntaje
            // if($win<$totalScore[$i]){
            //     $win=$totalScore[$i];
            //     $winner=$name[$i];
            // }
            
            
        }
        
        for($i=0;$i<$number;$i++){
            if($auxVae==$i && $sumImports[$i]!=0){
                $extraPoint[$i]=1;
            } else {
                $extraPoint[$i]=0;
            }
            //$totalScoreOverEleven[$i]=$subtotalScore[$i]+$extraPoint[$i];
            
        }
        for($i=0;$i<$number;$i++){
            
            $totalScoreOverEleven[$i]=$subtotalScore[$i]+$extraPoint[$i];
            $totalScore[$i]=($totalScoreOverEleven[$i]*10)/11;
            
        }

       // dd($totalScore);
        
        //dd($vaeValue);

        // for($i=0;$i<$number;$i++){
        //     $totalScoreOverEleven[$i]=$subtotalScore[$i]+$vaeScore[$i];
        //     $totalScore[$i]=($totalScoreOverEleven[$i]*10)/11;
            
        // }
        // dd($totalScoreOverEleven);

        //se guarda en la table resultados los valores obtenidos antes
        //ademas se incluyen el codigo del proyecto consultado previamente
        //y el nombre y ruc de la empresa en esta tabla
        for($i=0;$i<$number;$i++){
            Result::create([
                'codigoProyecto'=>$codigo,
                'nombreEmpresa'=>$name[$i],
                'rucEmpresa'=>$ruc[$i],
                'puntajePropuesta'=>$priceScore[$i],
                'puntajeTiempo'=>$timeScore[$i],
                'vae'=>$vaeValue[$i],
                'subtotal'=>$subtotalScore[$i],
                'propuesta'=>$proposal[$i],
                'tiempoPropuesta'=>$timeProposal[$i],
                'puntajeVAE'=>$extraPoint[$i],
                'puntajeSumado'=>$totalScoreOverEleven[$i],
                'puntajeTotal'=>$totalScore[$i]
                ]);
       
            }
        
        // //se extraen los valores de la tabla resultados
        $results = DB::table('resultados')->where('codigoProyecto', '=', $codigo)->get();
        //dd($winner);
        //se retornan estos resultados a la vista resultados
        return view('resultados', compact('results', ));

        //return view('registro');
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