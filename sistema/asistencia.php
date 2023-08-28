<?php
    
    session_start();
    include "../conexion.php";

    $num =0;

    $query = mysqli_query($conexion, "SELECT * FROM asistencias");
    $result = mysqli_num_rows($query);
    if ($result > 0) {
        while ($data = mysqli_fetch_array($query)) {
             $num = $data['id_asistencia'];
             
        }}

        $sql_tfila = mysqli_query($conexion, "SELECT COUNT(id_asistencia) FROM asistencias;");
        $result_f = mysqli_fetch_array($sql_tfila);
        $total2 = $result_f['COUNT(id_asistencia)'];
        $total3 =  $total2 + 1;


    if (!empty($_POST)) {


        if (empty($_POST['tipo'])) {
            $alert = '<p class="alert alert-danger "> Llenar campos faltantes</p> ';
       } 
       else 
     {
            
            $Tipo = $_POST['tipo'];
            $Usuario = $_SESSION['iduser'];
            $Obs = $_POST['obs'];
            
            $num = $total2 +1;

            

                    $query_insert = mysqli_query($conexion, "INSERT INTO asistencias ( tipo_registro, observacion_asis, usuario_id) 
                                                                VALUES ( '$Tipo', '$Obs', $Usuario);");


            if ($query_insert) {
                 
                $alert = '<p  class="alert alert-success" > Registrado Correctamente !! </p> ';
                $url ="asistencia.php"; // aqui pones la url
                $tiempo_espera = 4; // Aquí se configura cuántos segundos hasta la actualización.
                // Declaramos la funcion apra la redirección
                header("refresh: $tiempo_espera; url=$url");
                
               
                //header("Location: asistencia.php");

            }else{
                $alert = '<p class="alert alert-danger "> El registro fallo </p> ';
            }
            
        
}

}




?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <?php include "includes/scripts.php";?>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        
        <title>SISPONCELET</title>
        
    </head>
    <body class="sb-nav-fixed">
    <?php include "includes/header.php";?>
    

        <!-- contenido del sistema-->

        <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                    <div class="container-fluid px-4 ">
                
                <h1 class="mt-4 col"><i class="fa-solid fa-clipboard-user"></i>  
                <strong>Control de </strong><span style="color:#fd6f0a;"> Asistencias Personal   </span> </h1>
                  <hr>
                        
                        
                        
                        <hr>

                        
                                                    
                        

                        
                       <!-- contenido del sistema 2--> 
                        <!-- formulario de registro de usuarios-->


                        <div class="row">
                        
                        
                        <div class="col-md-4">
                        
                        





                        <form action="asistencia.php" method="post" class="fields was-validated " enctype="multipart/form-data"  novalidate >

                        

                        <div class="row" style="background-color: #f7f7f7; padding: 20px; border-radius: 25px;">
                            

                        

                        <div class="container-clock">
                            <p id="date">date</p>
                            <h1 id="time">00:00:00</h1>
                            
                           
                        </div>

                           <hr>
                           <hr>
                           

                            

                             
                            <a class="btn alert alert-dark font-weight-bold  disabled" role="button" aria-disabled="true"> <strong> N° de registro :  <?php echo $total3 ?> </strong></a>
                            
                            <div class="col-md-12">
                                <div class=" mb-3 mb-md-0">
                                    <span for="inputFirstName">Tipo de Registro</span> 
                                    <select name="tipo" class="form-select form-select-sm" required >
                                        <option value="" >Seleccione una opcion: </option>
                                        <option value="entrada" >Entrada </option>
                                        <option value="salida" >Salida </option>
                                    </select>
                                   
                                </div>
                            </div>

                            

                            

                            

                            

                            <div class="col-md-12">
                                <div class=" mb-3 mb-md-0">
                                <span for="inputFirstName">Observacion</span> 
                                <input type="text" class="form-control form-control-sm"  name="obs"  >
                                </div>
                            </div> 

                            

                            
                        </div>




                            <hr class="w-100">
                            <!-- selector--> 

                            
                            

                            <div class="row">
                                <div class="" role="alert" style=""> <?php echo isset ($alert) ? $alert :''; ?></div>
                                
                                <button id="noti" type="submit" value="Registrar  " class="btn btn-primary  border-0 " data-dismiss="alert" >Registrar</button>
                                   
                                
                            </div>

                            <hr>

                            
                            
                            
                                    


                            
                        </form>

                        </div>

                        

                        <div class="col">
                        
                            <div class="">


                            <nav class="bg-light">
                                <div class="container-fluid" style="BACKGROUND-COLOR: #e1e1e1;padding: 15px;text-align: center;">
                                     <h4 style=" padding:5px;text-align: initial;background-color: #e9e9e9; "> <i class="fa-solid fa-print"></i> Reporte Por Fechas de Asistencias </h4>
                                    <form action="reporte_asis.php"  class="form-inline row" method="POST" name="formFechas" id="formFechas">
                                        <div class="col-sm-3">
                                        <label for="">Elegir Personal</label>
                                            <select style="width: 100%;font-size:12px ; border-radius: 25px;border: 2px solid gray;" name="personal" id="select" class=" form-select" required >
                                                <option value="" >Seleccione una opción : </option>
                                                <?php
                                                    $query = mysqli_query($conexion, "SELECT * from usuario WHERE estatus = 1 ORDER BY nombre ASC;");
                                                    $result = mysqli_num_rows($query);
                                                    if ($result > 0) {
                                                    while ($data = mysqli_fetch_array($query)) {
                                                        echo '<option value="'.$data['idusuario'].'">'.$data['nombre'].'</option>';
                                                        
                                                    }}
                                                ?>

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
                                            <label for="">Imprimir</label>
                                            <center>
                                            <button style="font-size:12px;border-radius: 8px;border: 1px solid red;" type="submit" class="    ">
                                            Reporte de Asistencias <img src="img/PDF.svg" height="30px" width="30px" >  
                                            </button>
                                            </center>
                                        </div>
                                        

                                        
                                            
                                        

                                        
                                    
                                        
                                        
                                       

                                    </form>
                                </div>

                                <hr>
                                </nav>















                            

                            

                                
                            
                            <table>
                            <table id="tablas"  class="table table-bordered table-hover table-responsive" style="font-size:11px ;">
                                <thead class="table-secondary">
                                    <tr class="">
                                        
                                        <th> # CODIGO </th>
                                        <th>Usuario</th>
                                        <th>Tipo de Registro</th>
                                        <th>Fecha y Hora</th>
                                        <th>Observaciones</th>
                                        <?php 
                                        if ($_SESSION['iduser'] == 1) {
                                            
                                        ?>
                                        <th>Acciones</th> 

                                        <?php 
                                        
                                      }      
                                ?>

                                    </tr>
                                    </thead>
                                    <?php
                    
                                    // rescatar datos DB 
                                    //$query = mysqli_query($conexion, "SELECT * FROM gastos
                                    //ORDER BY id_gasto DESC;");

                                    $query = mysqli_query($conexion, "SELECT asistencias.id_asistencia, 
                                                                            asistencias.fecha_asis,
                                                                            asistencias.tipo_registro,
                                                                            asistencias.observacion_asis,
                                                                            asistencias.usuario_id,
                                                                            usuario.nombre
                                                                        FROM asistencias
                                                                        JOIN usuario ON asistencias.usuario_id = usuario.idusuario
                                                                        order by asistencias.id_asistencia DESC limit 50 ;");

                                

                                    $result = mysqli_num_rows($query);
                                    if ($result > 0) {
                                        while ($data = mysqli_fetch_array($query)) {

                                    ?>

                            <tr>
                                <td><?php echo 'COD-'.$data['id_asistencia'] ?></td>
                                <td><?php echo $data['nombre'] ?></td>
                                <td>
                                    <?php
                                        if ($data['tipo_registro'] == 'salida') {
                                    ?>
                        
                                    <div class="alert alert-danger alert-sm" style = "margin: 0;">

                                    <?php
                                            echo "SALIDA"; 
                                        }else{
                                    
                                    ?> 
                                    </div>

                                    <div class="alert alert-success alert-sm" style = "margin: 0;">
                                    
                                    <?php
                                    
                                        echo "ENTRADA";
                                    }

                                    ?>
                                    </div>
                                </td>
                                
                                
                                <td>
                                    <?php 

                                        

                                        

                                        
                                        setlocale(LC_TIME, "spanish");
                                        //echo $data['fecha_ejecucion']
                                        
                                        $fech = strftime('<span class="text-success">'.' %e de %B %Y  </span> |  %H:%M:%S', strtotime($data['fecha_asis']));
                                        

                                    
                                         
                                         echo $fech;
                                    ?>
                                </td>
                                <td><?php echo $data['observacion_asis'] ?></td>
                                
                                
                                    <?php 
                                        if ($_SESSION['iduser'] == 1) {
                                            
                                    ?>

                                <td class="col-sm-2">

                                <div style="min-width: max-content;">
                                    
                                    
                                
                                    

                                    
                                    <a data-bs-toggle="modal" data-bs-target="#exampleModali<?php echo $data['id_asistencia']; ?> " class="btn btn-outline-danger btn-sm" href=""><i class="fa-solid fa-trash"></i> </a>
                                    <a data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $data['id_asistencia']; ?> " class="btn btn-outline-warning btn-sm" href=""><i class="fa-solid fa-pencil"></i> </a>
                                    
                                    
                                </div>
                                    
                                    
                                    
                                </td>
                                <?php 
                                        
                                      }      
                                ?>
                            </tr>

                            <!-- Modal editar  -->
                            <div class="modal fade" id="exampleModal<?php echo $data['id_asistencia']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="editar_asistencia.php" method="post">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Editar registro de : <?php echo $data['nombre'] ?> </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="card-header text-center " style="padding: 0; margin: 0;">
                                            <input type="hidden" name="eid_inv" value="<?php echo $data['id_asistencia']; ?>" >
                                            <label for="">Fecha y hora </label>
                                            <input name="efecha" class="form-control" style="text-align: center;" type="text" value=" <?php echo $data['fecha_asis'] ?>">
                                             
                                            </div>
                                                <div class="card-body " style="padding: 0;margin: 0;">

                                                    

                                                    <div class="alert alert-warning alert-dismissible fade show" role="alert"> 
                                                    <strong> Observaciones </strong> <input class="form-control form-control-sm" style="text-align: center;" type="text"  
                                                    id="dos" name="eobs" value="<?php echo $data['observacion_asis'] ?>" >
                                                        
                                                    </div>
                                                    
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                            <input type="submit" value="Actualizar Registros">
                                        </div>

                                        </form>
                                        </div>
                                    </div>
                                    </div>

                            <!-- Modal eliminar  -->
                            <div class="modal fade " id="exampleModali<?php echo $data['id_asistencia']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content  bg-opacity-80">
                                            <form action="eliminar_asistencia.php" method="post">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Eliminar registro de : <?php echo $data['nombre'] ?> </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="card-header text-center " style="padding: 0; margin: 0;">
                                            <input type="hidden" name="idAsis" value="<?php echo $data['id_asistencia']; ?>" >
                                            
                                            <input name="ename" class="form-control" style="text-align: center;" type="text" value=" <?php echo $data['fecha_asis'] ?> " disabled>
                                            
                                             
                                            </div>
                                                
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                            <input class="btn btn-danger" type="submit" value="Eliminar">
                                        </div>

                                        </form>
                                        </div>
                                    </div>
                                    </div>


                    <?php

                        }
                    }
                    ?>

                                    
                            </table>
                            

                            </div>
                        </div>







                        </div>




                        </div>
                        <!-- Modal para  ver imagenes -->
                <div class="modal fade" id="gallery-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered " > 
                    <div class="modal-content modal-fullscreen ">
                    <div class="modal-header">
                        <!--<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>-->
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" >
                        <img src="img/actas/acta_103_1_2021-02-22.jpg" class="modal-img" alt="modal img">
                    </div>
                    
                    </div>
                </div>
                </div>



                    
                        

                        
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; poncelet.bo@gmail.com @leiglesSoft</div>
                            <div>
                                
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

        <script>
        $(document).ready(function () {
        $('#tablas').DataTable({
            
            order: [[0, 'desc']],
            pageLength: 5,
            lengthMenu: [
                [5, 10, 25,50,200, -1],
                [5, 10, 25,50,00, 'All'],
            ],
            language:{
                url:'js/Spanish.json'
            }
        });
    });
</script>

      
        <script type="text/javascript">
           $(document).ready(function(){
            $('noti').click(function(){
                alertify.success("Registro Exitoso");
            });
           })
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
        <script>
            function archivo(evt) {
                var files = evt.target.files; // FileList object
                
                    //Obtenemos la imagen del campo "file". 
                for (var i = 0, f; f = files[i]; i++) {         
                    //Solo admitimos imágenes.
                    if (!f.type.match('image.*')) {
                            continue;
                    }
                
                    var reader = new FileReader();
                    
                    reader.onload = (function(theFile) {
                        return function(e) {
                        // Creamos la imagen.
                                document.getElementById("list").innerHTML = ['<img class="form-control" style="max-width:400px;" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
                        };
                    })(f);
            
                    reader.readAsDataURL(f);
                }
            }
                        
                document.getElementById('files').addEventListener('change', archivo, false);
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
        
            <script> 
               function validar(e) {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Your work has been saved',
                    showConfirmButton: false,
                    timer: 1500
                    })
                    }
                </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
        
    </body>
</html>