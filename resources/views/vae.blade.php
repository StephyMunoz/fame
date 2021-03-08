@extends('nav')

@section('title', 'Ingreso valores VAE')

@section('navigation')


<div id="showItems" style="display: none;">
    <form  method="post">
                <label name="valorImportar" class="form-label">Valor a importar</label>
                <input name="valorImportar" placerholder="Ingrese el valora importar"  class="form-control form-control-sm" required>
                <label name="valorExportar" class="form-label">Valor a exportar</label>
                <input name="valorExportar" placerholder="Ingrese el valor a exportar" class="form-control form-control-sm" required>
        
            <br>
            <button type="submit" class="btn btn-primary p-2" >ACEPTAR</button>
    </form>
</div>

<form  method="post" id='show'>
    <h3>Concurso de adjudicación de contratos</h3>
    <select id="status" name="status" onChange="mostrar(this.value);">
        <option value="reponseYes">si</option>
        <option value="reponseNo">no</option>
     </select>
</form>
<script type="text/javascript">
    function mostrar(id) {
        if (id == "reponseNo") {
            $("#showItems").show();
            
        } else {
            $("#show").show();
        }
    
        
    }
    </script>
@endsection