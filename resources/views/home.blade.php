@extends('nav')

@section('title', 'Inreso datos')
    
@section('navigation')
    
   <h3>Concurso de adjudicación de contratos</h3>
   <form method="POST" action="{{route('ofertantes.store')}}">
    @csrf
    

    <!-- <label name="codigoProyecto" class="form-label">Ingrese el codigo del concurso</label>
    <input name="codigoProyecto_id" placerholder="Ingrese codigo del concurso" value="concurso1"> -->
    
   <table class="table">
        <thead>
            <tr>
                <th scope="col">
                    <label name="nombreEmpresa" class="form-label" >Empresa solicitante</label>
                </th>
                <th scope="col">
                    <label name="rucEmpresa" class="form-label" >RUC empresa solicitante</label>
                </th>
                <th scope="col">
                    <label name="propuesta" class="form-label" >Propuesta</label>
                </th>
                <th scope="col">
                    <label name="plazoOferta" class="form-label" >Tiempo de entrega(meses)</label>
                </td>
                <th scope="col">
                    <label name="vae" class="form-label">Ingrese VAE</label>
                </th>
            </tr>
        </thead>
        <br>
        <tbody >
            <tr >
            <?php $x = 1; for($x; $x <= 3; $x++): ?>
            
                <td>
                    <input name="nombreEmpresa[]" placeholder="Nombre empresa" class="form-control form-control-sm" >
                </td>
                <td>
                    <input name="rucEmpresa[]" placeholder="Ingrese RUC de la empresa" class="form-control form-control-sm" >
                </td>
                <td>
                    <input name="propuesta[]" placeholder="Ingrese la propuesta" class="form-control form-control-sm" >
                </td>
                <td>
                    <input name="plazoOferta[]" placeholder="Ingrese el tiempo de entrega" class="form-control form-control-sm">
                </td>
                <td>
                    <input name="vae[]" placeholder="Ingrese el VAE"class="form-control form-control-sm" value="" >
                </td>
            </tr>
            <br>
            <?php endfor; ?>
           
        </tbody>
    </table>
        <br>
        <button class="btn btn-primary p-2" type="submit" >CALCULAR</button>
    </form>



@endsection
