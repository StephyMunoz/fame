@extends('nav')

@section('title', 'Ingreso valores VAE')

@section('navigation')


<div id="showItems"  class="col-md-12">
    <form  method="post" action="{{route('vae.update')}}" >
        @csrf
        <h1>FORMULARIO DE DECLARACIÓN DE VALOR AGREGADO ECUATORIANO DE LA OFERTA</h1>
    <?php $aux=0;?>
        <?php $x = 0; for($x; $x < $number; $x++): ?>
            @if($auxVec[$x]==1)

                <h6>Empresa {{$nameEmp[$x]}}</h6>
                <div class="row">
                <div class="col-md-6">
                <label name="valorImportar" class="form-label ">¿Cuánto va a importar o importó, directamente, para cumplir con esta oferta?</label>
            </div>
        </div>
                <input id='importValue' name="valorImportar[]" placerholder="Ingrese el valora importar"  class="form-control form-control-sm" required>
                <label name="valorExtranjero" class="form-label">¿Cuánto va a comprar o compró en el Ecuador, pero que es importado para cumplir con esta oferta?</label>
                <input id='exportValue' name="valorExtranjero[]" placerholder="Ingrese el valor a exportar" class="form-control form-control-sm" required>
            
              <?php $aux=$aux+1 ;?>
            @else

                <input name="valorImportar[]" placerholder="Ingrese el valora importar" value=0  class="form-control form-control-sm" required hidden>
                <input name="valorExtranjero[]" placerholder="Ingrese el valor a exportar"  value=0 class="form-control form-control-sm" required hidden>
                
            @endif
        
            
        <?php endfor; ?>
        @if($aux==0)
            <h6>Ningún ofertante tiene VAE</h6>
        
        @endif

        <input type="hidden" value={{$number}} name="number">
        <input type="hidden" value={{$codigo}} name="codigo">
            <br>
        <button type="submit" class="btn btn-primary p-2" >ACEPTAR</button>  
    </form>
</div>

<script language="javascript">
    alert('hola');
      public function response() {
        alert('hola');
      }
</script>

@endsection