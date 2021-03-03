@extends('nav')

@section('title', 'Ingreso a concurso')

@section('navigation')
<h1>Concurso de adjudicación de contratos</h1>

<form method="POST" action="{{route('proyectos.store')}}" class="mb-3 p-3 lg-3" >
@csrf
    <div class="mb-3 p-3 lg-3" >
    <label name="value" class="form-label">Ingrese el número de concursantes</label>
        <select class="form-select" aria-label="Default select example" id="value" name="value" >
            <option selected>Seleccione el numero de ofertantes</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select>
        <label name="codigoProyecto" class="form-label">Ingrese el codigo del concurso</label>
        <input name="codigoProyecto" placerholder="Ingrese codigo del concurso"  class="form-control form-control-sm" >
        <label name="nombreProyecto" class="form-label">Ingrese nombre del proyecto</label>
        <input name="nombreProyecto" placerholder="Ingrese nombre del proyecto" class="form-control form-control-sm" value="concurnj">
        <label name="descripcionProyecto" class="form-label">Ingrese descripcion del concurso</label>
        <input name="descripcionProyecto" placerholder="Ingrese codigo del concurso"  type="text" class="form-control form-control-sm input-group-text "este consurso">

        <button type="submit" class="btn btn-primary p-3" >ACEPTAR</button>
        
    </div>
</form>


@endsection