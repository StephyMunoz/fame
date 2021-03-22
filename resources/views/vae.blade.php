@extends('nav')

@section('title', 'Ingreso valores VAE')


@section('navigation')


<div   class="col-md-12">
    
    <form  id="formVae" method="post" action="{{route('vae.update')}}" >
        @csrf
        <h1>FORMULARIO DE DECLARACIÓN DE VALOR AGREGADO ECUATORIANO DE LA OFERTA</h1>
    <?php $aux=0;?>
        <?php $x = 0; for($x; $x < $number; $x++): ?>

            @if($auxVec[$x]==1)

                <h6>Oferente {{$x+1}}:   {{$nameEmp[$x]}}</h6>
                <div class="row">
                    <div class="col-md-6">
                        <label name="valorImportar" class="form-label "><strong>a) </strong>¿Cuánto va a importar o importó, directamente, para cumplir con esta oferta?</label>
                        <input id='importValue[]' name="valorImportar[]" placerholder="Ingrese el valora importar"  class="form-control form-control-sm" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label name="valorExtranjero" class="form-label"><strong>b) </strong>¿Cuánto va a comprar o compró en el Ecuador, pero que es importado para cumplir con esta oferta?</label>
                        <input id='exportValue' name="valorExtranjero[]" placerholder="Ingrese el valor a exportar" class="form-control form-control-sm" required>
                    </div>
                </div>
                
              <?php $aux=$aux+1 ;?>
            @else

                <input name="valorImportar[]" placerholder="Ingrese el valora importar" value=0  class="form-control form-control-sm" required hidden>
                <input name="valorExtranjero[]" placerholder="Ingrese el valor a exportar"  value=0 class="form-control form-control-sm" required hidden>
                
            @endif
        
            
        <?php endfor; ?>
        @foreach ($propAux as $item)
            <input type="hidden" value={{$item}} name="proposal[]">
        @endforeach
        @foreach ($auxVec as $item)
            <input type="hidden" value={{$item}} name="response[]">
        @endforeach
        @if($aux==0)
            <h6>Ningún ofertante tiene VAE</h6>
        
        @endif

        <input type="hidden" value={{$number}} name="number">
        <input type="hidden" value={{$codigo}} name="codigo">
        
       
        <br>
        <button type="submit" class="btn btn-primary p-2" >ACEPTAR</button>  
    </form>
</div>
<script>

    document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("formVae").addEventListener('submit', validateVaeValues);
    });
      function validateVaeValues() {
        event.preventDefault();

        var sum=[];
        var imp=[];
        var exp=[];
        
        var aux=0;
        var oferta=[];

        var imports=document.getElementsByName('valorImportar[]');
        var exports=document.getElementsByName('valorExtranjero[]');
        var proposal=document.getElementsByName('proposal[]');
        
        imports.forEach((element, i) => {
            imp[i]=parseFloat(element.value);
            console.log(imp[i]);
         });
         
        exports.forEach((element,i) => {
            exp[i]=parseFloat(element.value);   
         });
         proposal.forEach((element,i) => {
            oferta[i]=parseFloat(element.value);   
            console.log(oferta[i]);
         });
         for(var i=0;i<imports.length;i++){
            sum[i]=exp[i]+imp[i];
            if(sum[i]>oferta[i]){
                aux=aux+1;
                console.log(aux);
            } 
        }
        for(var i=0;i<imports.length;i++){
            if(aux==0){
                this.submit();
                
            } else {
                alert('Los valores de importación no pueden superar a la oferta');
            }
        }
            
        
      }
</script>

@endsection