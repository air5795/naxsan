<?php

session_start();
include "../conexion.php";

$num = 0;

$query = mysqli_query($conexion, "SELECT * FROM recibos");
$result = mysqli_num_rows($query);
if ($result > 0) {
    while ($data = mysqli_fetch_array($query)) {
        $nume = $data['id_recibo'];
    }
}

$sql_tfila = mysqli_query($conexion, "SELECT COUNT(id_recibo) FROM recibos;");
$result_f = mysqli_fetch_array($sql_tfila);
$total2 = $result_f['COUNT(id_recibo)'];
$total3 =  $total2 + 1;


if (!empty($_POST)) {


    if (
        empty($_POST['nombre'])
        || empty($_POST['concepto'])
        || empty($_POST['fecha'])
        || empty($_POST['monto'])
    ) {
        $alert = '<p class="alert alert-danger "> Llenar campos faltantes</p> ';
    } else {
        $Nombre      = $_POST['nombre'];
        $Concepto    = $_POST['concepto'];
        $Fecha       = $_POST['fecha'];
        $Monto       = $_POST['monto'];
        $usuario_id = $_SESSION['iduser'];

        $num            = $total2 + 1;

        $num2           = $total2;

        $query_insert = mysqli_query($conexion, "INSERT INTO recibos(
                        nombre_r,
                        monto,
                        concepto,
                        fecha,
                        usuario_id
                    )
                    VALUES(
                        '$Nombre',
                        '$Monto',
                        '$Concepto',
                        '$Fecha',
                        '$usuario_id'
                    )");


        if ($query_insert) {
            
            $alert = '<p class="alert alert-success"> Guardado Correctamente </p> ';
            header("Location: recibos.php");
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
    <title>NAXSAN</title>

</head>

<body class="sb-nav-fixed">
    <?php include "includes/header.php"; ?>


    <!-- contenido del sistema-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <div class="container-fluid px-4 ">

                    <h1 class="mt-4 col"><i class="fa-solid fa-receipt"></i></i> <strong>Generar </strong>Recibos NA<span style="color:#e10101;">XS</span>AN </h1>


                    <hr>

                    <!-- contenido del sistema 2-->
                    <!-- formulario de registro de usuarios-->


                    <div class="row">


                        <div class="">

                            <form action="recibos.php" method="post" class="fields was-validated " enctype="multipart/form-data" novalidate>

                                <div class="row" style="background-color: #ededed;">

                                    <a class="btn alert alert-dark font-weight-bold  disabled" role="button" aria-disabled="true"> <strong> N° de registro: <?php echo $total3 ?> </strong></a>
                                    <div class="col-md-4">
                                        <div class=" mb-3 mb-md-0">
                                            <span for="inputFirstName">Recibo del Sr(a): </span>
                                            <input class="form-control form-control-sm  bg-opacity-10" name="nombre" type="text" value="" required />
                                        </div>
                                    </div>

                                    

                                    <div class="col-md-4">
                                        <div class=" mb-3 mb-md-0">
                                            <span for="inputFirstName">Por Concepto de: </span>
                                            <input class="form-control form-control-sm  bg-opacity-10" name="concepto" type="text" value="" required />
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class=" mb-3 mb-md-0">
                                            <span for="inputFirstName">Monto (Bs)</span>
                                            <input  style="background-color:#c9ffc9;" class="form-control form-control-sm  bg-opacity-10" placeholder="0"  name="monto" type="text" value="" required />
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class=" mb-3 mb-md-0">
                                            <span for="inputFirstName">Fecha </span>
                                            <input  style="background-color:#fdffc9;" class="form-control form-control-sm  bg-opacity-10"   name="fecha" type="date" value="" required />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="" role="alert" style=""> <?php echo isset($alert) ? $alert : ''; ?></div>

                                        <input class="btn  btn-primary m-2  " type="submit" value="Registrar Recibo " data-dismiss="alert">

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

                        <?php

                        $sql_tfilas = mysqli_query($conexion, "SELECT COUNT(*) FROM recibos;");
                        $result_f = mysqli_fetch_array($sql_tfilas);
                        $totales = $result_f['COUNT(*)']; 
                        
                        $sql_tfilas2 = mysqli_query($conexion, "SELECT SUM(monto) FROM recibos;");
                        $result_f2 = mysqli_fetch_array($sql_tfilas2);
                        $totales2 = $result_f2['SUM(monto)']; ?>

                        


                        <div class="">

                            <div class="">

                                <nav class="navbar bg-light">
                                    <div class="container-fluid ">
                                        <a class="navbar-brand text-black"> <i class="fa-solid fa-table-list"></i> Lista de Recibos </a>
                                        <form class="d-flex" role="search">

                                        <button style="margin:2px;" class="btn btn-sm btn-secondary" type="submit"> <strong>  &Sigma;  :  </strong> Sumatoria TOTAL RECIBOS Monto (Bs) :  
                                      <?php echo number_format($totales2,2,'.',',').' Bs'?> </button>

                                            <button style="margin:2px;" class="btn btn-sm btn-secondary" type="submit"> <strong> N° de Recibos  :  </strong> <?php echo $totales; ?> </button>
                    
                                            <a href="#" class="btn btn-danger btn-sm" style="margin:2px;"> <i class="fa-solid fa-print"></i> Imprimir Reporte de Recibos</a>
                                        </form>
                                    </div>
                                </nav>



                                <table>
                                    <table id="tablas"  class="table table-bordered table-hover" style="font-size:11px ;">
                                        <thead class="table-secondary">
                                            <tr class="">

                                                <th>CODIGO RECIBO</th>
                                                <th width="20%">RECIBO DEL Sr(a) </th>
                                                <th width="20%">Por CONCEPTO</th>
                                                <th width="10%">MONTO</th>
                                                <th width="10%">FECHA DE RECIBO</th>
                                                <th>INGRESO A BASE DE DATOS</th>
                                                <th>CREADO POR </th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <?php

                                        // rescatar datos DB 
                                        //$query = mysqli_query($conexion, "SELECT * FROM gastos
                                        //ORDER BY id_gasto DESC;");

                                        $query = mysqli_query($conexion, "SELECT
                                        recibos.concepto,
                                        recibos.dateadd,
                                        recibos.fecha,
                                        recibos.monto,
                                        recibos.nombre_r,
                                        recibos.id_recibo,
                                        recibos.usuario_id,
                                        usuario.idusuario,
                                        usuario.nombre
                                    FROM
                                        recibos
                                    JOIN usuario ON recibos.usuario_id = usuario.idusuario ORDER BY recibos.id_recibo DESC");



                                        $result = mysqli_num_rows($query);
                                        if ($result > 0) {
                                            while ($data = mysqli_fetch_array($query)) {
                                                
                                                $fecha =  $data['fecha'];

                                                $nombre = $data['nombre_r'];
                                                $id = $data['id_recibo'];
                                                $mon = $data['monto'];
                                                $con = $data['concepto'];

                                                

                                                





                                        ?>

                                                <tr>
                                                    <td><?php echo $data['id_recibo'] ?></td>
                                                    <td><?php echo $data['nombre_r'] ?></td>
                                                    <td>   <?php echo $data['concepto'] ?> </td>
                                                    <td> <span style="text-align: left; background-color:aquamarine;" class="btn  btn-sm w-100"> <?php echo number_format($data['monto'],2,'.',',') ?> Bs</span></td>
                                                    <td><?php 
                                                                                    setlocale(LC_TIME, "spanish");
                                                                                    //echo $data['fecha_ejecucion']
                                                                                    echo strftime('%e de %B %Y', strtotime($data['fecha']));
                                                                                ?></td>
                                                    <td style="background-color: #626262;font-weight: 700; color:white" ><?php echo $data['dateadd'] ?></td>
                                                    <td style="background-color: #626262;font-weight: 700; color:white" ><?php echo $data['nombre'] ?></td>
                                                    











                                                    <td class="col-sm-2">

                                                        <div style="min-width: max-content;">

                                                            <a data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $data['id_recibo']; ?> " class="btn btn-warning btn-sm" href=""><i class="fa-regular fa-pen-to-square"></i> Editar </a>
                                                            <a data-bs-toggle="modal" data-bs-target="#exampleModali<?php echo $data['id_recibo']; ?> " class="btn btn-danger btn-sm" href=""><i class="fa-solid fa-trash"></i> Eliminar </a>
                                                            <a data-bs-toggle="modal" data-bs-target="#exampleModalp<?php echo $data['id_recibo']; ?> " class="btn btn-outline-danger  btn-sm  " href=""><img src="img/pdf.svg" height="20px" width="20px"> IMPRIMIR RECIBO </a>

                                                        </div>



                                                    </td>
                                                </tr>

                                                <!-- Modal editar  -->
                                                <div class="modal fade" id="exampleModal<?php echo $data['id_recibo']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="editar_recibos.php" method="post">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Editar Recibo de  <?php echo $data['nombre_r'] ?> </h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="card-header">
                                                                        <input type="hidden" name="eid" value="<?php echo $data['id_recibo']; ?>">
                                                                        <label for="">Recibo del Sr.(a)</label>
                                                                        <input name="enombre" class="form-control" type="text" value=" <?php echo $data['nombre_r'] ?>">
                                                                        <label for="">Monto</label>
                                                                        <input name="emonto" class="form-control" type="text" value=" <?php echo $data['monto'] ?>">
                                                                        <label for="">Concepto</label>
                                                                        <input name="econcepto" class="form-control" type="text" value=" <?php echo $data['concepto'] ?>">
                                                                        <label for="">Fecha </label>

                                                                        <input class=" form-control"type="date" name="efecha" value="<?php echo $data['fecha']?>">

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
                                                <div class="modal fade " id="exampleModali<?php echo $data['id_recibo']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content  bg-opacity-80">
                                                            <form action="eliminar_recibo.php" method="post">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Eliminar registro </h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="card-header text-center " style="padding: 0; margin: 0;">
                                                                        <input type="hidden" name="idR" value="<?php echo $data['id_recibo']; ?>">

                                                                        <input name="ename" class="form-control" style="text-align: center;" type="text" value=" <?php echo $data['nombre_r'] ?> " disabled>
                                                                        <input name="ename" class="form-control" style="text-align: center;" type="text" value=" <?php echo $data['concepto']  ?> " disabled>

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

                                                <!-- Modal pdf  -->
                                                <div class="modal fade " id="exampleModalp<?php echo $id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content  bg-opacity-80">
                                                            <form action="pdf_recibos.php" method="post">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">RECIBO DE : <?php echo $nombre; ?>  </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            <input type="hidden" name="idRecibo" value="<?php echo $id; ?>" >
                                                            <input type="hidden" name="names" value="<?php echo $nombre; ?>" >
                                                            <input type="hidden" name="montos" value="<?php echo $mon; ?>" >
                                                            <input type="hidden" name="concept" value="<?php echo $con; ?>" >
                                                        </div>
                                                        
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                            <input class="btn btn-danger" type="submit" value="Imprimir RECIBO">
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
        document.addEventListener("click", function(e) {
            if (e.target.classList.contains("gallery-item")) {
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
                        document.getElementById("list").innerHTML = ['<img class="form-control" style="max-width:400px;" src="', e.target.result, '" title="', escape(theFile.name), '"/>'].join('');
                    };
                })(f);

                reader.readAsDataURL(f);
            }
        }

        document.getElementById('files').addEventListener('change', archivo, false);
    </script>
   

<script type="text/javascript">
        

        function calcular_a_bs(){
            try{
                var b = parseFloat(document.getElementById("precio_c").value) || 0;
                decimal = b.toFixed(2);
                proceso = (decimal *(30/100))+b;
                result = proceso.toFixed(0);
                document.getElementById("precio_v").value = result;
            } catch(e){}
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