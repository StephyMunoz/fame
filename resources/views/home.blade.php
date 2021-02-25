@extends('nav')

@section('title', 'Inreso datos')
    
@section('navigation')
    
   <h1>Concurso de adjudicación de contratos</h1>
   <form method="POST" action="{{route('ofertantes.store')}}">
    @csrf
   <div>
    <div class="row">
        
        <div class="col">
            <label name="codigoProyecto">Ingrese el código del proyecto:</label>
            <input name="codigoProyecto" placeholder="Nombre empresa">
        </div>
    </div>
    <div class="row">
        <div class="col">
            <label name="nombreEmpresa">Ingrese el nombre de la empresa solicitante:</label>
            <input name="nombreEmpresa" placeholder="Nombre empresa">
        </div>
    </div>
        <div class="row">
            <div class="col">
                <label name="rucEmpresa">Ingrese el RUC de la empresa solicitante</label>
                <input name="rucEmpresa" placeholder="Ingrese RUC de la empresa">
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label name="propuesta">Ingrese la propuesta:</label>
                <input name="propuesta" placeholder="Ingrese la propuesta">
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label name="plazoOferta">Ingrese el tiempo de entrega en meses:</label>
                <input name="plazoOferta" placeholder="Ingrese el tiempo de entrega">
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label name="vae">Ingrese VAE:</label>
                <input name="vae" placeholder="Ingrese el VAE">
            </div>
        </div>
   </div>
   <div>
       <button type="submit" >SIGUIENTE</button>
       <label name="hiddenLabel" hidden>0</label>
       <button >CALCULAR</button>
   </div>
</form>


















@endsection