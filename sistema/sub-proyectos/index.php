<?php
    
    session_start();
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
    <?php include "../menu.php"?>
    

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
            <div class="col-sm-12">
                <h2><i class="bi bi-bar-chart-line-fill"></i> Seguimiento - Proyectos y Cotizaciones </h2>
                
            </div>

            <?php

                $result=mysqli_query($conexion,"SELECT count(*) as total from proyectos_comer where tipo = 'cotizacion'");
                $data=mysqli_fetch_assoc($result);
                $n_cotizacion = $data['total'];

                $result2=mysqli_query($conexion,"SELECT count(*) as total from proyectos_comer where tipo != 'cotizacion'");
                $data2=mysqli_fetch_assoc($result2);
                $n_proyectos = $data2['total'];

                $result3=mysqli_query($conexion,"SELECT count(*) as total from proyectos_comer where estado = 'adjudicado' or estado = 'pagado';");
                $data3=mysqli_fetch_assoc($result3);
                $n_adjudicados = $data3['total'];

                $result4=mysqli_query($conexion,"SELECT count(*) as total from proyectos_comer where estado = 'pagado' ");
                $data4=mysqli_fetch_assoc($result4);
                $n_adjudicados2 = $data4['total'];

                $result5=mysqli_query($conexion,"SELECT count(*) as total from proyectos_comer where estado = 'no' ");
                $data5=mysqli_fetch_assoc($result5);
                $n_adjudicados3 = $data5['total'];

                $result6=mysqli_query($conexion,"SELECT count(*) as total from proyectos_comer where estado = 'proceso' ");
                $data6=mysqli_fetch_assoc($result6);
                $n_adjudicados4 = $data6['total'];

            ?>
            <p></p>

            
            <div class="col-sm-2">
                <a class="btn btn-secondary w-100 small disabled" href=""> <strong>  <?php echo $n_proyectos; ?> </strong> <span style="font-size: small;"> PROYECTOS REALIZADOS </span> </a>
            
                
            </div>

            

            

            <div class="col-sm-2">
                <a class="btn btn-secondary w-100 small  disabled" href=""> <strong>  <?php echo $n_cotizacion; ?> </strong> <span style="font-size: small;">  COTIZACIONES REALIZADAS </span> </a>
            
                
            </div>

            <div class="col-sm-2">
                <a class="btn btn-success w-100  disabled" href=""> <strong>  <?php echo $n_adjudicados; ?> </strong> <span style="font-size: small">   ADJUDICADOS </span></a>
            
                
            </div>

            


            <div class="col-sm-2">
                <a class="btn btn-primary w-100  disabled" href=""> <strong>  <?php echo $n_adjudicados2; ?> </strong> <span style="font-size: small">  PROYECTOS PAGADOS </span></a>
            
  
            </div>

            <div class="col-sm-2">
                <a class="btn btn-danger w-100  disabled" href=""> <strong>  <?php echo $n_adjudicados3; ?> </strong> <span style="font-size: small">  PROYECTOS NO ADJUDICADOS </span></a>
            
  
            </div>

            <div class="col-sm-2">
                <a class="btn btn-warning w-100  disabled" href=""> <strong>  <?php echo $n_adjudicados4; ?> </strong> <span style="font-size: small">  PROYECTOS EN PROCESO </span></a>
            
  
            </div>

           
            
            




<!-- Modal Imprimir -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title2 fs-5" id="exampleModalLabel"><i class="bi bi-file-pdf-fill"></i>  Imprimir Informes</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">


      
      <form action="reporte.php"  class="form-inline" method="POST" name="formFechas" id="formFechas">
      <div class="row">
            <div class="col-sm-3">
            <label for="">Elegir Personal</label>
                <select style="width: 100%;font-size:12px ; border-radius: 25px;border: 2px solid gray;" name="personal" id="select" class=" form-select" required >
                    <option value="jazmin">Jazmin Velasco Diaz </option>
                    <option value="mavel">Mavel Condori Flores</option>
                    <option value="ale">Alejandro Iglesias Raldes </option>
                    <option value="nicol">Mariana Nicol Erquicia Camacho </option>
                    <option value="edwin">Edwin Mario Pinto Ramirez </option>
                                                

                </select>
                                            
            </div>
            <div class="col-sm-3">
                <label for="">Fecha Inicio</label>
                <input style="border-radius: 25px;border: 2px solid gray;" class="form-control form-control-sm" type="date" name="fecha_inicio" id="" required > 
            </div>
            <div class="col-sm-3">
                <label for="">Fecha Final</label>
                <input style="border-radius: 25px;border: 2px solid gray;" class="form-control form-control-sm" type="date" name="fecha_final" id="" required >

            </div>
            

            

            <div class="col-sm-3">
                <label for=""><i class="bi bi-printer-fill"></i> Imprimir </label>
            <input class="btn btn-danger btn-sm w-100" type="submit" value="INFORME GENERAL" >
            </div>

                                        
            
            </div>
        </form>





        <form action="reporte2.php"  class="form-inline" method="POST" name="formFechas" id="formFechas">
      <div class="row">
            <div class="col-sm-3">
            <label for="">Elegir Personal</label>
                <select style="width: 100%;font-size:12px ; border-radius: 25px;border: 2px solid gray;" name="personal" id="select" class=" form-select" required >
                    <option value="jazmin">Jazmin Velasco Diaz </option>
                    <option value="mavel">Mavel Condori Flores</option>
                    <option value="ale">Alejandro Iglesias Raldes </option>
                    <option value="nicol">Mariana Nicol Erquicia Camacho </option>
                    <option value="edwin">Edwin Mario Pinto Ramirez </option>
                                                

                </select>
                                            
            </div>
            <div class="col-sm-3">
                <label for="">Fecha Inicio</label>
                <input style="border-radius: 25px;border: 2px solid gray;" class="form-control form-control-sm" type="date" name="fecha_inicio" id="" required > 
            </div>
            <div class="col-sm-3">
                <label for="">Fecha Final</label>
                <input style="border-radius: 25px;border: 2px solid gray;" class="form-control form-control-sm" type="date" name="fecha_final" id="" required >

            </div>
            

            

                                        
            <div class="col-sm-3 ">
                <label for=""> <i class="bi bi-printer-fill"></i> Imprimir </label>
                <input class="btn btn-danger btn-sm w-100 " type="submit" value="INF DE COTIZACIONES" >
            </div>
            </div>
        </form>

        <form action="reporte3.php"  class="form-inline" method="POST" name="formFechas" id="formFechas">
      <div class="row">
            <div class="col-sm-3">
            <label for="">Elegir Personal</label>
                <select style="width: 100%;font-size:12px ; border-radius: 25px;border: 2px solid gray;" name="personal" id="select" class=" form-select" required >
                    <option value="jazmin">Jazmin Velasco Diaz </option>
                    <option value="mavel">Mavel Condori Flores</option>
                    <option value="ale">Alejandro Iglesias Raldes </option>
                    <option value="nicol">Mariana Nicol Erquicia Camacho </option>
                    <option value="edwin">Edwin Mario Pinto Ramirez </option>
                                                

                </select>
                                            
            </div>
            <div class="col-sm-3">
                <label for="">Fecha Inicio</label>
                <input style="border-radius: 25px;border: 2px solid gray;" class="form-control form-control-sm" type="date" name="fecha_inicio" id="" required > 
            </div>
            <div class="col-sm-3">
                <label for="">Fecha Final</label>
                <input style="border-radius: 25px;border: 2px solid gray;" class="form-control form-control-sm" type="date" name="fecha_final" id="" required >

            </div>
            

    

            <div class="col-sm-3">
                <label for=""><i class="bi bi-printer-fill"></i> Imprimir </label>
                <input class="btn btn-danger btn-sm w-100 " type="submit" value="INF DE PROYECTOS" >
            </div>
            </div>
        </form>


 

        

        
                                        
                                        
                                        

                                        
                                            
                                        

                                        
                                    
                                        
                                        
                                       

                                    

           
                                
                                 
                                
        

        

       


        
      </div>
      
    </div>
  </div>
</div>
















<!-- 
            <div class="col-sm-2">
                <a class="btn btn-danger w-100" style="background-color: cadetblue;border:none;" href="http://localhost/poncelet-sis/sistema/cotizador/"><i class="bi bi-file-earmark-ruled"></i> Cotizador Poncelet </a>
                
            </div> -->

            
            
            
        </div>

        <P></P>

        

        
        
        <hr>


        <div class="row">
            <div class="col-sm-8">

                <button type="" class="btn btn-secondary"> </button> <span style="font-size: small;"> Total Proyectos </span> &nbsp;&nbsp;&nbsp;
                <button type="" class="btn btn-success"></button>   <span style="font-size: small;"> Adjudicados </span>&nbsp;&nbsp;&nbsp;
                <button type="" class="btn btn-danger"></button>  <span style="font-size: small;"> No Adjudicados </span>&nbsp;&nbsp;&nbsp;
                <button type="" class="btn btn-warning"></button>  <span style="font-size: small;"> Proyecto En Proceso</span> &nbsp;&nbsp;&nbsp;
                <button style="background-color: #61a1fe;border: blue 1px solid;" type="" class="btn btn-primary"> </button> <span style="font-size: small;"> Proyectos Pagados</span> &nbsp;&nbsp;&nbsp;

            </div>
            

            <div class="col-sm-4">

                <div class="col">
                    <a class="btn btn-outline-danger w-100  " href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"> <i class="bi bi-file-pdf-fill"></i> Imprimir Informes   </a>
                
                    
                </div>

                <div class="col ">
                    
                    <div class="">
                        <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary  w-100" data-bs-toggle="modal" data-bs-target="#modalproyectos" id="botonCrear">
                            <i class="fa-solid fa-plus"></i> Nuevo Proyecto
                            </button>
                            
                    </div>
                </div>

            </div>
        </div>


        <hr >

        

        <div class="table-responsive" style="font-size: 10px; width:100%">
            <table id="datos_usuario" class="table table-hover table-striped table-bordered" style="width:100%; text-align:center-," >
                <thead>
                    <tr>
                        <th style="padding:5px;">ID</th>
                        <th width="10%" style="padding:5px;">RUBRO</th>
                        <th width="20%" style="padding:5px;">NOMBRE PROYECTO</th>
                        
                        <th style="padding:5px;">UBICACION</th>
                        <th width="10%" style="padding:5px;">MONTO REFERENCIA</th>
                        <th width="10%" style="padding:5px;">MONTO OFERTADO</th>
                        <th style="padding:5px;">FECHA PRESENTACION</th>
                        <th style="padding:5px;">POSICION</th>
                        <th style="padding:5px;">TIPO</th>
                        <th style="padding:5px;">OBSERVACION</th>
                        
                        <th width="10%" style="padding:5px;">IDENTIFICACIONES</th>
                        <th style="padding:5px;" >ESTADO</th>
                        
                        <th width="7%" style="padding:5px;">ENCARGADO</th>
                        <th width="30%" style="padding:5px;" >PARTICIPACION</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

<!-- FINAL tabla--> 

<!-- Modal NUEVO -->
<div class="modal fade" id="modalproyectos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="fa-solid fa-box"></i> Registro de proyectos</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="background-color: azure;"></button>
            </div>
            
                <form action="" method="POST" id="formulario" enctype="multipart/form-data">


                    
                    <div class="modal-content">

                    <div class="modal-body">

                    

                 
                    <div class="row">
                    

                    <div class="col-4">
                            <span for="inputFirstName">Rubro </span>
                            <select name="rubro" id="rubro" class="form-select form-select-sm">
                                
                                <option value="COMERCIALIZADORA">COMERCIALIZADORA</option>
                                <option value="CONSTRUCTORA">CONSTRUCTORA</option>
                            </select>
                        </div>

                        <div class="col-12">
                            <span for="inputFirstName">Nombre Proyecto o Descripcion </span>
                            <input class="form-control form-control-sm  bg-opacity-10" name="nombre" id="nombre" type="text" value="" required />
                        </div>
                        
                        <div class="col-4">
                            <span for="inputFirstName">Lugar (Ubicacion) </span>
                            <input class="form-control form-control-sm  bg-opacity-10" name="ubicacion" id="ubicacion" type="text" value="" required />
                        </div> 

                        <div class="col-4">
                            <span for="inputFirstName">Modalidad </span>
                            <select name="tipo" id="tipo" class="form-control form-control-sm">
                                <option value="">Selecciona una Opcion</option>
                                <option value="COTIZACION">COTIZACION</option>
                                <option value="COMPRA DIRECTA">COMPRA DIRECTA</option>
                                <option value="CONTRATACION DIRECTA">CONTRATACION DIRECTA</option>
                                <option value="CM">CM</option>
                                <option value="ANPE">ANPE</option>
                                <option value="ANPP">ANPP</option>
                                <option value="LP">LP</option>
                            </select>
                        </div>

                        <div class="col-4">
                            <span for="inputFirstName">Tipo </span>
                            <select name="tipo2" id="tipo2" class="form-control form-control-sm">
                                <option value="">Selecciona una Opcion</option>
                                <option value="Items">POR ITEMS</option>
                                <option value="Total">POR EL TOTAL</option>
                                <option value="Lotes">POR LOTES</option>
                                
                            </select>
                        </div>
  
                        <div class="col-4">
                            <span for="inputFirstName">Fecha </span>
                            <input class="form-control form-control-sm  bg-opacity-10" name="fecha" id="fecha" type="date" value="" required />
                        </div>

                       

                        <div class="col-4">
                                <span for="inputFirstName">N° CUCE </span>
                                <input class="form-control form-control-sm  bg-opacity-10" name="cuce" id="cuce" type="text" value="" />
                        </div>

                        <div class="col-4">
                                <span for="inputFirstName">N° tramite </span>
                                <input class="form-control form-control-sm  bg-opacity-10" name="tramite" id="tramite" type="text" value="" />
                        </div>
                        

                        <div class="col-4">
                            <span for="inputFirstName">N° Comprobante </span>
                            <input class="form-control form-control-sm  bg-opacity-10" name="comprobante" id="comprobante" type="text" value="" />
                        </div>

                        

                        <div class="col-4">
                            <span for="inputFirstName">Monto Referencial</span>
                            <input id="monto" step="0.01" style="background-color: #e5ffe0; color:green; font-weight: 600;" class="form-control form-control-sm  bg-opacity-10" placeholder="0"  name="monto" type="text" value=""  />
                        </div>

                        <div class="col-4">
                            <span for="inputFirstName">Monto Ofertado</span>
                            <input id="monto_ofertado" style="background-color: #e5ffe0; color:green; font-weight: 600;" class="form-control form-control-sm  bg-opacity-10" placeholder="0"  name="monto_ofertado" type="text" value=""  />
                        </div>


                        <div class="col-4">
                                <span for="inputFirstName">Estado</span>
                                <select name="estado" id="estado" class="form-control form-control-sm " required>
                                        <option value="">Selecciona una Opcion</option>
                                        <option  value="proceso">En Proceso</option>
                                        <option  value="adjudicado">Adjudicado</option>
                                        <option  value="pagado">Pagado</option>
                                        <option  value="no">No Adjudicado</option>
                                </select>
                        </div>

                        <div class="col-4">
                            <span for="inputFirstName">POSICION </span>
                            <select name="posicion" id="posicion" class="form-control form-control-sm">
                                <option value="">Selecciona una Opcion</option>
                                <option value="1° LUGAR">1° LUGAR</option>
                                <option value="2° LUGAR">2° LUGAR</option>
                                <option value="3° LUGAR">3° LUGAR</option>
                                <option value="4° LUGAR">4° LUGAR</option>
                                <option value="5° LUGAR">5° LUGAR</option>
                                <option value="6° LUGAR">6° LUGAR</option>
                                <option value="7° LUGAR">7° LUGAR</option>
                                <option value="8° LUGAR">8° LUGAR</option>
                                <option value="9° LUGAR">9° LUGAR</option>
                                <option value="10° LUGAR">10° LUGAR</option>
                                <option value="11° LUGAR">11° LUGAR</option>
                                <option value="12° LUGAR">12° LUGAR</option>
                                <option value="13° LUGAR">13° LUGAR</option>
                                <option value="14° LUGAR">14° LUGAR</option>
                               
                            </select>
                        </div>

                        <div class="col-12">
                            <span for="inputFirstName">Observaciones </span>
                            
                            <input class="form-control form-control-sm  bg-opacity-10" id="observacion" name="observacion" type="text" value="">
                        </div>

                        <p></p>
                        <hr>

                        <h6>Participantes en Proyecto</h6>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Importante!</strong> Mencionar los trabajos colaborados en el proyecto ejemplo: Certificado C-1
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>

                        <div class="col-12">
                                <span for="inputFirstName"><i class="bi bi-star-fill"></i> Encargado de Proyecto</span>
                                <select name="encargado" id="encargado" class="form-control form-control-sm " required>
                                        <option value="">Selecciona una Opcion</option>
                                        <option value="jazmin">Jazmin Velasco Diaz </option>
                                                <option value="mavel">Mavel Condori Flores</option>
                                                <option value="ale">Alejandro Iglesias Raldes </option>
                                                <option value="nicol">Mariana Nicol Erquicia Camacho </option>
                                                <option value="edwin">Edwin Mario Pinto Ramirez </option>
                                </select>
                        </div>


                        <div class="col-6">
                            <span for="inputFirstName">Jazmin </span>
                            <input class="form-control form-control-sm  bg-opacity-10" id="jazmin" name="jazmin" type="text" value=""  />
                        </div>

                        

                        <div class="col-6">
                            <span for="inputFirstName">Mavel </span>
                            <input class="form-control form-control-sm  bg-opacity-10" id="mavel" name="mavel" type="text" value=""  />
                        </div>

                        

                        <div class="col-6">
                            <span for="inputFirstName">Nicol </span>
                            <input class="form-control form-control-sm  bg-opacity-10" id="nicol" name="nicol" type="text" value=""  />
                        </div>

                        

                        <div class="col-6">
                            <span for="inputFirstName">Alejandro </span>
                            <input class="form-control form-control-sm  bg-opacity-10" id="ale" name="ale" type="text" value=""  />
                        </div>

                        

                        <div class="col-6">
                            <span for="inputFirstName">Edwin</span>
                            <input class="form-control form-control-sm  bg-opacity-10" id="edwin" name="edwin" type="text" value=""  />
                        </div>

                        <br>

                        

                        

                       

                        

                        
                        
                        

                        



                        

                        

                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id_pro" id="id_pro">
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

                
                $("#botonCrear").click(function(){
                $("#formulario")[0].reset();
                $(".modal-title").text("Crear Proyecto");
                $("#action").val("Crear Proyecto");
                $("#operacion").val("Crear");
            });
            
            var dataTable = $('#datos_usuario').DataTable({
                "pageLength": 25,
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

    
            
            //Aquí código inserción
            $(document).on('submit', '#formulario', function(event){
            event.preventDefault();
            var nombre = $('#nombre').val();
            var rubro = $('#rubro').val();
            var ubicacion = $('#ubicacion').val();
            var tipo = $('#tipo').val();
            var tipo2 = $('#tipo2').val();
            var fecha = $('#fecha').val();
            var cuce = $('#cuce').val();
            var tramite = $('#tramite').val();
            var comprobante = $('#comprobante').val();
            var monto = $('#monto').val();
            var monto_ofertado = $('#monto_ofertado').val();
            var estado = $('#estado').val();
            var posicion = $('#posicion').val();
            var observacion = $('#observacion').val();
            var encargado = $('#encargado').val();
            var jazmin = $('#jazmin').val();
            var mavel = $('#mavel').val();
            var nicol = $('#nicol').val();
            var ale = $('#ale').val();
            var edwin = $('#edwin').val();
            	
		    if(nombre != '' && ubicacion != '' && tipo != '' && fecha != '' && tipo2 != '' && estado != '')
                {
                    $.ajax({
                        url:"crear.php",
                        method:'POST',
                        data:new FormData(this),
                        contentType:false,
                        processData:false,
                        success:function(data)
                        {
                            Swal.fire(
                            'Exitoso!',
                            'Se registro correctamente',
                            'success'
                            ),
                            $('#formulario')[0].reset();
                            $('#modalproyectos').modal('hide');
                            dataTable.ajax.reload();
                        }
                    });
                }
                else
                {
                    Swal.fire(
                    'Algunos Campos son Obligatorios ?',
                    'Revisa el formulario',
                    'warning'
                    );
                }
	        });


            //Funcionalidad de editar
            $(document).on('click', '.editar', function(){		
            var id_pro = $(this).attr("id");		
            $.ajax({
                url:"obtener_registro.php",
                method:"POST",
                data:{id_pro:id_pro},
                dataType:"json",
                success:function(data)
                    {
                        
                        //console.log(data);				
                        $('#modalproyectos').modal('show');
                        
                        $('#nombre').val(data.nombre);
                        $('#rubro').val(data.rubro);
                        $('#tipo').val(data.tipo);
                        $('#tipo2').val(data.tipo2);
                        $('#ubicacion').val(data.ubicacion);
                        $('#tramite').val(data.num_tramite);
                        $('#comprobante').val(data.num_comprobante);
                        $('#cuce').val(data.cuce);
                        $('#monto').val(data.monto);
                        $('#monto_ofertado').val(data.monto_ofertado);
                        $('#fecha').val(data.fecha);
                        $('#estado').val(data.estado);
                        $('#posicion').val(data.posicion);
                        $('#observacion').val(data.observacion);
                        $('#encargado').val(data.encargado);
                        $('#mavel').val(data.mavel);
                        $('#ale').val(data.ale);
                        $('#jazmin').val(data.jazmin);
                        $('#nicol').val(data.nicol);
                        $('#edwin').val(data.edwin);
                        $('.modal-title').text("Editar Proyecto");
                        $('#id_pro').val(id_pro);
                    
                        $('#action').val("Editar");
                        $('#operacion').val("Editar");
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                    }
                })
	        });

            //Funcionalidad de borrar
            $(document).on('click', '.borrar', function(){
                var id_pro = $(this).attr("id");

                Swal.fire({
                title: 'Esta Seguro de Borrar ?',
                text: "El Registro con el ID = " + id_pro,
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
                        data:{id_pro:id_pro},
                        success:function(data)
                        {
                            dataTable.ajax.reload();
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
        

        
        
       


        </body>
</html>