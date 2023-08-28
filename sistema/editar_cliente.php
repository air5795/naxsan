<?php
    
    session_start();

    include "../conexion.php";
    

    if (!empty($_POST)) {
        $alert = '';
        if (empty($_POST['nombre']) || empty($_POST['nit']) || empty($_POST['direccion'])) {
            $alert = '<p class="alert alert-danger w-50"> Todos los Campos Son Obligatorios menos telefono* </p> ';
        } else {
            
            $idCliente = $_POST['id'];
            $nit = $_POST['nit'];
            $nombre = $_POST['nombre'];
            $telefono = $_POST['telefono'];
            $direccion = $_POST['direccion'];
    

            $result = 0;
            if (is_numeric($nit) and $nit !=0) {
                $query = mysqli_query($conexion,"SELECT * FROM cliente 
                                                      WHERE (nit = '$nit' AND idcliente != '$idCliente')
                                                      ");  
                                                      
                $resul = mysqli_fetch_array($query);
                
            }
            
            

            if ($resul > 0) {
                $alert  = $alert = '<p class="alert alert-danger w-50"> el nit ya existe </p> ';
            }else {
                // le asigna un 0 si esta vaccio el envio de formaulario 
                if ($nit == '') {
                    $nit = 0;
                }
                
                
                $sql_update = mysqli_query($conexion,"UPDATE cliente
                                                      SET nit = $nit, nombre = '$nombre', telefono = $telefono , direccion = '$direccion'  
                                                      WHERE idcliente = $idCliente ");    
                

                
                if ($sql_update) {
                    $alert = '<p class="alert alert-success"> SE ACTUALIZO CORRECTAMENTE EL CLIENTE </p> ';
                }
                else{
                    $alert = '<p class="alert alert-danger w-50"> LA ACTUALIZACION FALLO </p> ';
                }
            }
        }
    }

    //mostrar datos

    if (empty($_GET['id'])) 
    {
        header('Location: lista_clientes.php');
    }

    $idcliente = $_GET['id'];
    $sql= mysqli_query($conexion,"SELECT * FROM cliente
                                WHERE idcliente = $idcliente"); // colocar la variable rescatada de GET 

    $result_sql = mysqli_num_rows($sql);

    if ($result_sql == 0) {
        header('Location: lista_clientes.php');
    }else {

        while ($data = mysqli_fetch_array($sql)) {
            $idcliente = $data['idcliente'];
            $nit = $data['nit'];
            $nombre = $data['nombre'];
            $telefono = $data['telefono'];
            $direccion = $data['direccion'];
            
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
                    <h1 class="mt-4">Editar Cliente</h1>
                        
                        <ol class="breadcrumb mb-2 ">
                            <li class="breadcrumb-item active">Poncelet / Editar Cliente</li> 
                        </ol>
                    
                        
                    </div>   
                        
                        <hr>
                       <!-- contenido del sistema 2--> 
                        <!-- formulario de registro de usuarios-->



                    <div class="form_register  container px-4 ">
                        
                        
                    <form action="" method="post" class="fields">

                        <input type="hidden" name="id" value="<?php echo $idcliente ?>" >

                        <label for="nit">Nit o Cedula de Identidad</label>
                        <input class="form-control" type="number" name="nit" id="nit" placeholder="Nit del cliente" value="<?php echo $nit ?>" >    

                        <label for="nombre">Nombre</label>
                        <input class="form-control " type="text" name="nombre" id="nombre" placeholder="Nombre del cliente" value="<?php echo $nombre ?>">

                        <label for="telefono">Telefono</label>
                        <input class="form-control" type="number" name="telefono" id="telefono" placeholder="Numero de telefono" value="<?php echo $telefono ?>">

                        <label for="direccion">Direccion</label>
                        <input class="form-control" type="text" name="direccion" id="direccion" placeholder="Direccion Completa" value="<?php echo $direccion ?>">
                        <hr class="w-100">
                        <!-- selector--> 




                        <div class="center">
                            <center>
                            <div class=" align-self-center " role="alert" style=""> <?php echo isset ($alert) ? $alert :''; ?></div>
                            <input type="submit" value="Editar Cliente" class="btn btn-success  border-0 w-50   " data-dismiss="alert" >
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