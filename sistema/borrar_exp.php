<?php
session_start();

include "../conexion.php";


if (empty($_REQUEST['id'])) {
    header('location: lista_exp.php');
}else {
    

    $idExp2 = $_REQUEST['id'];

    $query = mysqli_query($conexion,"SELECT * FROM exp_general
                                    WHERE id_exp = $idExp2");

    $result = mysqli_num_rows($query);
    if ($result > 0) {
        while ($data = mysqli_fetch_array($query)) {
            $ruta = 'img/actas/';
            $image = $data['image'];
            $ruta2 = $ruta.$image;

            
            $image2 = $data['image2'];
            $ruta4 = $ruta.$image2;
            
            
            $image3 = $data['image3'];
            $ruta6 = $ruta.$image3;

            $image4 = $data['image4'];
            $ruta8 = $ruta.$image4;

            $image5 = $data['image5'];
            $ruta10 = $ruta.$image5;

            $image6 = $data['image6'];
            $ruta12 = $ruta.$image6;

            $image7 = $data['image7'];
            $ruta14 = $ruta.$image7;

            $image8 = $data['image8'];
            $ruta16 = $ruta.$image8;

            $image9 = $data['image9'];
            $ruta18 = $ruta.$image9;

            $image10 = $data['image10'];
            $ruta20 = $ruta.$image10;

            $image11 = $data['image11'];
            $ruta22 = $ruta.$image11;

            $image12 = $data['image12'];
            $ruta24 = $ruta.$image12;

            $image13 = $data['image13'];
            $ruta26 = $ruta.$image13;

            $image14 = $data['image14'];
            $ruta28 = $ruta.$image14;

            $image15 = $data['image15'];
            $ruta30 = $ruta.$image15;
            



            

            
            //$nombre = $data['nombre'];
            //$nit = $data['nit'];
        }
    }else {
        header('location: lista_exp.php');
    }
}

if (!empty($_POST)) {

    $idExper = $_POST['id_exp'];


    //eliminar un registro
    $query_delete = mysqli_query($conexion, "DELETE FROM exp_general WHERE id_exp = $idExper");

    //$query_delete = mysqli_query($conexion,"UPDATE cliente SET estatus = 0 WHERE idcliente = $idcliente");

    if ($query_delete) {
        header('location: lista_exp.php');
        if ($ruta2 != '' ) {
            unlink($ruta2);
            unlink($ruta4);
            unlink($ruta6);
            unlink($ruta8);
            unlink($ruta10);
            unlink($ruta12);
            unlink($ruta14);
            unlink($ruta16);

            unlink($ruta18);
            unlink($ruta20);
            unlink($ruta22);
            unlink($ruta24);
            unlink($ruta26);
            unlink($ruta28);
            unlink($ruta30);
        
        } 
    }else {
        echo "error al eliminar ";
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
                    <div class="container-fluid px-4 row">
                    <img src="../img/precaucion.jpg" style="width:100px;" class="col-2">
                    <h1 class="mt-4 col">Eliminar Experiencia</h1> 
                        
                        
                    
                        
                    </div>   
                        
                        <hr>
                       <!-- contenido -->
                       
                       <div class="alert alert-danger" role="alert">
                            <h4 class="alert-heading">Esta seguro de Eliminar la Experiencia ? </h4>
                            
                                <form action="" method="POST">
                                    <input type="hidden" name="id_exp" value="<?php echo $idExp2?>">
                                    <a href="lista_exp.php" class="btn btn-outline-danger">Cancelar</a>
                                    <input type="submit" value="Aceptar" class="btn btn-danger">
                                </form>
                            <hr>
                            <p class="mb-0"> <strong>Precaución : </strong> Al dar en aceptar se Eliminara completamente de la base de datos </p>
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