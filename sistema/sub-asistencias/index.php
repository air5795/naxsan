<?php
    
    session_start();

    

    $usuario = $_SESSION['user'];

    include "../../conexion.php";

?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        
        <link rel="stylesheet" href="css/estilos3.css">
        <link rel="stylesheet" href="css/estilos2.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">

        

        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

        <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css" rel="stylesheet">
        

        <link rel="shortcut icon" href="img/ICONOGRANDE2.png">
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>SIS-PONCELET</title>
        
        
    </head>
    <body class="sb-nav-fixed">
    <?php  include "../menu.php"?>
    

        <!-- contenido del sistema-->

        <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid ">
                    <div class="container-fluid  ">
                    
                     
                        <br>
                        
<!-- contenido del sistema 2--> 

<!-- Contenedor tabla--> 

<div class="container-fluid  fondo ">    
        <div class="row">
            <div class="col-sm-12" >
                <h2><i class="bi bi-person-badge"></i> Asistencias Personal  </h2>
                <hr>
            </div>

            
        </div>



        <div class="row">

                <div class="col-sm-3">
                        <div class="container-clock" style="text-align: center;"> 
                            <h1 style="font-size: 70px;" id="time">00:00:00</h1>
                            <p style="color:coral;font-weight: 600;" id="date">date</p>
                        </div>

                        <a class="btn btn-outline-danger w-100  " href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"> <i class="bi bi-file-pdf-fill"></i>  Imprimir Informes   </a>
                         <p></p>
                            <form action="" method="POST" id="formularioIngreso" enctype="multipart/form-data">
                                    <input type="hidden" name="operacion" id="operacion">
                                    <button type="submit" name="action" id="action" class="btn btn-success w-100">
                                    <i class="fas fa-check-circle"></i> Registrar Ingreso
                                    </button>
                                </form>
                </div>

                <div class="col-sm-9">
                <div class="table-responsive" style="font-size: 12px;width:100%;background-color: #fdfde9;padding: 22px;border-radius: 25px;border: 1px solid #d5d5d5;   ">
                <p></p>
                <h3><i class="bi bi-calendar"></i> Tus Registros de Hoy </h3>
                    <table id="datos_usuario" class="table table-hover table-striped table-bordered" style="width:100%; text-align:center" >
                    <thead>
                        <tr>
                            <th></th>
                            <th></th>
                            <th width="20%" style="padding:5px;">USUARIO</th>                            
                            <th style="padding:5px;">INGRESO </th>
                            <th style="padding:5px;">SALIDA </th>
                            <th width="10%" style="padding:5px;">FECHA </th>
                            <th width="15%" style="padding:5px;">TURNO </th>
                            <th width="20%" style="padding:5px;">TIEMPO TRABAJADO </th>

                            <th width="15%"style="padding:5px;">OBSERVACION</th>
                            
                            
                            
                            
                            
                        </tr>
                </thead>
            </table>
        </div>

                </div>

                

                

                <input type="hidden" name="operacion" id="operacion">

            
        </div>


        <hr >

        


        <div class="table-responsive" style="font-size: 12px; width:100%">
            <h3><i class="bi bi-calendar3"></i> Todos los Registros </h3>
            <table id="datos_usuario2" class="table table-hover table-striped table-bordered" style="width:100%; text-align:center" >
                <thead>
                    <tr>
                        
                            <th style="padding:5px;">ID</th>
                            <th width="20%" style="padding:5px;">USUARIO</th>
                            <th width="10%" style="padding:5px;">INGRESO </th>
                            <th width="10%" style="padding:5px;">SALIDA </th>
                            <th width="10%" style="padding:5px;">FECHA </th>
                            <th width="10%" style="padding:5px;">TURNO </th>
                            <th width="20%" style="padding:5px;">TIEMPO TRABAJADO </th>

                            <th width="20%" style="padding:5px;">OBSERVACION</th>

                            <?php
                        if($_SESSION['rol'] == 1){

                            ?>    

                            <th></th>
                            <th></th>

                            <?php
                        }

                            ?> 

                                    
                    </tr>
                </thead>
            </table>
        </div>
    </div>

<!-- FINAL tabla--> 
<!-- Modal NUEVO -->
<div class="modal fade" id="modal-asis" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="fa-solid fa-box"></i> Editar Asistencia</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="background-color: azure;"></button>
            </div>
            
                <form action="" method="POST" id="formulario-editar" enctype="multipart/form-data">
                    
                    <div class="modal-content">

                    <div class="modal-body">

                    

                 
                    <div class="row">

                        <div class="col-sm-6">
                            <span for="inputFirstName">Fecha Registro </span>
                            <input class="form-control" type="text" name="fecha_registro" id="fecha_registro">
                        </div>


                        <div class="col-sm-6">
                            
                        </div>
                                
                    

                        <div class="col-sm-6">
                            <span for="inputFirstName">Ingreso </span>
                            <input style="background-color: #ccffe2;" class="form-control" type="text" name="ingreso" id="ingreso">
                        </div>

                        <div class="col-sm-6">
                            <span for="inputFirstName">Salida </span>
                            <input style="background-color: #ffdcdc;"  class="form-control" type="text" name="salida" id="salida">
                        </div>

                        <div class="col-sm-12">
                            <span for="inputFirstName">Observacion </span>
                            <input class="form-control" type="text" name="observacion" id="observacion">
                        </div>

                        <div class="col-sm-6">
                            <span for="inputFirstName">Turno </span>
                            <input class="form-control" type="text" name="turno" id="turno">
                        </div>

                        <br>

                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id_asistencia" id="id_asistencia">
        
                        <input type="hidden" name="operacion" id="operacion">

                        <input type="submit" name="action" id="action" class="btn btn-success" value="Editar Registro">
                        
                    </div>
                    </div>
                    </div>
                </form>
            </div>


            
        </div>



        </div>



</div>

<!-- FINAL MODAL -->




<!-- Modal observacion -->
<div class="modal fade" id="modal-obs" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="fa-solid fa-box"></i> Editar Observacion en la Asistencia </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="background-color: azure;"></button>
            </div>
            
                <form action="" method="POST" id="formulario-obs" enctype="multipart/form-data">
                    
                    <div class="modal-content">

                    <div class="modal-body">

                    

                 
                    <div class="row">

                        
                    


                        <div class="col-sm-12">
                            <span for="inputFirstName">Observacion </span>
                            <input class="form-control" type="text" name="obs" id="obs">
                        </div>

                        

                        <br>

                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id_asistencia" id="id_asistencias">
        
                        <input type="hidden" name="operacion" id="operacion">

                        <input type="submit" name="action" id="action" class="btn btn-success" value="Editar Registro">
                        
                    </div>
                    </div>
                    </div>
                </form>
            </div>


            
        </div>



        </div>



</div>

<!-- FINAL MODAL -->











</div>

<!-- FINAL MODAL -->
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
<!-- FINAL Modal para  ver imagenes -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Generar reportes</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" style="text-align: center;">

      <form action="../reporte_asis.php"  class="form-inline row" method="POST" name="formFechas" id="formFechas">
            
            
            
            <div class="col-sm-12">
            <label for="">Elegir Personal</label>
                <select style="width: 100%;font-size:12px ; border-radius: 25px;border: 2px solid gray;" name="personal" id="select" class=" form-select" required >
                    <option value="" >Seleccione una opción : </option>
                    <?php
                        $query = mysqli_query($conexion, "SELECT * from usuario WHERE estatus = 1 ORDER BY nombre ASC;");
                        $result = mysqli_num_rows($query);
                        if ($result > 0) {
                        while ($data = mysqli_fetch_array($query)) {
                            echo '<option value="'.$data['usuario'].'">'.$data['nombre'].'</option>';

                        }}
                    ?>

                </select>
                                                
            </div>
            <div class="col-sm-12">
                <label for="">Fecha Inicio</label>
                <input style="border-radius: 25px;border: 2px solid gray;" class="form-control form-control-sm" type="date" name="fecha_inicio" id="" required > 
            </div>
            <div class="col-sm-12">
                <label for="">Fecha Final</label>
                <input style="border-radius: 25px;border: 2px solid gray;" class="form-control form-control-sm" type="date" name="fecha_final" id="" required >

            </div>
                                            
            <div class="col-sm-12">
                <label for="">Imprimir</label>
                <center>

                <button style="font-size:12px;border-radius: 8px;border: 1px solid red;" type="submit" class="btn btn-danger">
                Generar Reporte de Asistencias  
                </button>
                </center>
            </div>

           
                                        
        </form>
        
        </div>
      </div>
    </div>
  </div>

                

<!-- FINAL CONTENIDO--> 
                
            </div>
        </div>

    </main>

</div>

        

    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous" ></script>
        
        <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>


        <script>

       

            window.addEventListener('DOMContentLoaded', event => {
            // Toggle the side navigation
            const sidebarToggle = document.body.querySelector('#sidebarToggle');
            if (sidebarToggle) {
                // Uncomment Below to persist sidebar toggle between refreshes
                // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
                //     document.body.classList.toggle('sb-sidenav-toggled');
                // }
                sidebarToggle.addEventListener('click', event => {
                    event.preventDefault();
                    document.body.classList.toggle('sb-sidenav-toggled');
                    localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
                });
            }

            });
        </script>


    <script type="text/javascript">
        $(document).ready(function(){

                
                $("#botonIngreso").click(function(){
                $("#formularioIngreso")[0].reset();
                //$(".modal-title").text("Crear Proyecto");
                $("#action").val("Crear Proyecto");
                $("#operacion").val("Crear");
            });

            

            
            var dataTable = $('#datos_usuario').DataTable({
                lengthMenu: [
                    [2, 25, 50, -1],
                    [2, 25, 50, 'All'],
                ],
                "pageLength": 2,
                "processing":true,
                "serverSide":true,
                "ordering": false,
                
                "order":[],
                "ajax":{
                    url: "obtener_registros.php",
                    type: "POST"
                    
                },
                //CONDICIONAL DE COLORES EN TABLA 
                /*"createdRow": function(row,data,index){
                        if (data[7] == 'proceso') {
                            $('td', row).eq(7).css({
                                'background-color':'#f3f39b',
                                'color':'black',
                                'text-align':'center',
                            });
                        }else{
                            $('td', row).eq(7).css({
                                'color':'black',
                                'background-color':'#84f585',
                                'text-align':'center',
                    

                            });
                        }
                    },*/
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

            var dataTable2 = $('#datos_usuario2').DataTable({
                lengthMenu: [
                    [10, 10, 25, 50, -1],
                    [10, 10, 25, 50, 'All'],
                ],
                "pageLength": 10,
                "processing":true,
                "serverSide":true,
                "ordering": false,
                
                "order":[],
                "ajax":{
                    url: "obtener_registros2.php",
                    type: "POST"
                    
                },
                //CONDICIONAL DE COLORES EN TABLA 
                /*"createdRow": function(row,data,index){
                        if (data[7] == 'proceso') {
                            $('td', row).eq(7).css({
                                'background-color':'#f3f39b',
                                'color':'black',
                                'text-align':'center',
                            });
                        }else{
                            $('td', row).eq(7).css({
                                'color':'black',
                                'background-color':'#84f585',
                                'text-align':'center',
                    

                            });
                        }
                    },*/
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





            //Aquí código inserción ingreso
            $(document).on('submit', '#formularioIngreso', function(event){
            event.preventDefault();

            // Obtener la fecha actual
            var fechaActual = new Date();
            var dia = fechaActual.getDate();
            var mes = fechaActual.getMonth() + 1; // Los meses comienzan desde 0
            var año = fechaActual.getFullYear();

            // Formatear la fecha en el formato deseado (por ejemplo, "DD/MM/YYYY")
            var fechaFormateada = dia + '/' + mes + '/' + año;

            // Utilizar la fecha formateada en el texto de la pregunta de confirmación
            Swal.fire({
                title: '¿Desea registrar su asistencia?',
                text: 'Por favor, confirme su acción para la fecha ' + fechaFormateada,
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Sí',
                confirmButtonColor: '#72db88',
                cancelButtonText: 'No'
            }).then((result) => {
                if (result.isConfirmed) {
                    $("#operacion").val("ingreso");
                    $.ajax({
                        url: "crear.php",
                        method: 'POST',
                        data: new FormData(this),
                        contentType: false,
                        processData: false,
                        success: function(data) {
                            if (data === 'Registro creado') {
                                Swal.fire(
                                    'Exitoso!',
                                    'Se registró correctamente su Asistencia',
                                    'success'
                                );
                            } else {
                                Swal.fire(
                                    'Error!',
                                    'Ya se han alcanzado los registros para este Día y usuario',
                                    'error'
                                );
                            }
                            $('#formularioIngreso')[0].reset();
                            dataTable.ajax.reload();
                            dataTable2.ajax.reload();
                        }
                    });
                }
            });
        });

        $(document).on('submit', '#formulario-editar', function(event){
        event.preventDefault();
        
        var formData = new FormData(this);
        
        $.ajax({
            url: 'editar.php',
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                // Manejar la respuesta del servidor después de la edición
                console.log(response);

                // Restablecer el formulario y cerrar el modal si es necesario
                $('#formulario-editar')[0].reset();
                $('#modal-asis').modal('hide');
                
                // Actualizar la tabla u otra lógica de actualización
                dataTable.ajax.reload();
                dataTable2.ajax.reload();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });
    });

    // editar solo observaciones

    $(document).on('submit', '#formulario-obs', function(event){
        event.preventDefault();
        
        var formData = new FormData(this);
        
        $.ajax({
            url: 'editar_obs.php',
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                // Manejar la respuesta del servidor después de la edición
                console.log(response);
                
                // Restablecer el formulario y cerrar el modal si es necesario
                $('#formulario-obs')[0].reset();
                $('#modal-obs').modal('hide');
                
                // Actualizar la tabla u otra lógica de actualización
                dataTable.ajax.reload();
                dataTable2.ajax.reload();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });
    });



	    


            //Funcionalidad de editar
            $(document).on('click', '.editar1', function(){		
            var id_asistencia = $(this).attr("id");		
            $.ajax({
                url:"obtener_registro.php",
                method:"POST",
                data:{id_asistencia:id_asistencia},
                dataType:"json",
                success:function(data)
                    {
                        
                        //console.log(data);				
                        $('#modal-asis').modal('show'); 
                        $('#ingreso').val(data.ingreso);
                        $('#salida').val(data.salida);
                        $('#fecha_registro').val(data.fecha_registro);
                        $('#observacion').val(data.observacion);
                        $('#turno').val(data.turno);
                        $('.modal-title').text("Editar Asistencia de: " + data.usuario_id);
                        $('#id_asistencia').val(id_asistencia);
                        $('#action').val("Editar");
                        $('#operacion').val("Editar");
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                    }
                })
	        });

            //Funcionalidad de editar obs
            $(document).on('click', '.editar', function(){		
            var id_asistencia = $(this).attr("id");		
            $.ajax({
                url:"obtener_registro.php",
                method:"POST",
                data:{id_asistencia:id_asistencia},
                dataType:"json",
                success:function(data)
                    {
                        
                        //console.log(data);				
                        $('#modal-obs').modal('show'); 
                        $('#obs').val(data.observacion);
                        $('.modal-title').text("Editar Asistencia de: " + data.usuario_id);
                        $('#id_asistencias').val(id_asistencia);
                        $('#action').val("Editar");
                        $('#operacion').val("Editar");
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                    }
                })
	        });


             

            //Funcionalidad de borrar
            $(document).on('click', '.borrar1', function(){
                var id_asistencia = $(this).attr("id");

                Swal.fire({
                title: 'Esta Seguro de Borrar ?',
                text: "El Registro con el ID = " + id_asistencia,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#72db88',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Borralo!'
                }).then((result) => {
                if (result.isConfirmed) {

                    $.ajax({
                        url:"borrar.php",
                        method:"POST",
                        data:{id_asistencia:id_asistencia},
                        success:function(data)
                        {
                            dataTable.ajax.reload();
                            dataTable2.ajax.reload();
                            
                        }
                    });

                    Swal.fire(
                    'Borrado con Exito!',
                    'Se Elimino de la Base de datos el Producto ',
                    'success'
                    )
                }
                else{
                    return false;
                }
                });

            });

             //Funcionalidad de salida
             $(document).on('click', '.salida', function(){
                var id_asistencia = $(this).attr("id");

                Swal.fire({
                    title: '¿Está seguro de registrar su salida?',
                    text: "El Registro con el ID = " + id_asistencia,
                    icon: 'question',
                    showCancelButton: false,
                    confirmButtonColor: '#72db88',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, Registrar!'
                }).then((result) => {
                    if (result.isConfirmed) {
                    $.ajax({
                        url: "salida.php",
                        method: "POST",
                        data: {id_asistencia: id_asistencia},
                        success: function(data) {
                        dataTable.ajax.reload();
                        dataTable2.ajax.reload();
                        Swal.fire(
                            '¡Registrado con éxito!',
                            'Su salida se registró correctamente',
                            'success'
                        );
                        },
                        error: function(xhr, status, error) {
                            Swal.fire(
                            '¡Error!',
                            xhr.responseText, // Mostrar el mensaje de error recibido del servidor
                            'error'
                            );
                        }
                    });
                    } else {
                    return false;
                    }
                });
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

        //MODO OSCURO 

        const bdark = document.querySelector('#bdark');
        const main = document.querySelector('main');
        const body = document.querySelector('body');

        bdark.addEventListener('click',e =>{
            main.classList.toggle('darkmode');
        });

        bdark.addEventListener('click',e =>{
            body.classList.toggle('darkmode');
        });

        

        const table = document.querySelector('table');
            bdark.addEventListener('click',e =>{
            table.classList.toggle('table-dark');
        });





    </script>

            <script>
            const time = document.getElementById('time');
            const date = document.getElementById('date');

            const meses = ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
            const interval = setInterval(()=>{
                const local = new Date();
                let day = local.getDate(),
                    month = local.getMonth(),
                    year = local.getFullYear();

                time.innerHTML = local.toLocaleTimeString();
                date.innerHTML = `Fecha Actual : ${day} / ${meses[month]} / ${year}`; 

            },1000);


            


        </script>
        

        
        
       


        </body>
</html>