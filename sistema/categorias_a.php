<?php
    
    session_start();
    include "../conexion.php";

    $query = mysqli_query($conexion, "SELECT * FROM activos");
    $result = mysqli_num_rows($query);
    if ($result > 0) {
        while ($data = mysqli_fetch_array($query)) {
             $num = $data['id_activo'];
             
        }}

        $sql_tfila = mysqli_query($conexion, "SELECT COUNT(id_activo) FROM activos;");
        $result_f = mysqli_fetch_array($sql_tfila);
        $total2 = $result_f['COUNT(id_activo)'];
        $total3 =  $total2 + 1;


    if (!empty($_POST)) {


       
      
     
            
            $nombre_a = $_POST['nombre_activo'];
            $num = $total2 +1;


             
                    $query_insert = mysqli_query($conexion, "INSERT INTO activos(nombre_activo)
                                                                VALUES('$nombre_a')");


            if ($query_insert) {
                 
                $alert = '<p class="alert alert-success"> Guardado Correctamente </p> ';
                header("Location: categorias_a.php");

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
        <title>SISPONCELET</title>
        
    </head>
    <body class="sb-nav-fixed">
    <?php  include "includes/header.php";?>
    

        <!-- contenido del sistema-->

        <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                    <div class="container-fluid px-4 ">
                
                <h1 class="mt-4 col"><i class="fa-solid fa-box-open"></i>  <strong>Registro de <span style="color:#edc89a;"> Categorias de Activos </strong>   </span></h1>
                  
                        
                        <hr>

                        
                                                    
                        

                        
                       <!-- contenido del sistema 2--> 
                        <!-- formulario de registro de usuarios-->


                        <div class="row">
                        
                        
                        <div class="col-md-4">
                        
                        





                        <form action="categorias_a.php" method="post" class="fields was-validated " enctype="multipart/form-data" novalidate >

                        

                        <div class="row" style="background-color: #fffbf0">
                            

                        

                            

                           

                            

                             
                            <a class="btn alert alert-dark font-weight-bold  disabled" role="button" aria-disabled="true"> <strong> N° de registro:  <?php echo $total3 ?> </strong></a>
                            <div class="col-md-12">
                                <div class=" mb-3 mb-md-0">
                                    <span for="inputFirstName">Nombre de la categoria  </span> 
                                    <input  class="form-control form-control-sm  bg-opacity-10" name="nombre_activo" type="text" value="" required  />
                                </div>
                            </div>
                           

                            

                            
                        </div>




                            <hr >
                            <!-- selector--> 

                            
                            

                            <div class="row">
                                <div class="" role="alert" style=""> <?php echo isset ($alert) ? $alert :''; ?></div>
                                
                                <input type="submit" value="Registrar Activo" class="btn btn-warning  border-0  " data-dismiss="alert" >
                                
                                
                            </div>

                            
                            
                            
                                    


                            
                        </form>

                        </div>

                        

                        <div class="col">
                       
                            <div class="">

                            

                                
                            
                            <table >
                            <table id="tablas"  class="table table-bordered table-hover" style="font-size:11px ;"  >
                                <thead class="table-secondary">
                                    <tr class="">
                                        
                                        <th>N°</th>
                                        <th>Nombre de categoria de Activo</th>
                                        <th>acciones</th>
                              
                                    </tr>
                                    </thead>
                                    <?php
                    
                                    // rescatar datos DB 
                                    //$query = mysqli_query($conexion, "SELECT * FROM gastos
                                    //ORDER BY id_gasto DESC;");

                                    $query = mysqli_query($conexion, "SELECT
ROW_NUMBER() 
OVER(ORDER BY id_activo ) 
row_num,
id_activo,
nombre_activo 
FROM activos
ORDER BY id_activo DESC;");

                                

                                    $result = mysqli_num_rows($query);
                                    if ($result > 0) {
                                        while ($data = mysqli_fetch_array($query)) {
                                            
                                            
                                            

                                            

                                    ?>

                            <tr>
                                <td><?php echo $data['row_num'] ?></td>
                                <td><?php echo $data['nombre_activo'] ?></td>


                                <td class="col-sm-2">

                                <div style="min-width: max-content;">
                                    
                                    <a data-bs-toggle="modal" data-bs-target="#exampleModali<?php echo $data['id_activo']; ?> " class="btn btn-outline-danger btn-sm" href=""><i class="fa-solid fa-trash"></i> </a>

                                    
                                </div>
                                    
                                    
                                    
                                </td>
                            </tr>

                            <!-- Modal eliminar  -->
                            <div class="modal fade " id="exampleModali<?php echo $data['id_activo']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content  bg-opacity-80">
                                            <form action="eliminar_activos.php" method="post">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Eliminar registro  </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="card-header text-center " style="padding: 0; margin: 0;">
                                            <input type="hidden" name="idActivo" value="<?php echo $data['id_activo']; ?>" >
                                            
                                            <input name="ename" class="form-control" style="text-align: center;" type="text" value=" <?php echo $data['nombre_activo'] ?> " disabled>
                                            
                                             
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

        


        <script>$(document).ready(function () {
    $('#tablas').DataTable({
        order: [[5, 'desc']],
        pageLength: 5,
        lengthMenu: [
            [5, 10, 25,50,200, -1],
            [5, 10, 25,50,00, 'All'],
        ],
        language:{
            url:'js/Spanish.json'
        }
    });
});</script>

        
        
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