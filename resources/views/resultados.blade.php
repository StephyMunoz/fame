@extends('nav')

@section('title', 'Resultados')

@section('navigation')
    <table class="table">
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
            <tr>
                {{-- @foreach ($priceScore as $item)
                    <td>{{$item->}}</td>
                @endforeach --}}
            </tr>
        </tbody>
    </table>
@endsection