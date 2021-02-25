<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class SaveOfertante extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'codigoProyecto'=>'no required',
            'nombreEmpresa' =>'no required',
            'rucEmpresa'=>'no required',
            'propuesta'=>'no required',
            'plazoOfertado'=>'no required',
            'vae'=>'no required',

            'nombreEmpresa1' =>'no required',
            'rucEmpresa1'=>'no required',
            'propuesta1'=>'no required',
            'plazoOfertado1'=>'no required',
            'vae1'=>'no required',
            
            'nombreEmpresa2' =>'no required',
            'rucEmpresa2'=>'no required',
            'propuesta2'=>'no required',
            'plazoOfertado2'=>'no required',
            'vae2'=>'no required'
        ];
    }
}
