<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <link rel="stylesheet" href="css/estilos.css">

    <title>PONCELET-SIS</title>
  </head>
  <body >


  
  <div class="container-fluid px-5">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
      <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <img src="img/GH.png" width="320px">
        <span class="fs-4" style="color: #eb1818;opacity: 50%;">/ Gestor Productos</span> 
      </a>

      <ul class="nav nav-pills">
        <li class="nav-item" style="margin-right: 6px;"><a href="../cotizador/" class="btn btn-outline-danger boton2"><i class="fa-solid fa-sack-dollar"></i> Ir a COTIZADOR</a></li>
        <li class="nav-item"><a href="../" class="btn btn-outline-secondary boton" ><i class="fa-solid fa-arrow-left boton"></i> Volver SIS-PONCELET</a></li>
        
        <li><a class="btn btn-light " id="bdark" style="border-radius: 50px;"> <i class="fa-solid fa-moon"></i> </a></li>
      </ul>
    </header>
  </div>



  <div id="layoutSidenav_content">
  <div class="container-fluid  fondo ">
    

      
        
        <div class="row">
            <div class="col-md-4">
                <h3><i class="fa-solid fa-database"></i> Productos en base de Datos</h3>
            </div>
            <div class="col-md-2 offset-md-6">
                <div class="text-center">
                    <!-- Button trigger modal -->
                        <button type="button" class="btn btn-outline-secondary boton6 w-100" data-bs-toggle="modal" data-bs-target="#modalproductos" id="botonCrear">
                        <i class="fa-solid fa-plus"></i> Nuevo Producto
                        </button>
                </div>
            </div>
            
        </div>
        
        <hr style="background-color: red;">

        <div class="table-responsive" style="font-size: 11px; width:100%">
            <table id="datos_usuario" class="table table-dark table-hover" >
                <thead>
                    <tr>
                        <th style="background-color: #080808;border-radius: 15px 15px 0px 0px;">ID</th>
                        <th style="background-color: #080808;border-radius: 15px 15px 0px 0px;" width="15%">NOMBRE Y DESCRIPCION</th>
                        <th style="background-color: #080808;border-radius: 15px 15px 0px 0px;">MARCA</th>
                        <th style="background-color: #080808;border-radius: 15px 15px 0px 0px;">U/M</th>
                        <th style="background-color: #080808;border-radius: 15px 15px 0px 0px;">PRECIO COMPRA</th>
                        <th style="background-color: #080808;border-radius: 15px 15px 0px 0px;">PRECIO VENTA</th>
                        <th style="background-color: #080808;border-radius: 15px 15px 0px 0px;">TIPO PRODUCTO</th>
                        <th style="background-color: #080808;border-radius: 15px 15px 0px 0px;">PROVEEDOR</th>
                        <th style="background-color: #080808;border-radius: 15px 15px 0px 0px;">FECHA REGISTRO</th>
                        <th style="background-color: #080808;border-radius: 15px 15px 0px 0px;">IMAGEN</th>
                        <th style="background-color: #080808;border-radius: 15px 15px 0px 0px;">FICHA TECNICA</th>
                        <th style="background-color: #080808;border-radius: 15px 15px 0px 0px;">CERTIFICADO</th>
                        <th style="background-color: #080808;border-radius: 15px 15px 0px 0px;">EDITAR</th>
                        <th style="background-color: #080808;border-radius: 15px 15px 0px 0px;">BORRAR</th>
                    </tr>
                </thead>
            </table>
        </div>
   </div>


<!-- Modal NUEVO -->
<div class="modal fade" id="modalproductos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="fa-solid fa-box"></i> Registro de Productos</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="background-color: azure;"></button>
            </div>
            
                <form action="" method="POST" id="formulario" enctype="multipart/form-data">
                    
                    <div class="modal-content">

                    <div class="modal-body">

                    

                 
                    <div class="row">

                        <div class="col-12">
                            <label for="nombre" style="font-family: sans-serif;">Ingrese el Nombre o Descripción <span style="color:red"> *</span></label>
                            <input type="text" name="nombre" id="nombre" class="form-control form-control-sm">
                        </div>
                        <div class="col-6">
                            <label for="marca" style="font-family: sans-serif;">Ingrese la Marca</label>
                            <input type="text" name="marca" id="marca" class="form-control form-control-sm">
                        </div> 
                        <div class="col-6">
                            <label for="unidad" style="font-family: sans-serif;">Ingrese Unidad Medible (U/M) <span style="color:red"> *</span></label>
                            <select name="unidad" id="unidad" class="form-control form-control-sm">
                                <option value="">Selecciona una Opcion</option>
                                <option value="Unidad">Unidad</option>
                                <option value="Caja">Caja</option>
                                <option value="Pieza">Pieza</option>
                                <option value="Equipo">Equipo</option>
                                <option value="Paquete">Paquete</option>
                                <option value="Pliegue">Pliegue</option>
                                <option value="Pliego">Pliego</option>
                                <option value="Par">Par</option>
                                <option value="Docena">Docena</option>
                                <option value="Bidon">Bidon</option>
                                <option value="Block">Block</option>
                                <option value="Bolsa">Bolsa</option>
                                <option value="Bote">Bote</option>
                            </select>
                        </div>

                        


                        <div class="col-6">
                            <label for="tipo" style="font-family: sans-serif;">Ingrese Tipo de Producto <span style="color:red"> *</span></label>
                            <select name="tipo" id="tipo" class="form-control form-control-sm ">
                                <option value="">Selecciona una Opcion</option>
                                <option value="limpieza">Material de Limpieza</option>
                                <option value="mobiliario">Material Mobiliario</option>
                                <option value="Musical">Material Musical</option>
                                <option value="Hospitalario">Material Hospitalario</option>
                                <option value="Tecnologico">Material Tecnologico</option>
                                <option value="Cocina">Material de Cocina</option>
                                <option value="Textil">Material Textil</option>
                                <option value="Vehiculos">Vehiculos</option>
                                <option value="Ferreteria">Ferreteria</option>
                                <option value="industrial">Seguridad Industrial</option>
                                <option value="alimentos">Alimentos</option>
                                <option value="escritorio">Material de Escritorio</option>
                                <option value="policial">Material Policial</option>
                                <option value="deportivo">Material Deportivo</option>
                                <option value="belleza">Material de Belleza</option>
                            </select>
                        </div>

                        <div class="col-6">
                            <label for="proveedor" style="font-family: sans-serif;">Ingrese Proveedor</label>
                            <input type="text" name="proveedor" id="proveedor" class="form-control form-control-sm">
                        </div>

                        <div class="col-6">
                            <label for="pc" style="font-family: sans-serif;">Ingrese Precio de Compra (Bs) <span style="color:red"> *</span></label>
                            <input oninput="calcular_a_bs()" type="text" name="pc" id="pc" class="form-control form-control-sm" style="background-color: #a4d39a; color:green">
                        </div>

                        <div class="col-6">
                            <label for="pv" style="font-family: sans-serif;">Ingrese Precio de Venta (Bs) <span style="color:red"> *</span></label>
                            <input type="text" name="pv" id="pv" class="form-control form-control-sm" style="background-color: #a4d39a; color:green">
                        </div>

                        <div class="col-6">
                            <label for="ficha" style="font-family: sans-serif;">Ingrese Ficha Tecnica</label>
                            <input type="file" class="form-control form-control-sm" name="ficha" id="ficha">
                        </div>

                        <div class="col-6">
                            <label for="certificado" style="font-family: sans-serif;">Ingrese Certificado</label>
                            <input type="file" class="form-control form-control-sm" name="certificado" id="certificado">
                        </div>

                        <div class="col-6">
                            <label for="foto" style="font-family: sans-serif;">Ingrese Foto</label>
                            <input type="file" class="form-control form-control-sm" name="foto" id="foto">
                        </div>

                        <div class="col-6">
                            <span id="imagen-subida"></span>
                        </div>

                        

                        



                        

                        

                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id_producto" id="id_producto">
                        <input type="hidden" name="operacion" id="operacion">

                        <input type="reset" value="Limpiar" class="btn btn-secondary"> 
                        <input type="submit" name="action" id="action" class="btn btn-success" value="Registrar">
                        
                    </div>
                    </div>
                    </div>
                </form>
            </div>


            
        </div>



        </div>



</div>

                            <!-- Modal para  ver imagenes -->
                            <div class="modal fade" id="gallery-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered ">
                        <div class="modal-content modal-fullscreen ">
                            <div class="modal-header">
                                <!--<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>-->
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <img src="img/actas/acta_103_1_2021-02-22.jpg" class="modal-img" alt="modal img" width="100%" height="100%">
                            </div>

                        </div>
                    </div>
                </div>



<script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $("#botonCrear").click(function(){
                $("#formulario")[0].reset();
                //$(".modal-title").text("Crear Producto");
                $("#action").val("Crear Producto");
                $("#operacion").val("Crear");
                $("#foto").html("");
                $("#ficha").html("");
                $("#certificado").html("");
            });
            
            var dataTable = $('#datos_usuario').DataTable({
                "pageLength": 25,
                "processing":true,
                "serverSide":true,
                "order":[],
                "ajax":{
                    url: "obtener_registros.php",
                    type: "POST"
                },
                "columnsDefs":[
                    {
                    "targets":[0, 3, 4],
                    "orderable":false,
                    },
                ],
                "language": {
                "decimal": "",
                "emptyTable": "No hay registros",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Entradas",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            }
            });
            
            //Aquí código inserción
            $(document).on('submit', '#formulario', function(event){
            event.preventDefault();
            var nombre = $('#nombre').val();
            var marca = $('#marca').val();
            var unidad = $('#unidad').val();
            var tipo = $('#tipo').val();
            var proveedor = $('#proveedor').val();
            var pc = $('#pc').val();
            var pv = $('#pv').val();
            var extension = $('#foto').val().split('.').pop().toLowerCase();
            var extension2 = $('#ficha').val().split('.').pop().toLowerCase();
            var extension3 = $('#certificado').val().split('.').pop().toLowerCase();
            if(extension != '')
            {
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
                {
                    alert("Fomato de imagen inválido");
                    $('#foto').val('');
                    return false;
                }
            }

            if(extension2 != '')
            {
                if(jQuery.inArray(extension2, ['pdf']) == -1)
                {
                    alert("Fomato inválido");
                    $('#ficha').val('');
                    return false;
                }
            }

            if(extension3 != '')
            {
                if(jQuery.inArray(extension3, ['pdf']) == -1)
                {
                    alert("Fomato de imagen inválido");
                    $('#certificado').val('');
                    return false;
                }
            }
            	
		    if(nombre != '' && marca != '' && unidad != '' && tipo != '' && pc != '' && pv != '')
                {
                    $.ajax({
                        url:"crear.php",
                        method:'POST',
                        data:new FormData(this),
                        contentType:false,
                        processData:false,
                        success:function(data)
                        {
                            alert(data);
                            $('#formulario')[0].reset();
                            $('#modalproductos').modal('hide');
                            dataTable.ajax.reload();
                        }
                    });
                }
                else
                {
                    alert("Algunos campos son obligatorios");
                }
	        });

            //Funcionalida de editar
            $(document).on('click', '.editar', function(){		
            var id_usuario = $(this).attr("id");		
            $.ajax({
                url:"obtener_registro.php",
                method:"POST",
                data:{id_usuario:id_usuario},
                dataType:"json",
                success:function(data)
                    {
                        //console.log(data);				
                        $('#modalUsuario').modal('show');
                        $('#nombre').val(data.nombre);
                        $('#apellidos').val(data.apellidos);
                        $('#telefono').val(data.telefono);
                        $('#email').val(data.email);
                        $('.modal-title').text("Editar Usuario");
                        $('#id_usuario').val(id_usuario);
                        $('#imagen_subida').html(data.imagen_usuario);
                        $('#action').val("Editar");
                        $('#operacion').val("Editar");
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                    }
                })
	        });

            //Funcionalida de borrar
            $(document).on('click', '.borrar', function(){
                var id_usuario = $(this).attr("id");
                if(confirm("Esta seguro de borrar este registro:" + id_usuario))
                {
                    $.ajax({
                        url:"borrar.php",
                        method:"POST",
                        data:{id_usuario:id_usuario},
                        success:function(data)
                        {
                            alert(data);
                            dataTable.ajax.reload();
                        }
                    });
                }
                else
                {
                    return false;	
                }
            });

        });         
    </script>


<script>
    document.addEventListener("click",function(e){
        if(e.target.classList.contains("gallery-item")){
            const src = e.target.getAttribute("id");
            document.querySelector(".modal-img").src = src;

            const myModal = new bootstrap.Modal(document.getElementById('gallery-modal'));
            myModal.show();
        }
    });
</script>

<script type="text/javascript">
        

        function calcular_a_bs(){
            try{
                var b = parseFloat(document.getElementById("pc").value) || 0;
                decimal = b.toFixed(2);
                proceso = (decimal *(30/100))+b;
                result = proceso.toFixed(2);
                document.getElementById("pv").value = result;
            } catch(e){}
        }


    </script>

    <script>
        const bdark = document.querySelector('#bdark');
        const body = document.querySelector('body');

        bdark.addEventListener('click',e =>{
            body.classList.toggle('darkmode');
        });

        const table = document.querySelector('table');
        bdark.addEventListener('click',e =>{
            table.classList.toggle('table-dark');
        });


    </script>
    
  </body>
</html>