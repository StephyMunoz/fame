<!doctype html>
<html lang="es">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Reporte PDF</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style>
        @page {
            size: "A4";
            margin: 3.5cm 1.5cm 3.5cm 1.5cm;
        }
        body {
            width: 100% !important;
            height: 100%;
            background: #fff;
            color: black;
            font-size: 100%;
            font-family: 'Roboto', sans-serif;
            line-height: 1.65;
            -webkit-font-smoothing: antialiased;
            -webkit-text-size-adjust: none;
            text-orientation: mixed;
            text-align: justify;
            margin-right: 100px;
        }
        #logo{
        /* float:initial; */
        width: 300px;
        height: 150px;
        position: relative;
    }
    </style>
</head>
<body>
    <form  id="results" method="post" action="{{route('export.printToPdf')}}" >
        
        @csrf
        <img src="../public/images/FAME.jpg" id='logo'> 
        <h4>Proceso:  {{$codigo}}</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td><strong>Oferente</strong></td>
                    <td><strong>Precio</strong></td>
                    <td><strong>Puntaje precio (6)</strong></td>
                    <td><strong>Plazo</strong></td>
                    <td><strong>Puntaje plazo (4)</strong></td>
                    <td><strong>Puntaje total (/10 puntos)</strong></td>
                    <td><strong>Valor VAE %</strong></td>
                    <td><strong>Puntaje adicional VAE</strong></td>
                    <td><strong>Total puntaje (/11 punots)</strong></td>
                    <td><strong>Ponderación (/10 puntos)</strong></td>
                </tr>
            </thead>
            <tbody>
                
                @foreach ($results as $item)   
                @if($item->vae != 0)
                <tr>
                        <td >{{$item->nombreEmpresa}}</td>
                        <td >{{$item->propuesta}}</td>
                        <td >{{$item->puntajePropuesta}}</td>
                        <td >{{$item->tiempoPropuesta}}</td>
                        <td >{{$item->puntajeTiempo}}</td>
                        <td >{{$item->subtotal}}</td>
                        <td >{{$item->vae}}</td>
                        <td >{{$item->puntajeVAE}}</td>
                        <td >{{$item->puntajeSumado}}</td>
                        <td >{{$item->puntajeTotal}}</td>
                        
                </tr>
                @else
                 <tr>
                    <td >{{$item->nombreEmpresa}}</td>
                    <td >{{$item->propuesta}}</td>
                    <td >{{$item->puntajePropuesta}}</td>
                    <td >{{$item->tiempoPropuesta}}</td>
                    <td >{{$item->puntajeTiempo}}</td>
                    <td >{{$item->subtotal}}</td>
                </tr>
                @endif
                    @endforeach   
            </tbody>
        </table>
    </form>
</body>
</html>
