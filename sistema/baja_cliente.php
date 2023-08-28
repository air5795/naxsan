<?php
session_start();

include "../conexion.php";

if (!empty($_POST)) {

    $idcliente = $_POST['idcliente'];


    //eliminar un registro
    //$query_delete = mysqli_query($conexion, "DELETE FROM usuario WHERE idusuario = $idusuario");

    $query_delete = mysqli_query($conexion,"UPDATE cliente SET estatus = 0 WHERE idcliente = $idcliente");

    if ($query_delete) {
        header('location: lista_clientes.php');
    }else {
        echo "error al dar de baja ";
    }
}
    
if (empty($_REQUEST['id'])) {
    header('location: lista_clientes.php');
}else {
    

    $idcliente = $_REQUEST['id'];

    $query = mysqli_query($conexion,"SELECT * FROM cliente
                                    WHERE idcliente = $idcliente");

    $result = mysqli_num_rows($query);
    if ($result > 0) {
        while ($data = mysqli_fetch_array($query)) {
            
            $nombre = $data['nombre'];
            $nit = $data['nit'];
        }
    }else {
        header('location: lista_clientes.php');
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
                    <h1 class="mt-4">Dar de baja Cliente</h1>
                        
                        <ol class="breadcrumb mb-2 ">
                            <li class="breadcrumb-item active">Poncelet / Baja Cliente</li> 
                        </ol>
                    
                        
                    </div>   
                        
                        <hr>
                       <!-- contenido -->
                       
                       <div class="alert alert-danger" role="alert">
                            <h4 class="alert-heading">Esta seguro de dar de BAJA este Cliente ? </h4>
                            <p>Nombre: <?php echo $nombre?></p>
                            <p>Nit o cedula del cliente: <?php echo $nit?></p>
                                <form action="" method="POST">
                                    <input type="hidden" name="idcliente" value="<?php echo $idcliente?>">
                                    <a href="lista_clientes.php" class="btn btn-outline-danger">Cancelar</a>
                                    <input type="submit" value="Aceptar" class="btn btn-danger">
                                </form>
                            <hr>
                            <p class="mb-0">Al dar en aceptar se dara de baja al cliente manteniendo su registro en la Base de datos</p>
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