
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    
    <script src="https://code.jquery.com"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script
      src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
      crossorigin="anonymous"
    ></script>
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->

    <script type="text/javascript" src="<?php echo JS.'waitMe.min.js'?>"></script>
    <script type="text/javascript" src="<?php echo JS.'main.js'?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    
    <script>
      $(document).ready(function(){
        $("#buscar").click(function(){
          var nombre = $("#nombre").val();

          if(nombre!='')
          {
            $.ajax({
              url:"ejecutar.php",
              type:"post",
              dataType:"JSON",
              data:{nombre:nombre},
              success:function(info){
                console.log(info.nit);
                //$("#empresa").html(info.nit);
                //$("#empresa").text(info.nit);
                $("#empresa").val(info.nit);
                $("#email").val(info.direccion);
                
                
              }
            })
          }
          else{
            alert("Seleccione un nombre");
          }
        })
      })
    </script>
    <script>
      $(document).ready(function(){
        $("#buscarp").click(function(){
          var nombre = $("#nombrep").val();

          if(nombre!='')
          {
            $.ajax({
              url:"ejecutar2.php",
              type:"post",
              dataType:"JSON",
              data:{nombre:nombre},
              success:function(info){
                console.log(info.nit);
                //$("#empresa").html(info.nit);
                //$("#empresa").text(info.nit);
                $("#id_producto").val(info.id_producto);
                $("#id_producto2").val(info.id_producto);
                $("#concepto").val(info.p_descripcion);
                $("#concepto2").val(info.p_descripcion);
                $("#marca").val(info.p_marca);
                $("#marca2").val(info.p_marca);
                $("#tipo").val(info.p_unidad);
                $("#tipo2").val(info.p_unidad);
                
                $("#precio_unitario").val(info.p_preciov);
                $("#precio_unitario2").val(info.p_preciov);
                $("#precio_unitario_c").val(info.p_precioc);
                $("#precio_unitario_c2").val(info.p_precioc);
  
                
                
              }
            })
          }
          else{
            alert("Seleccione un nombre");
          }
        })
      })
    </script>


<script>
      $(document).ready(function(){
        $("#buscarp2").click(function(){
          var nombre = $("#nombrep2").val();

          if(nombre!='')
          {
            $.ajax({
              url:"ejecutar3.php",
              type:"post",
              dataType:"JSON",
              data:{nombre:nombre},
              success:function(info){
                console.log(info.nit);
                //$("#empresa").html(info.nit);
                //$("#empresa").text(info.nit);
                $("#id_producto").val(info.id_producto_s);
                $("#concepto").val(info.s_descripcion);
                $("#marca").val(info.s_marca);
                $("#tipo").val(info.s_unidad);
                $("#precio_unitario").val(info.s_preciov);
                $("#precio_unitario_c").val(info.s_precioc);
  
                
                
              }
            })
          }
          else{
            alert("Seleccione un nombre");
          }
        })
      })
    </script>


    <script type="text/javascript">
        

        function calcular_a_bs(){
            try{
                var b = parseFloat(document.getElementById("precio_unitario_c").value) || 0;
                decimal = b.toFixed(2);
                proceso = (decimal *(30/100))+b;
                result = proceso.toFixed(2);
                document.getElementById("precio_unitario").value = result;
            } catch(e){}
        }


        

    </script>

    <script>
      // In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('.js-example-basic-single').select2({
      placeholder: "Buscar (Clientes)",
      allowClear: true , 
      theme: "classic",
      language: "es",
  
    });
  
    theme: "classic";
    
});
    </script>

    



<script>
      // In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('.secundario').select2({
      placeholder: "Buscar en base de datos (Antiguo)",
      allowClear: true , 
      theme: "classic",
      
      language: "es",
    });
    
    
});
    </script>


<script>
      // In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('.principal').select2({
      placeholder: "Buscar en base de datos (Nueva)",
      allowClear: true , 
      theme: "classic",
      
      language: "es",
    });
    
    
});
    </script>

    <script>
      function enviarTexto() {
        var texto = document.getElementById("concepto").value;
        document.getElementById("concepto2").value=texto;

        var texto = document.getElementById("marca").value;
        document.getElementById("marca2").value=texto;

        var texto = document.getElementById("tipo").value;
        document.getElementById("tipo2").value=texto; 

        var texto = document.getElementById("precio_unitario").value;
        document.getElementById("precio_unitario2").value=texto;

        var texto = document.getElementById("precio_unitario_c").value;
        document.getElementById("precio_unitario_c2").value=texto;
      }
    </script>


    


  </body>
</html>

