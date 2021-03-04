@extends('nav')

@section('title', 'Resultados')

@section('navigation')
    <table class="table table-bordered">
        <thead>
            <tr>
                <td>Ofertantes</td>
                <td>Precio Ofertado</td>
                <td>Puntaje precio (6)</td>
                <td>Plazo ofertado</td>
                <td>Puntaje plazo (4)</td>
                <td>Puntaje total (/10 puntos)</td>
                <td>Valor VAE %</td>
                <td>Calificación (/10 puntos)</td>
                <td>Puntaje adicional VAE</td>
                <td>Total puntaje</td>
                <td>Ponderación (/10 puntos)</td>
            </tr>
        </thead>
        <tbody>
            
            @foreach ($results as $item)
            <tr>
                    <td >{{$item->nombreEmpresa}}</td>
                    <td >{{$item->propuesta}}</td>
                    <td >{{$item->puntajePropuesta}}</td>
                    <td >{{$item->tiempoPropuesta}}</td>
                    <td >{{$item->puntajeTiempo}}</td>
                    <td >{{$item->puntajeTotal}}</td>
                    <td >{{$item->puntajeVAE}}</td>
            </tr>
                @endforeach
             

        </tbody>
    </table>

    <h5>La empresa ganadora es: {{$winner}}</h5>

@endsection