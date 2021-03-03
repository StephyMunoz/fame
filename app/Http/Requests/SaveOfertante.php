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
        //se definen que campos de la tabla de ofertantes seran requeridos, en este caso todos los campos lo son
        return [
            'codigoProyecto'=>'required',
            'nombreEmpresa' =>'required',
            'rucEmpresa'=>'required',
            'propuesta'=>'required',
            'plazoOfertado'=>'required',
            'vae'=>'required',

        ];
    }
}
