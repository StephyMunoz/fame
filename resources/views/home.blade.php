@extends('nav')

@section('title', 'Inreso datos')
    
@section('navigation')
    
   <h1>Concurso de adjudicación de contratos</h1>
   <form method="POST" action="{{route('home')}}">
    @csrf
   <div>
        <div class="row">
            <div >
                <label>Ingrese el RUC de la empresa solicitante</label>
                <input name="ruc" placeholder="Ingrese RUC de la empresa">
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label>Ingrese la propuesta:</label>
                <input name="propuesta" placeholder="Ingrese la propuesta">
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label>Ingrese el tiempo de entrega en meses:</label>
                <input name="tiempo" placeholder="Ingrese el tiempo de entrega">
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label>Ingrese VAE:</label>
                <input name="vae" placeholder="Ingrese el VAE">
            </div>
        </div>
   </div>
   <div>
       <button type="submit">ACEPTAR</button>
       <button>REGISTRAR EMPRESA</button>
   </div>
</form>
@endsection