@extends('nav')

@section('title', 'Ingreso a concurso')


@section('navigation')

<form method="POST" action="{{route('proyectos.store')}}" class="row g-3 justify-content-center" >
   
@csrf
    <div class="col-md-6">
        <h3>Proceso de adjudicación de contratos</h3>
        <label name="value" class="form-label">Ingrese el número de oferentes</label>
        <select class="form-select" aria-label="Default select example" id="value" name="value" required >
            
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>

          </select>
        <label name="codigoProyecto" class="form-label">Código del proceso</label>
        <input name="codigoProyecto" placerholder="Ingrese codigo del concurso"  class="form-control form-control-sm" required>

        <br>
        <button type="submit" class="btn btn-primary p-2" value="Enviar" onclick="this.disabled=true; this.value=’Enviando...’; this.form.submit()">ACEPTAR</button>
        
    </div>
</form>
<script>
    
</script>

@endsection