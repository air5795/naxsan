<?php
    

    session_start();
    if ($_SESSION['rol'] != 1) {
        header ("location: ./");
    }

    include "../conexion.php";
    if (!empty($_POST)) {
        $alert = '';
        if (empty($_POST['nombre']) || empty($_POST['correo']) || empty($_POST['usuario']) || empty($_POST['clave'])|| empty($_POST['rol'])) {
            $alert = '<p class="alert alert-danger w-50"> Todos los Campos Son Obligatorios </p> ';
        } else {
            
            $nombre = $_POST['nombre'];
            $email = $_POST['correo'];
            $user = $_POST['usuario'];
            $clave = md5($_POST['clave']);
            $rol = $_POST['rol'];

            
            $query = mysqli_query($conexion,"SELECT * FROM usuario WHERE usuario = '$user' OR correo = '$email'");
            
            $resul = mysqli_fetch_array($query);

            if ($resul > 0) {
                $alert  = $alert = '<p class="alert alert-danger w-50"> No esta disponible intente con otro correo o usuario</p> ';
            }else {
                $query_insert = mysqli_query($conexion, "INSERT INTO usuario (nombre,correo,usuario,clave,rol) VALUES ('$nombre','$email','$user','$clave','$rol')");

                if ($query_insert) {
                    $alert = '<p class="alert alert-success"> Registro Exitoso </p> ';
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
                    <h1 class="mt-4"><i class="fa-solid fa-user-plus"></i> Registro de Usuarios</h1>
                        
                        <ol class="breadcrumb mb-2 ">
                            <li class="breadcrumb-item active">Poncelet / Registro Usuario</li> 
                        </ol>
                    
                        
                    </div>   
                        
                        <hr>
                       <!-- contenido del sistema 2--> 
                        <!-- formulario de registro de usuarios-->



                    <div class="container-register">
                        
                        <form action="" method="post" class="fields">

                            <label for="nombre">Nombre</label>
                            <input class="form-control " type="text" name="nombre" id="nombre" placeholder="Introdusca su nombre">
                            <label for="correo">Correo</label>
                            <input class="form-control" type="email" name="correo" id="correo" placeholder="Introdusca su correo">
                            <label for="usuario">Usuario</label>
                            <input class="form-control" type="text" name="usuario" id="usuario" placeholder="Introdusca su usuario">
                            <label for="clave">Clave</label>
                            <input class="form-control" type="password" name="clave" id="clave" placeholder="Introdusca su contraseña de acceso">
                            <hr class="w-100">
                            <!-- selector--> 

                            <div class="input-group mb-3 ">
                                <label class="input-group-text" for="inputGroupSelect01">Tipo de Usuario</label>
                                <select class="form-select w-50"  name="rol" id="rol">
                                    
                                    <option value="1">Administrador</option>
                                    <option value="2">Trabajador</option>
                                    
                                </select>
                            </div>
                            <hr class="w-100">

                            <div class="center">
                                <center>
                                <div class=" align-self-center " role="alert" style=""> <?php echo isset ($alert) ? $alert :''; ?></div>
                                <input type="submit" value="Crear Usuario" class="btn btn-success  border-0 w-50   " data-dismiss="alert" >
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
