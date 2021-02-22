@extends('nav')

@section('title', 'Registro')

@section('navigation')
    <h1>REGISTRO DE EMPRESA</h1>
    <div>
        <label>Ingrese el nombre de la empresa solicitante: </label>
        <input class="nombreEmpresa">
    </div>
    
    <div>
        <label>Ingrese el RUC de la empresa solicitante: </label>
        <input class="rucEmpresa">
    </div>
    <button type="submit">REGISTRAR EMPRESA</button>
@endsection