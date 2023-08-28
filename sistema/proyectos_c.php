<?php
    
    session_start();
    include "../conexion.php";

    $query = mysqli_query($conexion, "SELECT * FROM proyectos");
    $result = mysqli_num_rows($query);
    if ($result > 0) {
        while ($data = mysqli_fetch_array($query)) {
             $num = $data['id_proyecto'];
             
        }}

        $sql_tfila = mysqli_query($conexion, "SELECT COUNT(id_proyecto) FROM proyectos;");
        $result_f = mysqli_fetch_array($sql_tfila);
        $total2 = $result_f['COUNT(id_proyecto)'];
        $total3 =  $total2 + 1;


    if (!empty($_POST)) {


       
      
     
            
            $nombre_p = $_POST['nombre_proyecto'];
            $color = $_POST['color'];
            $num = $total2 +1;


             
                    $query_insert = mysqli_query($conexion, "INSERT INTO proyectos(pro_nombre,color)
                                                                VALUES('$nombre_p','$color')");


            if ($query_insert) {
                 
                $alert = '<p class="alert alert-success"> Guardado Correctamente </p> ';
                header("Location: proyectos_c.php");

            }else{
                $alert = '<p class="alert alert-danger "> El registro fallo </p> ';
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
        
 
        <title>SIS-NAXSAN</title>
        
    </head>
    <body class="sb-nav-fixed">
    <?php  include "includes/header.php";?>
    

        <!-- contenido del sistema-->

        <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                    <div class="container-fluid px-4 ">
                
                <h1 class="mt-4 col"><i class="fa-solid fa-sack-dollar"></i> <strong>Gestor de <span> CAJA CHICA NA<SPAN style="color:red">XS</SPAN>AN </strong>   </span></h1>
                  
                        
                        <hr>

                        
                                                    
                        

                        
                       <!-- contenido del sistema 2--> 
                        <!-- formulario de registro de usuarios-->


                        <div class="row">
                        
                        
                        <div class="col-md-4">
                            
                        
                        





                        <form action="proyectos_c.php" method="post" class="fields was-validated " enctype="multipart/form-data" novalidate >

                        
                        

                        <div class="row" style="background-color: #ffe8e8">
                            

                        <?php
                            $sql_suma_bs = mysqli_query($conexion, "SELECT SUM(g_montoBs) FROM gastos_c;");
                            $result_sum = mysqli_fetch_array($sql_suma_bs);
                            $total = $result_sum['SUM(g_montoBs)']; 

                            $sql_suma_bs2 = mysqli_query($conexion, "SELECT SUM(montoBs) FROM ingresos_c;");
                            $result_sum2 = mysqli_fetch_array($sql_suma_bs2);
                            $total2 = $result_sum2['SUM(montoBs)'];

                            
                            
                            $saldo = $total2 - $total;

                            

                        ?>

                        

                            

                           

                            

                        
                            <a class="btn alert alert-dark font-weight-bold  disabled" role="button" aria-disabled="true"> <strong> N° de registro:  <?php echo $total3 ?> </strong></a>
                            <div class="col-md-12">
                                <div class=" mb-3 mb-md-0">
                                    <span for="inputFirstName">IDENTIFICADOR (NOMBRE, FECHA)  </span> 
                                    <input  class="form-control form-control-sm  bg-opacity-10" name="nombre_proyecto" type="text" value="" required  />
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class=" mb-3 mb-md-0">
                                    <span for="inputFirstName">Color  </span> 
                                    <input  class="form-control form-control-sm  bg-opacity-10" name="color" type="color" value="#ffffff" required  />
                                </div>
                            </div>

                           
                           

                            

                            
                        </div>




                            <hr >
                            <!-- selector--> 

                            
                            

                            <div class="row">
                                <div class="" role="alert" style=""> <?php echo isset ($alert) ? $alert :''; ?></div>
                                
                                <input type="submit" value="Registrar Proyecto" class="btn btn-warning  border-0  " data-dismiss="alert" >
                                
                                
                            </div>

                            
                            
                            
                                    


                            
                        </form>

                        </div>

                        

                        <div class="col">
                       
                            <div class="">

                            <nav class="bg-light">
                                <div class="container" style="BACKGROUND-COLOR: #e1e1e1;">
                                    <a class="navbar-brand text-black"> <i class="fa-solid fa-print"></i> Imprimir Reporte por Rango de Fechas </a>
                                    <form action="reporte_gastosFechas_c.php"  class="form-inline row" method="POST" name="formFechas" id="formFechas">
                                        <div class="col-sm-3">
                                        <label for="">Elegir CAJA CHICA</label>
                                            <select style="width: 100%;font-size:12px ;" name="proyecto" id="select" class=" form-select" required >
                                                <option value="" >Seleccione una opción : </option>
                                                <?php
                                                    $query = mysqli_query($conexion, "SELECT * from proyectos ORDER BY pro_nombre ASC;");
                                                    $result = mysqli_num_rows($query);
                                                    if ($result > 0) {
                                                    while ($data = mysqli_fetch_array($query)) {
                                                        echo '<option value="'.$data['pro_nombre'].'">'.$data['pro_nombre'].'</option>';
                                                        $nombre = $data['p_descripcion'];
                                                    }}
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="">Fecha Inicio</label>
                                            <input class="form-control form-control-sm" type="date" name="fecha_inicio" id="" required > 
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="">Fecha Final</label>
                                            <input class="form-control form-control-sm" type="date" name="fecha_final" id="" required >

                                        </div>
                                        <div class="col-sm-3">
                                            <button type="submit" class="btn btn-danger btn-sm p-2  ">
                                                <img src="img/PDF.svg" height="20px" width="20px" > Reporte Por Fechas
                                            </button>
                                        </div>
                                        

                                        
                                            
                                        

                                        
                                    
                                        
                                        
                                       

                                    </form>
                                </div>
                                </nav>

                            

                                
                            
                            <table class="table table-bordered ">
                            <table class="table" id="tablas">
                                
                                <thead class="table-secondary ">
                                    <tr class="">
                                        
                                        <th>N°</th>
                                        <th>Nombre de Caja</th>
                                        <th >Total Ingresos</th>
                                        <th >Total Gastos</th>
                                        <th >Saldo</th>
                                        
                                        <th>Acciones</th>
                              
                                    </tr>
                                    </thead>
                                    <?php
                    
                                    // rescatar datos DB 
                                    //$query = mysqli_query($conexion, "SELECT * FROM gastos
                                    //ORDER BY id_gasto DESC;");

                                    $query = mysqli_query($conexion, "SELECT
                                                                            ROW_NUMBER() 
                                                                            OVER(ORDER BY id_proyecto ) 
                                                                            row_num,
                                                                            id_proyecto,
                                                                            pro_nombre,
                                                                            color 
                                                                            FROM proyectos
                                                                            ORDER BY id_proyecto DESC;");

                                

                                    $result = mysqli_num_rows($query);
                                    if ($result > 0) {
                                        while ($data = mysqli_fetch_array($query)) {
                                            
                                            
                                            

                                            

                                    ?>

                            <tr style="background-color:<?php echo $data['color'];?> ;">
                                <td><?php echo $data['row_num'] ?></td>
                                <td><?php echo $data['pro_nombre'] ?></td>
                                <td ><?php

                                    

                                    $pro = $data['pro_nombre'];
                                    $idp = $data['id_proyecto'];
                                    $color = $data['color'];


                                    



                                    $s = mysqli_query($conexion, "SELECT SUM(montoBs) FROM ingresos_c WHERE proyecto = '$pro' ;");   
                                    while($rows=mysqli_fetch_array($s)){
                                        $ing = $rows[0];
                                        if (!empty($rows[0]) ) {
                                            echo "<span style='text-align:left' class='btn btn-success btn-sm w-100 opacity-75'> ".number_format($rows[0],2,'.',',')." Bs</span>";
                                        } else {
                                            echo "<span style='text-align:left' class='btn btn-secondary btn-sm w-100 opacity-75'>"."0"." Bs</span>";
                                        }
                                    
                                    }
                                    ?></td>
                                <td >

                                <?php

                                    
                                    $s = mysqli_query($conexion, "SELECT SUM(g_montoBs) FROM gastos_c WHERE g_proyecto = '$pro' and contar = 'si' ;");   
                                    while($data=mysqli_fetch_array($s)){
                                        $gas = $data[0];
                                        if (!empty($data[0]) ) {
                                            echo "<span style='text-align:left' class='btn btn-danger btn-sm w-100 opacity-75'> ".number_format($data[0],2,'.',',')." Bs</span>";
                                        } else {
                                            echo "<span style='text-align:left' class='btn btn-secondary btn-sm w-100 opacity-75'>"."0"." Bs</span>";
                                        }
                                    
                                    }
                                    ?>
                                </td>
                                <td  >
                                    <?php
                                        $saldito = $ing - $gas;

                                        if ($saldito > 0) {
                                            echo "<span style='text-align:left' class='btn btn-success btn-sm w-100 opacity-75'> ".number_format($saldito,2,'.',',')." Bs</span>";    
                                        }
                                        elseif ($saldito == 0) {
                                            echo "<span style='text-align:left' class='btn btn-secondary btn-sm w-100 opacity-75'> ".number_format($saldito,2,'.',',')." Bs</span>";
                                        }
                                        else {
                                            echo "<span style='text-align:left' class='btn btn-danger btn-sm w-100 opacity-75 '> ".number_format($saldito,2,'.',',')." Bs</span>";
                                        }
                                        
                                    ?>
                                </td>
                                


                                <td class="col-sm-2" style="background-color:white;">

                                <div style="min-width: max-content; " >
                                        
                                    
                                    <a data-bs-toggle="modal" data-bs-target="#exampleModali<?php echo $idp; ?> "  class="btn btn-danger btn-sm " href=""><i class="fa-solid fa-trash"></i>  </a>
                                    <a data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $idp; ?> " class="btn btn-warning btn-sm  " href=""><i class="fa-solid fa-pen"></i>   </a>
                                    <a data-bs-toggle="modal" data-bs-target="#exampleModalp<?php echo $idp; ?> " class="btn btn-outline-danger  btn-sm  " href=""><img src="img/pdf.svg" height="20px" width="20px"> IMPRIMIR </a> 

                                    
                                </div>
                                    
                                    
                                    
                                </td>
                            </tr>

                            <!-- Modal eliminar  -->
                            <div class="modal fade " id="exampleModali<?php echo $idp; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content  bg-opacity-80">
                                            <form action="eliminar_proyectos.php" method="post">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Eliminar registro  </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="card-header text-center " style="padding: 0; margin: 0;">
                                            <input type="hidden" name="idProyecto" value="<?php echo $idp; ?>" >
                                            
                                            <input name="ename" class="form-control" style="text-align: center;" type="text" value=" <?php echo $pro; ?> " disabled>
                                            
                                             
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


                                    <!-- Modal editar  -->
                            <div class="modal fade " id="exampleModal<?php echo $idp; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content  bg-opacity-80">
                                            <form action="editar_proyectos.php" method="post">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Editar registro  </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="card-header text-center " style="padding: 0; margin: 0;">
                                            <input type="hidden" name="idProyecto" value="<?php echo $idp; ?>" >
                                            <label for="">Nombre de Caja</label>
                                            <input name="ename" class="form-control"  type="text" value=" <?php echo $pro; ?> " >
                                            <label for="">Color</label>
                                            <input name="ecolor" class="form-control"  type="color" value=" <?php echo $color; ?> " >
                                            
                                             
                                            </div>
                                                
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                            <input class="btn btn-warning" type="submit" value="Actualizar">
                                        </div>

                                        </form>
                                        </div>
                                    </div>
                                    </div>

                                    <!-- Modal pdf  -->
                            <div class="modal fade " id="exampleModalp<?php echo $idp; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content  bg-opacity-80">
                                            <form action="pdf_proyectos.php" method="post">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">PDF: Reporte </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="card-header text-center " style="padding: 0; margin: 0;">
                                            <input type="hidden" name="idProyecto" value="<?php echo $idp; ?>" >
                                            <input type="hidden" name="pname" value="<?php echo $pro; ?>" >
                                            <label for="">Sacar Reporte General de : </label>
                                            <input class="btn btn-danger" name="ename" class="form-control"  type="text" value=" <?php echo $pro; ?> " disabled>
                                            
                                            
                                             
                                            </div>
                                                
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                            <input class="btn btn-danger" type="submit" value="Imprimir PDF">
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
            $(document).ready( function () {
                $('#tablas').DataTable();
            } );
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