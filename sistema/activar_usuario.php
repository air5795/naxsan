<?php
session_start();
if ($_SESSION['rol'] != 1) {
    header ("location: ./");
}

include "../conexion.php";

if (!empty($_POST)) {
    $idusuario = $_POST['idusuario'];


    //eliminar un registro
    //$query_delete = mysqli_query($conexion, "DELETE FROM usuario WHERE idusuario = $idusuario");

    $query_delete = mysqli_query($conexion,"UPDATE usuario SET estatus = 1 WHERE idusuario = $idusuario");

    if ($query_delete) {
        header('location: lista_usuarios.php');
    }else {
        echo "error al activar ";
    }
}
    
if (empty($_REQUEST['id'])) {
    header('location: lista_usuarios.php');
}else {
    

    $idusuario = $_REQUEST['id'];

    $query = mysqli_query($conexion,"SELECT u.nombre, u.usuario, r.rol
                                    FROM usuario u
                                    INNER JOIN rol r
                                    ON u.rol = r.idrol
                                    WHERE u.idusuario = $idusuario");

    $result = mysqli_num_rows($query);
    if ($result > 0) {
        while ($data = mysqli_fetch_array($query)) {
            $nombre = $data['nombre'];
            $usuario = $data['usuario'];
            $rol = $data['rol'];
        }
    }else {
        header('location: lista_usuarios.php');
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
                    <h1 class="mt-4">Activar Usuario</h1>
                        
                        <ol class="breadcrumb mb-2 ">
                            <li class="breadcrumb-item active">Poncelet / Activar Usuario</li> 
                        </ol>
                    
                        
                    </div>   
                        
                        <hr>
                       <!-- contenido -->
                       
                       <div class="alert alert-success" role="alert">
                            <h4 class="alert-heading">Esta seguro de ACTIVAR este Usuario ? </h4>
                            <p>Nombre: <?php echo $nombre?></p>
                            <p>Usuario: <?php echo $usuario?></p>
                            <p>Rol: <?php echo $rol?></p>
                                <form action="" method="POST">
                                    <input type="hidden" name="idusuario" value="<?php echo $idusuario?>">
                                    <a href="lista_usuarios.php" class="btn btn-outline-success">Cancelar</a>
                                    <input type="submit" value="Aceptar" class="btn btn-success">
                                </form>
                            <hr>
                            <p class="mb-0">Al dar en aceptar se ACTIVARA el usuario en la Base de datos</p>
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