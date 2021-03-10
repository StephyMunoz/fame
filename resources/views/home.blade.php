@extends('nav')

@section('title', 'Inreso datos')
    
@section('navigation')
    
   
   <form method="POST" action="{{route('ofertantes.store')}}" >
    @csrf
    
   <table class="table table-sm table-bordered table-responsive mt-0" >
    <h3>Concurso de adjudicación de contratos</h3>
        <thead>
            <tr>
                <th>
                    <label name="nombreEmpresa" class="form-label" >Empresa solicitante</label>
                </th>
                <th>
                    <label name="rucEmpresa" class="form-label" >RUC empresa solicitante</label>
                </th>
                <th>
                    <label name="propuesta" class="form-label" >Propuesta</label>
                </th>
                <th>
                    <label name="plazoOferta" class="form-label" >Tiempo de entrega(meses)</label>
                </td>
                <th>
                    <label name="vae" class="form-label">Ingrese VAE</label>
                </th>
            </tr>
        </thead>
        <br>
        <tbody >
            <tr >
            <?php $x = 1; for($x; $x <= $number; $x++): ?>
            
                <td>
                    <input name="nombreEmpresa[]" placeholder="Nombre empresa" class="form-control form-control-sm" required>
                </td>
                <td>
                    <input name="rucEmpresa[]" placeholder="Ingrese RUC de la empresa" class="form-control form-control-sm" required>
                </td>
                <td>
                    <input name="propuesta[]" placeholder="Ingrese la propuesta" class="form-control form-control-sm" required>
                </td>
                <td>
                    <input name="plazoOferta[]" placeholder="Ingrese el tiempo de entrega" class="form-control form-control-sm" required>
                </td>
                <td>
                    {{-- <input name="vae[]" placeholder="Ingrese el VAE (%)"class="form-control form-control-sm" value="0" required> --}}
                    <select name="status[]" >
                        <option value="SI">SI</option>
                        <option value="NO">NO</option>
                     </select>
                </td>
                <input type="hidden" value={{$number}} name="number">
                
            </tr>
            <br>
            <?php endfor; ?>
           
        </tbody>
    </table>
        <br>
        <button class="btn btn-primary p-2" type="submit" >CALCULAR</button>
    </form>



@endsection
