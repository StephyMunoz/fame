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

        for($i=0;$i<3;$i++){
        
       
        Ofertante::create([
            
            'nombreEmpresa'=>$variable->nombreEmpresa[$i],
            'rucEmpresa'=>$variable->rucEmpresa[$i],
            'propuesta'=>$variable->propuesta[$i],
            'plazoOferta'=>$variable->plazoOferta[$i],
            'vae'=>$variable->vae[$i]

            ]);
   
        }
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
            for($j=0;$j<3;$j++){
                if($i==$j){
                    $totalScore[$j]=$priceScore[$j]+$timeProposal[$j];
                }
            }
            $totalScore[$i]=$priceScore[$i]+$timeScore[$i];
        }
        dd($totalScore);

        return redirect()->route('proposal.calculate');
       
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
    public function calculate(Request $request){
        return $variable = request();
        dd($proposal = $variable['propuesta']);
        $priceScore=[];
        
        for($i=0;$i<3;$i++){
            $aux=0;
            $aux2=0;
            if($aux < $proposal[$i]){
                $aux=$proposal[$i];
                $aux2=$i;
            }

            $priceScore[$i]=($proposal[$i] * 6)/$proposal[$aux2];
            //dd($priceScore[$i]);
        }
        //dd($priceScore[]);
        //return view('resultados');
    
    }
  
}