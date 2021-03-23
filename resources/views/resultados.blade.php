@extends('nav')

@section('title', 'Resultados')

@section('navigation')
<form  id="results" method="post" action="{{route('export.printToPdf')}}" >
    @csrf
    <table class="table table-bordered">
        <thead>
            <tr>
                <td><strong>Oferente</strong></td>
                <td><strong>Precio</strong></td>
                <td><strong>Puntaje precio (6)</strong></td>
                <td><strong>Plazo</strong></td>
                <td><strong>Puntaje plazo (4)</strong></td>
                <td><strong>Puntaje total (/10 puntos)</strong></td>
                <td><strong>VAE %</strong></td>
                <td><strong>Puntaje adicional</strong></td>
                <td><strong>Total puntaje (/11)</strong></td>
                <td><strong>Ponderación (/10 puntos)</strong></td>
            </tr>
        </thead>
        <tbody>
            
            @foreach ($results as $item)
            @if($item->vae != 0)
            <tr>
                    <td >{{$item->nombreEmpresa}}</td>
                    <input type="hidden" value={{$item->nombreEmpresa}} name=nombreEmpresa[]>
                    <td >{{$item->propuesta}}</td>
                    <input type="hidden" value={{$item->propuesta}} name=propuesta[]>
                    <td >{{$item->puntajePropuesta}}</td>
                    <input type="hidden" value={{$item->puntajePropuesta}} name=puntajePropuesta[]>
                    <td >{{$item->tiempoPropuesta}}</td>
                    <input type="hidden" value={{$item->tiempoPropuesta}} name=tiempoPropuesta[]>
                    <td >{{$item->puntajeTiempo}}</td>
                    <input type="hidden" value={{$item->puntajeTiempo}} name=puntajeTiempo[]>
                    <td >{{$item->subtotal}}</td>
                    <input type="hidden" value={{$item->subtotal}} name=subtotal[]>
                    <td >{{$item->vae}}</td>
                    <input type="hidden" value={{$item->vae}} name=vae[]>
                    <td >{{$item->puntajeVAE}}</td>
                    <input type="hidden" value={{$item->puntajeVAE}} name=puntajeVAE[]>
                    <td >{{$item->puntajeSumado}}</td>
                    <input type="hidden" value={{$item->puntajeSumado}} name=puntajeSumado[]>
                    <td >{{$item->puntajeTotal}}</td>
                    <input type="hidden" value={{$item->puntajeTotal}} name=puntajeTotal[]>
                    
            </tr>
            @endif
                @endforeach
                <input type="hidden" value={{$codigo}} name="codigo">

        </tbody>
    </table>

    <button type="submit" class="btn btn-danger" ><a class="nav-link"  onclick="pfd()" style="color: white">
        Exportar en PDF<i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
    </button>
</form>
    <script>
        function pfd() {
            var inputFormato = document.getElementById("formato");
            inputFormato.value = "PDF";
        }
         
    </script>
@endsection
