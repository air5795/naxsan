<?php

session_start();
include "../conexion.php";


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <?php include "includes/scripts.php"; ?>
    <link rel="stylesheet" href="css/estilos.css">
    <link href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>SISPONCELET</title>

</head>

<body class="sb-nav-fixed">
    <?php include "includes/header.php"; ?>

    <div id="layoutSidenav_content">
        <div class="container-fluid px-5 fondo ">
            <h1 class="mt-4 col"><i class="fa-solid fa-truck-ramp-box"></i> <strong>Gestor </strong><span style="color:#fd6f0a;"> Base de datos Productos </span></h1>
            <hr> 
        

        <div class="row">
            <div class="col-2 offset-10">
                <div class="text-center">
                    <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#modalproductos" id="botonCrear">
                        <i class="fa-solid fa-circle-plus"></i> Registrar Producto
                        </button>


                </div>
            </div>
        </div>

        <br />
        <br />

            <div class="table-responsive">
                <table id="datos_producto" class="table table-bordered table-striped" style="font-size: 10px;">
                    <thead>
                        <tr>
                        <th>ID</th>
                        <th>NOMBRE Y DESCRIPCION</th>
                        <th>MARCA</th>
                        <th>U/M</th>
                        <th>PRECIO COMPRA</th>
                        <th>PRECIO VENTA</th>
                        <th>TIPO PRODUCTO</th>
                        <th>PROVEEDOR</th>
                        <th>FECHA REGISTRO</th>
                        <th>IMAGEN</th>
                        <th>EDITAR</th>
                        <th>BORRAR</th>
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
                <h1 class="modal-title fs-5" id="exampleModalLabel">Registro de Productos</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
                <form action="" method="POST" id="formulario" enctype="multipart/form-data">
                    
                    <div class="modal-content">

                    <div class="modal-body" style="background-color: #ebebeb;">

                    <p style="color:red">(*) Obligatorio Llenar</p>
                    <div class="row">

                        <div class="col-12">
                            <label for="nombre" style="color: black;font-family: sans-serif;">Ingrese el Nombre o Descripción <span style="color:red"> *</span></label>
                            <input type="text" name="nombre" id="nombre" class="form-control form-control-sm">
                        </div>
                        <div class="col-6">
                            <label for="marca" style="color: black;font-family: sans-serif;">Ingrese la Marca</label>
                            <input type="text" name="marca" id="marca" class="form-control form-control-sm">
                        </div> 
                        <div class="col-6">
                            <label for="unidad" style="color: black;font-family: sans-serif;">Ingrese Unidad Medible (U/M) <span style="color:red"> *</span></label>
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
                            <label for="tipo" style="color: black;font-family: sans-serif;">Ingrese Tipo de Producto <span style="color:red"> *</span></label>
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
                            <label for="proveedor" style="color: black;font-family: sans-serif;">Ingrese Proveedor</label>
                            <input type="text" name="proveedor" id="proveedor" class="form-control form-control-sm">
                        </div>

                        <div class="col-6">
                            <label for="pc" style="color: black;font-family: sans-serif;">Ingrese Precio de Compra <span style="color:red"> *</span></label>
                            <input type="text" name="pc" id="pc" class="form-control form-control-sm" style="background-color: #2cff0029; color:green">
                        </div>

                        <div class="col-6">
                            <label for="pv" style="color: black;font-family: sans-serif;">Ingrese Precio de Venta <span style="color:red"> *</span></label>
                            <input type="text" name="pv" id="pv" class="form-control form-control-sm" style="background-color: #2cff0029; color:green">
                        </div>

                        <div class="col-6">
                            <label for="ficha" style="color: black;font-family: sans-serif;">Ingrese Ficha Tecnica</label>
                            <input type="file" class="form-control form-control-sm" name="ficha" id="files">
                        </div>

                        <div class="col-6">
                            <label for="certificado" style="color: black;font-family: sans-serif;">Ingrese Certificado</label>
                            <input type="file" class="form-control form-control-sm" name="certificado" id="files">
                        </div>

                        <div class="col-6">
                            <label for="foto" style="color: black;font-family: sans-serif;">Ingrese Foto</label>
                            <input type="file" class="form-control form-control-sm" name="foto" id="files">
                        </div>

                        <div class="col-6">
                            <span id="imagen-subida"></span>
                        </div>

                        

                        



                        

                        

                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id_producto" id="id_producto">
                        <input type="hidden" name="operacion" id="operacion">

                        <input type="reset" value="Limpiar Formulario" class="btn btn-secondary"> 
                        <input type="submit" name="action" id="action" class="btn btn-primary" value="Registrar">
                        
                    </div>
                    </div>
                    </div>
                </form>
            </div>
            
        </div>
        </div>

    </div>


    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $("#botonCrear").click(function(){
                $("#formulario")[0].reset();
                $(".modal-title").text("Crear Usuario");
                $("#action").val("Crear");
                $("#operacion").val("Crear");
                $("#imagen_subida").html("");
            });
            
            var dataTable = $('#datos_usuario').DataTable({
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
            var nombres = $('#nombre').val();
            var apellidos = $('#apellidos').val();
            var telefono = $('#telefono').val();
            var email = $('#email').val();
            var extension = $('#imagen_usuario').val().split('.').pop().toLowerCase();
            if(extension != '')
            {
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
                {
                    alert("Fomato de imagen inválido");
                    $('#imagen_usuario').val('');
                    return false;
                }
            }	
		    if(nombres != '' && apellidos != '' && email != '')
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
                            $('#modalUsuario').modal('hide');
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
    
</body>

</html>