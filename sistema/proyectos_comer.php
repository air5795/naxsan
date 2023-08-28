<?php

session_start();
include "../conexion.php";

$num = 0;

$query = mysqli_query($conexion, "SELECT * FROM proyectos_comer");
$result = mysqli_num_rows($query);
if ($result > 0) {
    while ($data = mysqli_fetch_array($query)) {
        $nume = $data['id_pro'];
    }
}

$sql_tfila = mysqli_query($conexion, "SELECT COUNT(id_pro) FROM proyectos_comer;");
$result_f = mysqli_fetch_array($sql_tfila);
$total2 = $result_f['COUNT(id_pro)'];
$total3 =  $total2 + 1;


if (!empty($_POST)) {


    if (
        empty($_POST['nombre'])
        || empty($_POST['monto'])
        || empty($_POST['estado'])
        || empty($_POST['ubi'])
        || empty($_POST['fecha'])
    ) {
        $alert = '<p class="alert alert-danger "> Llenar campos faltantes</p> ';
    } else {
        $Nombre       = $_POST['nombre'];
        $Monto          = $_POST['monto'];
        $Estado         = $_POST['estado'];
        $Ubicacion         = $_POST['ubi'];
        $Cuce       = $_POST['cuce'];
        $Tramite       = $_POST['tramite'];
        $Fecha       = $_POST['fecha'];
        $Comprobante           = $_POST['comprobante'];
        $Obs      = $_POST['obs'];

        $num            = $total2 + 1;

        $num2           = $total2;


        



        $query_insert = mysqli_query($conexion, "INSERT INTO proyectos_comer(
                        nombre,
                        ubicacion,
                        num_tramite,
                        num_comprobante,
                        cuce,
                        monto,
                        fecha,
                        estado,
                        observacion
                    )
                    VALUES(
                        '$Nombre',
                        '$Ubicacion',
                        '$Tramite',
                        '$Comprobante',
                        '$Cuce',
                        '$Monto',
                        '$Fecha',
                        '$Estado',
                        '$Obs'

                    )");


        if ($query_insert) {
            
            $alert = '<p class="alert alert-success"> Guardado Correctamente </p> ';
            header("Location: proyectos_comer.php");
        } else {
            $alert = '<p class="alert alert-danger "> El registro fallo </p> ';
        }
    }
}




?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <?php include "includes/scripts.php"; ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>SISPONCELET</title>

</head>

<body class="sb-nav-fixed">
    <?php include "includes/header.php"; ?>


    <!-- contenido del sistema-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <div class="container-fluid px-4 ">

                    <h1 class="mt-4 col"><i class="fa-solid fa-chart-simple"></i> <strong>Seguimiento de PAGO a </strong><span style="color:#fd6f0a;"> Proyectos PONCELET </span></h1>

                    <hr>

                    <!-- contenido del sistema 2-->
                    <!-- formulario de registro de usuarios-->

                    <div class="row">
                    <p>
                                        
                    </p>
                    <div class="collapse" id="collapseExample2">
                    <div class="card card-body">

                    <?php
                            $query = mysqli_query($conexion, "SELECT monto,fecha,nombre FROM proyectos_comer where estado = 'proceso' order by fecha DESC limit 10");
                            foreach ($query as $data) {
                                $monto[]    = $data['monto'];
                                //$fecha[]    = $data['fecha'];
                                $nombre[]   = $data['nombre'].' FECHA: '.$data['fecha'];

                            }

                        ?>

                        

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-area me-1"></i>
                                Seguimiento de Proyectos 
                            </div>
                            <div class="card-body"><canvas id="myChart" width="100%" height="30"></canvas></div>
                            <div class="card-footer small text-muted">Actualizacion <?php echo date('d/m/y');?></div>
                        </div>
                        
                    </div>
                    </div>







                        <p>
                        <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                        <i class="fa-solid fa-list-check"></i> Registrar Nuevo Proyecto Para Seguimiento 
                        </a>

                        <a class="btn btn-secondary" data-bs-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample">
                        <i class="fa-solid fa-chart-area"></i> Mostrar Graficamente 
                        </a>    
                        
                        </p>
                        <div class="collapse" id="collapseExample">


                        <div class="card card-body">

                        <div class="">

                            <form action="proyectos_comer.php" method="post" class="fields was-validated " enctype="multipart/form-data" novalidate>



                                <div class="row" style="background-color: #ecfbfd;">



                                    <a class="btn alert alert-dark font-weight-bold  disabled" role="button" aria-disabled="true"> <strong> N° de registro: <?php echo $total3 ?> </strong></a>
                                    <div class="col-md-4">
                                        <div class=" mb-3 mb-md-0">
                                            <span for="inputFirstName">Nombre Proyecto </span>
                                            <input class="form-control form-control-sm  bg-opacity-10" name="nombre" type="text" value="" required />
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class=" mb-3 mb-md-0">
                                            <span for="inputFirstName">Lugar (Ubicacion) </span>
                                            <input class="form-control form-control-sm  bg-opacity-10" name="ubi" type="text" value="" required />
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class=" mb-3 mb-md-0">
                                            <span for="inputFirstName">Fecha </span>
                                            <input class="form-control form-control-sm  bg-opacity-10" name="fecha" type="date" value="" required />
                                        </div>
                                    </div>

                                    

                                    <div class="col-md-2">
                                        <div class=" mb-3 mb-md-0">
                                            <span for="inputFirstName">Monto</span>
                                            <input oninput="calcular_a_bs()" id="monto" style="background-color:#c9ffc9;" class="form-control form-control-sm  bg-opacity-10" placeholder="0"  name="monto" type="text" value="" required />
                                        </div>
                                    </div>

                                    


                                    <div class="col-md-2">
                                        <label for="tipo">Estado </label>
                                        
                                        <select name="estado" id="estado" class="form-control form-control-sm " required>
                                            <option value="">Selecciona una Opcion</option>
                                            <option  value="proceso">En Proceso</option>
                                            <option  value="pagado">Pagado</option>
                                        </select>
                                    </div>



                                    

                                    

                                    <div class="col-md-2">
                                        <div class=" mb-3 mb-md-0">
                                            <span for="inputFirstName">CUCE </span>
                                            <input class="form-control form-control-sm  bg-opacity-10" name="cuce" type="text" value="" />
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class=" mb-3 mb-md-0">
                                            <span for="inputFirstName">N° tramite </span>
                                            <input class="form-control form-control-sm  bg-opacity-10" name="tramite" type="text" value="" />
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class=" mb-3 mb-md-0">
                                            <span for="inputFirstName">N° Comprobante </span>
                                            <input class="form-control form-control-sm  bg-opacity-10" name="comprobante" type="text" value="" />
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class=" mb-3 mb-md-0">
                                            <span for="inputFirstName">Observacion </span>
                                            <input class="form-control form-control-sm  bg-opacity-10" name="obs" type="text" value="" />
                                        </div>
                                    </div>






                                    

                                    <div class="row">
                                        <div class="" role="alert" style=""> <?php echo isset($alert) ? $alert : ''; ?></div>

                                        <input class="btn  btn-primary m-2  " type="submit" value="Registrar Proyecto" data-dismiss="alert">

                                    </div>




                                </div>











                                <hr>

                                <div class="col-md-12">
                                    <div class="" id="">
                                        <center>

                                            <output id="list" class="form-control "></output>

                                        </center>


                                    </div>
                                </div>






                            </form>

                        </div>
                            
                        </div>
                        </div>


                        

                        <?php

                        $sql_tfilas = mysqli_query($conexion, "SELECT COUNT(*) FROM proyectos_comer;");
                        $result_fs = mysqli_fetch_array($sql_tfilas);
                        $totales = $result_f['COUNT(id_pro)']; ?>

                        <div class="">

                            <div class="">

                                <nav class="navbar bg-light">
                                    <div class="container-fluid ">
                                        <a class="navbar-brand text-black"> <i class="fa-solid fa-table-list"></i> Lista de Proyectos </a>
                                        <form class="d-flex" role="search">





                                            <button style="margin:2px;" class="btn btn-sm btn-secondary" type="submit"> <strong> TOTAL PROYECTOS : </strong> <?php echo $totales; ?> </button>
                                            
                                            <a href="ssreporte_inventario.php" class="btn btn-danger btn-sm" style="margin:2px;"> <i class="fa-solid fa-print"></i> Imprimir Reporte de proyectos</a>
                                        </form>
                                    </div>
                                </nav>



                                <table class="table table-bordered table-hover">
                                    <table id="tablas"  class="table table-bordered table-hover" style="font-size:11px ;">
                                        <thead class="table-secondary">
                                            <tr class="">

                                                <th>CODIGO</th>
                                                <th width="20%">NOMBRE DE PROYECTO </th>
                                                <th>UBICACION</th>
                                                <th>N° DE TRAMITE</th>
                                                <th>N° DE COMPROBANTE</th>
                                                <th>N° DE CUCE</th>
                                                <th>MONTO (BS)</th>
                                                <th width="10%">FECHA</th>
                                                <th width="10%">ESTADO</th>
                                                <th>OBSERVACIONES</th>




                                                <th width="5%">Acciones</th>
                                            </tr>
                                        </thead>
                                        <?php

                                        // rescatar datos DB 
                                        //$query = mysqli_query($conexion, "SELECT * FROM gastos
                                        //ORDER BY id_gasto DESC;");

                                        $query = mysqli_query($conexion, "SELECT * FROM proyectos_comer order by id_pro DESC;");



                                        $result = mysqli_num_rows($query);
                                        if ($result > 0) {
                                            while ($data = mysqli_fetch_array($query)) {

                                                if ($data['estado'] == 'proceso') {
                                                    $color = '#ffffcb';
                                                    $color2 = 'yellow';
                                                    $texto = 'black';
                                                    $imagen = '<i class="fa-solid fa-triangle-exclamation"></i> En Proceso';
                                                }
                                                else {
                                                    $color = '#c6ffc6';
                                                    $color2 = 'green';
                                                    $texto = 'white';
                                                    $imagen = '<i class="fa-solid fa-square-check"></i> Pagado';
                                                }
                                                
                                        ?>

                                                <tr style="background-color:<?php echo $color ?> ;">
                                                    <td><?php echo $data['id_pro'] ?></td>
                                                    <td><?php echo $data['nombre'] ?></td>
                                                    <td><?php echo $data['ubicacion'] ?></td>
                                                    <td><?php echo $data['num_tramite'] ?></td>
                                                    <td><?php echo $data['num_comprobante'] ?></td>
                                                    <td><?php echo $data['cuce'] ?></td>
                                                    <td><?php echo $data['monto'] ?></td>
                                                    <td><?php 

                                                            setlocale(LC_TIME, "spanish");
                                                            //echo $data['fecha_ejecucion']
                                                            echo strftime('%e de %B %Y', strtotime($data['fecha']));
                                                            
                                                    ?></td>
                                                    <td><?php echo '<a style="background-color:' .$color2.' ; color:'.$texto.'" class="btn btn-secondary btn-sm w-100">' .$imagen. '</a>' ?></td>
                                                    <td><?php echo $data['observacion'] ?></td>


                                                    
                                                   







                                                    <td class="col-sm-2" style="background-color:white ;">

                                                        <div style="min-width: max-content;">

                                                           
                                                            <a data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $data['id_pro']; ?> " class="btn btn-warning btn-sm" href=""><i class="fa-regular fa-pen-to-square"></i> Editar </a>
                                                            <a data-bs-toggle="modal" data-bs-target="#exampleModale<?php echo $data['id_pro']; ?> " class="btn btn-danger btn-sm" href=""><i class="fa-solid fa-trash"></i> Eliminar </a>


                                                        </div>



                                                    </td>
                                                </tr>

                                                <!-- Modal editar  -->
                                                <div class="modal fade" id="exampleModal<?php echo $data['id_pro']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="editar_proyectos_comer.php" method="post">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Editar a <?php echo $data['nombre'] ?> </h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="card-header">
                                                                        <input type="hidden" name="eid_pro" value="<?php echo $data['id_pro']; ?>">

                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class=" mb-3 mb-md-0">
                                                                                <span for="inputFirstName">Nombre Proyecto </span>
                                                                                <input class="form-control form-control-sm  bg-opacity-10" name="enombre" type="text" value="<?php echo $data['nombre'] ?>" required />
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-12">
                                                                            <div class=" mb-3 mb-md-0">
                                                                                <span for="inputFirstName">Ubicacion </span>
                                                                                <input class="form-control form-control-sm  bg-opacity-10" name="eubi" type="text" value="<?php echo $data['ubicacion'] ?>" required />
                                                                            </div>
                                                                        </div>

                                                                

                                                                <div class="col-md-12">
                                                                    <div class=" mb-3 mb-md-0">
                                                                        <span for="inputFirstName">Monto</span>
                                                                        <input  id="monto" style="background-color:#c9ffc9;" class="form-control form-control-sm  bg-opacity-10" placeholder="0"  name="emonto" type="text" value="<?php echo $data['monto'] ?>" required />
                                                                    </div>
                                                                </div>

                                                                


                                                                <div class="col-md-12">
                                                                    <label for="tipo">Estado </label>
                                                                    
                                                                    <select name="eestado" id="eestado" class="form-control form-control-sm " required>
                                                                        <option value="<?php echo $data['estado'] ?>"><?php echo $data['estado'] ?></option>
                                                                        <option  value="proceso">En Proceso</option>
                                                                        <option  value="pagado">Pagado</option>
                                                                    </select>
                                                                </div>



                                                                

                                                                

                                                                <div class="col-md-12">
                                                                    <div class=" mb-3 mb-md-0">
                                                                        <span for="inputFirstName">CUCE </span>
                                                                        <input class="form-control form-control-sm  bg-opacity-10" name="ecuce" type="text" value="<?php echo $data['cuce'] ?>"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class=" mb-3 mb-md-0">
                                                                        <span for="inputFirstName">N° tramite </span>
                                                                        <input class="form-control form-control-sm  bg-opacity-10" name="etramite" type="text" value="<?php echo $data['num_tramite'] ?>" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class=" mb-3 mb-md-0">
                                                                        <span for="inputFirstName">N° Comprobante </span>
                                                                        <input class="form-control form-control-sm  bg-opacity-10" name="ecomprobante" type="text" value="<?php echo $data['num_comprobante'] ?>" />
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class=" mb-3 mb-md-0">
                                                                        <span for="inputFirstName">Observacion </span>
                                                                        <input class="form-control form-control-sm  bg-opacity-10" name="eobs" type="text" value="" />
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                                    <input type="submit" value="Actualizar Registros">
                                                                </div>

                                                                
                                                            </div>

                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Modal eliminar  -->
                                                <div class="modal fade " id="exampleModale<?php echo $data['id_pro']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content  bg-opacity-80">
                                                            <form action="eliminar_proyectos_comer.php" method="post">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Eliminar registro </h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="card-header text-center " style="padding: 0; margin: 0;">
                                                                        <input type="hidden" name="idProE" value="<?php echo $data['id_pro']; ?>">
                                                                        <label style="float:left ;" for="">Nombre de Proyecto</label>
                                                                        <input name="enombre" class="form-control" type="text" value=" <?php echo $data['nombre'] ?> " disabled>
                                                                        <label style="float:left ;" for="">Monto de Proyecto</label>
                                                                        <input name="emonto" class="form-control"  type="text" value=" <?php echo $data['monto'] . ' Bs' ?> " disabled>
                                                                        <label style="float:left ;" for="">numero de tramite</label>
                                                                        <input name="enombre" class="form-control" type="text" value=" <?php echo $data['num_tramite'] ?> " disabled>
                                                                        <label style="float:left ;" for="">CUCE</label>
                                                                        <input name="enombre" class="form-control" type="text" value=" <?php echo $data['cuce'] ?> " disabled>

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
                    <div class="modal-dialog modal-dialog-centered ">
                        <div class="modal-content modal-fullscreen ">
                            <div class="modal-header">
                                <!--<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>-->
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
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
                    [5, 10, 25,50,200, 'All'],
                ],
                language:{
                    url:'js/Spanish.json'
                }
            });
        });
</script>


<script>

    
var data = {
  labels: <?php echo json_encode($nombre)?> ,
  
  datasets: [
      {
      stack:1,
      label: "Proyecto (Bs) :",
      backgroundColor: [
      'rgba(255, 99, 132, 0.2)',
      'rgba(255, 159, 64, 0.2)',
      'rgba(255, 205, 86, 0.2)',
      'rgba(75, 192, 192, 0.2)',
      'rgba(54, 162, 235, 0.2)',
      'rgba(201, 203, 207, 0.2)'
    ],
    borderColor: [
      'rgb(255, 99, 132)',
      'rgb(255, 159, 64)',
      'rgb(255, 205, 86)',
      'rgb(75, 192, 192)',
      'rgb(54, 162, 235)',
      'rgb(201, 203, 207)'
    ],
      borderWidth: 1,
      data: <?php echo json_encode($monto)?>,
      yAxisID:1
    },
    
    
  ],
   
};

var options = {
  indexAxis: "y",
}

var ctx = document.getElementById("myChart").getContext("2d");
var myBarChart = new Chart(ctx, {
  type: 'bar',
  data: data,
  options: options
});
</script>


















<script>
        const ctx = document.getElementById('myCharts');

        new Chart(ctx, {
            type: 'bar',
            data: {
            labels: <?php
                    $fech = json_encode($fecha);
                    $nom = json_encode($nombre);

                    //echo $nom;
                    echo $fech;
                    
                    ?>,
            datasets: [{
                label: 'proyecto',
                data:  <?php echo json_encode($monto)?>,
                backgroundColor: [
            
            'rgba(255, 159, 64, 0.2)',
            'rgba(255, 205, 86, 0.2)',
            'rgba(153, 102, 255, 0.2)'
            
                ],
                borderColor: [
            
            'black',
            
                ],
                borderWidth: 1
            }]
            },
            
            options: {
            scales: {
                y: {
                beginAtZero: true
                }
            }
            }
        });

        
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