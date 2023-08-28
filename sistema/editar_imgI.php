<?php 
session_start();
include "../conexion.php";

$id_producto = $_GET['id'];

if (!empty($_POST)) {
    $alert = '';
    if (empty($_POST['idP']) ) {
        $alert = '<p class="alert alert-danger w-50"> Todos los Campos Son Obligatorios </p> ';
    } else {
        
        $idPI = $_POST['idP'];
        $foto = $_FILES['img'];

        
        //imagen 1

        $nombre_image = $foto['name'];
        $type = $foto['type'];
        $url_temp = $foto['tmp_name'];

        $imgProducto = 'nodisponible.png';

        if ($nombre_image != '') {
            $destino = 'img/inventario/';
            $img_nombre = 'articulo' . $id_producto;
            //$img_nombre = 'acta_'.$ubicacion.'-'.$fecha_ejecucion.date('H:m:s');
            $imgActa = $img_nombre . '.jpg';
            $src = $destino . $imgActa;
        }


            $query = mysqli_query($conexion,"SELECT * FROM inventario");  
                                                  
            $resul = mysqli_fetch_array($query);
          
            $sql_update = mysqli_query($conexion,"UPDATE inventario
                                                  SET foto = '$imgActa' 
                                                  WHERE id_inv = $id_producto");

        

        if ($sql_update) {
            if ($nombre_image != '') {
                move_uploaded_file($url_temp, $src);
            }
            $alert = '<p class="alert alert-success"> Guardado Correctamente </p> ';
            header("Location: inventario_i.php");
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
                    <div>
                    <h1 class="mt-4">Editar Imagen del Producto</h1>
                        
                        <ol class="breadcrumb mb-2 ">
                            <li class="breadcrumb-item active">Poncelet / Editar Imagen del producto de inventario</li> 
                        </ol>
                    
                        
                    </div>   
                        
                        <hr>
                       <!-- contenido del sistema 2--> 
                        <!-- formulario de registro de usuarios-->



                        <?php

                    

                        $query = mysqli_query($conexion, "SELECT * from inventario where id_inv = '$id_producto';");

                        $result = mysqli_num_rows($query);
                        if ($result > 0) {
                            while ($data = mysqli_fetch_array($query)) {
                                if ($data['foto'] != 'nodisponible.png') {
                                    $image = 'img/inventario/' . $data['foto'];
                                } else {
                                    $image = 'img/' . $data['foto'];
                                }
                                
                            }
                        }
                            

                        ?>
                        



                        <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
                            <div class="col">
                                <div class="card mb-4 rounded-3 shadow-sm">
                                <div class="card-header py-3">
                                    <h4 class="my-0 fw-normal">Actualiza la Imagen</h4>
                                </div>
                                <div class="card-body">
                                <form action="" method="post" class="fields was-validated " enctype="multipart/form-data" novalidate>

                                    <input type="hidden" name="idP" value="<?php echo $id_producto;?>">

                                    <span for="inputFirstName">Suba el Archivo</span>
                                    <input type="file" class="form-control form-control-sm" name="img" id="files"> 
                                    <hr class="w-100">
                                    <!-- selector--> 
                                    <hr class="w-100">     
                                    <center><input type="submit" value="Actualizar Imagen" class="btn btn-success  border-0 w-50   " data-dismiss="alert" ></center>
                                    <div class=" form-text text-center " role="alert" style=""> <?php echo isset ($alert) ? $alert :''; ?></div>
                                    
                                    </form>
                                    
                                    
                                </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card mb-4 rounded-3 shadow-sm">
                                <div class="card-header py-3">
                                    <h4 class="my-0 fw-normal">Imagen Actual</h4>
                                    

                                </div>
                                <div class="card-body">
                                <img src="<?php echo $image;?>" width="150px" height="150px">
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>