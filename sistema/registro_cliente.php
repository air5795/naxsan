<?php
    

    session_start();
    

    include "../conexion.php";
    if (!empty($_POST)) {
        $alert = '';
        if (empty($_POST['nombre']) ) {
            $alert = '<p class="alert alert-danger w-50"> Todos los Campos Son Obligatorios menos telefono *</p> ';
        } 
        else 
        {

            $nit = $_POST['nit'];
            $nombre = $_POST['nombre'];
            $telefono = $_POST['telefono'];
            $direccion = $_POST['direccion'];
            $usuario_id = $_SESSION['iduser'];

            $result = 0;

            if (is_numeric($nit) and $nit !=0) {
                $query = mysqli_query($conexion,"SELECT * FROM cliente WHERE nit = '$nit'");
                $result = mysqli_fetch_array($query);


            }

            if ($result > 0) {
                $alert = '<p class="alert alert-danger w-50"> El numero de nit ya existe</p> ';
            }else {
                $query_insert = mysqli_query($conexion, "INSERT INTO cliente (nit,nombre,telefono,direccion,usuario_id) 
                                                         VALUES ('$nit','$nombre','$telefono','$direccion','$usuario_id')");
                                        
                                        if ($query_insert) {
                                            $alert = '<p class="alert alert-success"> Cliente Guardado Correctamente </p> ';
                                        }
                                        else{
                                            $alert = '<p class="alert alert-danger w-50"> El registro fallo </p> ';
                                        }
            }
            
        }
        
    }
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>SISPONCELET</title>
        <?php include "includes/scripts.php"; ?>
        
    </head>
    <body class="sb-nav-fixed">
    <?php include "includes/header.php"; ?>
    

        <!-- contenido del sistema-->

        <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                    <div>
                    <h1 class="mt-4">Registro de Clientes</h1>
                        
                        <ol class="breadcrumb mb-2 ">
                            <li class="breadcrumb-item active">Poncelet / Registro Cliente</li> 
                        </ol>
                    
                        
                    </div>   
                        
                        <hr>
                       <!-- contenido del sistema 2--> 
                        <!-- formulario de registro de usuarios-->



                    <div class="container-register">
                        
                        <form action="" method="post" class="fields">

                            <label for="nit">Nit o Cedula de Identidad</label>
                            <input class="form-control" type="number" name="nit" id="nit" placeholder="Nit del cliente" >    

                            <label for="nombre">Nombre</label>
                            <input class="form-control " type="text" name="nombre" id="nombre" placeholder="Nombre del cliente">
                            
                            <label for="telefono">Telefono</label>
                            <input class="form-control" type="number" name="telefono" id="telefono" placeholder="Numero de telefono">
                            
                            <label for="direccion">Direccion</label>
                            <input class="form-control" type="text" name="direccion" id="direccion" placeholder="Direccion Completa">
                            <hr class="w-100">
                            <!-- selector--> 

                            
                            

                            <div class="center">
                                <center>
                                <div class=" align-self-center " role="alert" style=""> <?php echo isset ($alert) ? $alert :''; ?></div>
                                <input type="submit" value="Crear Cliente" class="btn btn-success  border-0 w-50   " data-dismiss="alert" >
                                </center>
                                
                            </div>
                            
                                    


                            
                       </form>

                       
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
