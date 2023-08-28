<?php

session_start();
include "../conexion.php";


//suma de monto bs total 



?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <?php include "includes/scripts.php"; ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>SISPONCELET</title>

    <style type="text/css">
  body {
    color: black;
    background-color:white; }
  </style>

</head>

<body class="sb-nav-fixed">
    <?php include "includes/header.php"; ?>


    <!-- contenido del sistema-->

    <div id="layoutSidenav_content">
        <main>

            





        
        <div class="container-fluid px-4 ">
                    <div>
                    <h1 class="mt-4"><i class="fa-solid fa-person-digging"></i> Lista de Proyectos Constructora</h1>
                        
                        <ol class="breadcrumb mb-2 ">
                            <li class="breadcrumb-item active">Poncelet / Proyectos Constructora</li> 
                        </ol>

                        

                        <ul class="nav nav-pills  justify-content-end">
                    <li class="nav-item">
                    </li>
                    <li class="nav-item dropdown">
                        <a style="color: red; background-color: aliceblue;" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><i class="fa-solid fa-print"></i> Imprimir Experiencia </a>
                        <ul class="dropdown-menu">
                        <li><a style="color: red;" class="dropdown-item" href="reporte_eg_c.php"><i class="fa-solid fa-print"></i>->   GAM POTOSI</a></li>
                        <li><a style="color: red;" class="dropdown-item" href="reporte_eg_c2.php"><i class="fa-solid fa-print"></i>->  GAM COTAGAITA</a></li>
                        <li><a style="color: red;" class="dropdown-item" href="reporte_eg_c3.php"><i class="fa-solid fa-print"></i>->  GAM CHAQUI</a></li>
                        <li><a style="color: red;" class="dropdown-item" href="reporte_eg_c4.php"><i class="fa-solid fa-print"></i>->  GAM COLCHA K </a></li>
                        <li><a style="color: red;" class="dropdown-item" href="reporte_eg_c5.php"><i class="fa-solid fa-print"></i>->  GAM SUCRE </a></li>
                        <li><a style="color: red;" class="dropdown-item" href="reporte_eg_c6.php"><i class="fa-solid fa-print"></i>->  GAM PUNA </a></li>
                        <li><a style="color: red;" class="dropdown-item" href="reporte_eg_c7.php"><i class="fa-solid fa-print"></i>->  GAM PORCO </a></li>
                        <li><a style="color: red;" class="dropdown-item" href="reporte_eg_c8.php"><i class="fa-solid fa-print"></i>->  GAM BETANZOS </a></li>
                        
                        <li><hr class="dropdown-divider"></li>
                        <li><a style="color: red;" class="dropdown-item" href="rep_imgEG_c.php"> <i class="fa-solid fa-print"></i>->  Actas Constructora</a></li>
                        </ul>
                    </li>
                </ul>
                    
                        
                    </div>
                

                <hr>

                

                


                



                <?php
                            $sql_suma_bs = mysqli_query($conexion, "SELECT SUM(monto_bs) FROM exp_general_c;");
                            $result_sum = mysqli_fetch_array($sql_suma_bs);
                            $total = $result_sum['SUM(monto_bs)']; 

                            $sql_tfila = mysqli_query($conexion, "SELECT COUNT(id_exp) FROM exp_general_c;");
                            $result_f = mysqli_fetch_array($sql_tfila);
                            $total2 = $result_f['COUNT(id_exp)'];   

                    ?>
                <!-- llenado de tabla-->

                <div class="row">

                <div class="d-none d-xl-block d-lg-block d-md-block" role="group" aria-label="Basic mixed styles example">
                    <a href="registro_exp_c.php" class=" btn btn-primary col "><i class="fa-solid fa-circle-plus"></i>  Nuevo Proyecto</a>
                    
                    <a class="btn btn-warning  " role="button" aria-disabled="true"> <strong> N° de Proyectos : </strong> 
                    <?php echo $total2 ?></a>
                    <a class="btn btn-outline-success " role="button" aria-disabled="true" > <strong> Experiencia total (Bs): </strong> 
                    <?php echo '&nbsp;&nbsp;&nbsp;'.number_format($total,2,'.',','). ' Bs' ?></a>

                    
                    
                
                    <hr>
                </div>

                
                

                <div class="btn-group d-md-none" role="group" aria-label="Basic mixed styles example">
                     <a href="registro_exp_c.php" class=" btn btn-primary col "><i class="fa-solid fa-circle-plus"></i>  Nuevo Proyecto</a>
                    
                    
                </div>

                <div class="btn-group d-md-none" role="group" aria-label="Basic mixed styles example">
                <a class="btn btn-success disabled" role="button" aria-disabled="true" ><?php echo 'Total : '.number_format($total,2,'.',','). ' Bs' ?></a>
                    <a class="btn btn-secondary  disabled" role="button" aria-disabled="true">N° de Proyectos: <?php echo $total2 ?></a>
                </div>

                
                        

                        
                </div>
                
                </div>


            
                <div class="card mb-4 ">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Listado de Proyectos en Base de datos Poncelet
                            </div>
                            


                <div class="card-body ">
                
                <table  id="tablas"  class="table table-bordered table-hover" style="font-size:11px ;" >
                <thead class="table-secondary">
                    <tr class="">
                        <th width="5%">idº</th>
                        <th>Nombre del contratante / Persona y Direccion de contacto</th>
                        <th width="20%">Objeto del Contrato</th>
                        <th>Ubicacion</th>
                        <th width="10%" >Monto final del contrato en (Bs)</th>
                        <th width="10%">Periodo de ejecucion (Fecha de inicio y finalizacion)</th>
                        <th width="10%">Monto en $u$ (Llenado de uso alternativo)</th>
                        <th>% de Participacion en Asociacion</th>
                        <th>Nombre LI del Socio(s)</th>
                        <th>Profesional Responsable</th>
                        <th>imagen-1(Acta)</th>
                        <th>imagen-2(Acta)</th>
                        <th>imagen-3(Acta)</th>
                        <th width="10%">Acciones</th>    
                    </tr>
                    </thead>
                    <?php
                    //paginador

                    $sql_registe = mysqli_query($conexion, "SELECT COUNT(*) as total_registro from cliente");

                    $result_register = mysqli_fetch_array($sql_registe);

                    $total_registro = $result_register['total_registro']; 

                    $por_pagina = 7;

                    if (empty($_GET['pagina'])) {
                        $pagina = 1;
                    }else {
                        $pagina = $_GET['pagina'];
                    }

                    $desde = ($pagina-1) * $por_pagina;  // 0
                    $total_paginas = ceil($total_registro / $por_pagina);


                    // rescatar datos DB 
                    $query = mysqli_query($conexion, "SELECT * FROM exp_general_c
                                                        ORDER BY id_exp DESC");

                   

                    $result = mysqli_num_rows($query);
                    if ($result > 0) {
                        while ($data = mysqli_fetch_array($query)) {
                            if ($data['image'] != 'nodisponible.png' ) {
                                $image = 'img/actas_c/'.$data['image'];
                                

                            }else {
                                $image = 'img/'.$data['image'];
                            }
                            
                            $image2 = 'img/actas_c/'.$data['image2'];
                            $image3= 'img/actas_c/'.$data['image3'];

                            

                    ?>
                            <tr>
                                <td><?php echo $data['id_exp'] ?></td>
                                <td><?php echo $data['nombre_contratante'] ?></td>
                                <td><?php echo $data['obj_contrato'] ?></td>
                                <td><?php echo $data['ubicacion'] ?></td>
                                <td class=" bg-success bg-opacity-10"><?php echo number_format($data['monto_bs'],2,'.',',').' Bs' ?></td>
                                <td>
                                    <strong>FECHA INICIO</strong> <br>
                                    <?php 
                                        setlocale(LC_TIME, "spanish");
                                        //echo $data['fecha_ejecucion']
                                        echo strftime('%e de %B %Y', strtotime($data['fecha_ejecucion']));
                                    ?>
                                    <br>
                                    <strong>FECHA FINALIZACION</strong><br>
                                    <?php 
                                        setlocale(LC_TIME, "spanish");
                                        //echo $data['fecha_ejecucion']
                                        echo strftime('%e de %B %Y', strtotime($data['fecha_final']));
                                    ?>
                                </td>
                                <td class=" bg-success bg-opacity-10"><?php echo number_format($data['monto_dolares'],2,'.',',').' $' ?></td>
                                <td><?php echo $data['participa_aso'] ?></td>
                                <td><?php echo $data['n_socio'] ?></td>
                                <td><?php echo $data['profesional_resp'] ?></td>
                                <td>
                                    <img style= "width:100px" src="<?php echo $image ?>" alt="" class="gallery-item"> 
                                </td>
                                <td>
                                    <img style= "width:100px" src="<?php echo $image2 ?>" alt="" class="gallery-item"> 
                                </td>
                                <td>
                                    <img style= "width:100px" src="<?php echo $image3 ?>" alt="" class="gallery-item"> 
                                </td>
                                
                                

                                <td  >
                                    <a href="editar_exp_c.php?id=<?php echo $data['id_exp'] ?>" class="btn btn-warning btn-sm " data-toggle="tooltip" data-placement="top" title="Editar" >
                                    <i class="fa-solid fa-file-pen"></i>
                                    </a>

                                    
                                    <a href="eliminar_exp_c.php?id=<?php echo $data['id_exp'] ?>" class="btn btn-danger btn-sm " data-toggle="tooltip" data-placement="top" title="Eliminar">
                                    <i class="fa-solid fa-trash-can"></i>
                                    </a>
                                    
                                    
                                </td>
                            </tr>
                    <?php

                        }
                    }
                    ?>


                </table>
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

<!-- modal-->
                                    <div class="modal fade" id="gallery-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-xl" >
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




        </footer>
    </div>
    </div>
    <!-- datatablesSimple -->


    <script>
        $(document).ready(function () {
            $('#tablas').DataTable({
                order: [[0, 'DESC']],
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
    document.addEventListener("click",function(e){
        if(e.target.classList.contains("gallery-item")){
            const src = e.target.getAttribute("src");
            document.querySelector(".modal-img").src = src;

            const myModal = new bootstrap.Modal(document.getElementById('gallery-modal'));
            myModal.show();
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