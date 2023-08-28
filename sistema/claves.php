<?php
    
    session_start();
    include "../conexion.php";


    if (!empty($_POST)) {


        if (empty($_POST['name'])  
        || empty($_POST['user']) 
        || empty($_POST['pasword'])) {
            $alert = '<p class="alert alert-danger "> Todos los Campos Son Obligatorios menos Nombre LI Socio(s)* y Participacion en Asociacion</p> ';
       } 
       else 
     {
            
            $nombre_c = $_POST['name'];
            $user_c = $_POST['user'];
            $pasword_c = $_POST['pasword'];
            
        }


                    $query_insert = mysqli_query($conexion, "INSERT INTO claves(
                        nombre,
                        usuarios,
                        passwords  
                    )
                    VALUES(
                        '$nombre_c',
                        '$user_c',
                        '$pasword_c'
                        
                    )");


            if ($query_insert) {
            
            $alert = '<p class="alert alert-success"> Guardado Correctamente </p> ';
            header("Location: claves.php");

            }else{
            $alert = '<p class="alert alert-danger "> El registro fallo </p> ';
            }
}




?>


<!DOCTYPE html>
<html>
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
                    
                    <h1 class="mt-4 col"> <i class="fa-solid fa-key"></i> Claves PONCELET</h1>  
                        
                        <hr>
                       <!-- contenido del sistema 2--> 




                        


                       <div class="card" style="padding: 0; ">
                        <div class="card-header "  >
                            
                           
                            REGISTRO DE CLAVES DE LA EMPRESA
                        </div>
                        <form action="claves.php" method="post" class="form-control" id="obj1">
                        <div class="card-body "  >
                                <div class="alert alert-secondary row " role="alert" style="padding: 0; margin:0; ">                                
                                
                                        <div class="col-sm-3">
                                            <label for="">Nombre</label>
                                            <input type="text" name="name"  class="form-control form-control-sm">
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="">Usuario</label>
                                            <input type="text" name="user" class="form-control form-control-sm">
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="">Contraseña</label>
                                            <input type="text" name="pasword"  class="form-control form-control-sm">
                                        </div>

                                        <div class="col-sm-2">
                                            <label for=""></label>
                                            <input type="submit" value="Registrar" class="form-control btn-success btn-sm"> 
                                        </div>
                                </form>
                                
                                </div>
                        </div>
                        </div>



                        <!--<table class="table table-bordered">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Handle</th>
                                </tr>
                            </thead>-->


                            <div class="row">
                            
                            <?php
                
                    // rescatar datos DB 
                    $query = mysqli_query($conexion, "SELECT * from claves ");

                   

                    $result = mysqli_num_rows($query);

                    if ($result > 0) {
                        while ($data = mysqli_fetch_array($query)) {

                    ?>
                            <!--<tbody>
                                <tr>
                                    <td><?php echo $data['id_clave'] ?></td>
                                    <td><?php echo $data['nombre'] ?></td>
                                    <td><?php echo $data['usuarios'] ?></td>
                                    <td><?php echo $data['passwords'] ?></td>
                                </tr>-->


                                 <!-- Tarjetas  -->


                                
                                    <div class="card col-sm-2" style="font-size: 14px; padding: 0;">
                                    
                                        <div class="card-header text-center " style="padding: 0; margin: 0; font-weight: 800;">
                                        <?php echo $data['nombre'] ?> 
                                        </div>
                                            <div class="card-body " style="padding: 0;margin: 0; background-color: #fff3cd;">
                                            

                                                <div class="alert alert-warning alert-dismissible fade show" role="alert"> 
                                                <i class="fa-solid fa-user-lock"></i><strong> Usuarios </strong> <input class="form-control form-control-sm" style="text-align: center;" type="text"  id="dos" value="<?php echo $data['usuarios'] ?>" disabled>
                                                    
                                                </div>
                                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                <i class="fa-solid fa-key"></i><strong> Password </strong> <input class="form-control form-control-sm" style="text-align: center;" type="text"  id="dos" value="<?php echo $data['passwords'] ?>" disabled>
                                                    
                                                </div>
                                                <div class=" text-center align-items-center">
                                               
                                                
                                                </div>
                                                
                                            </div>
                                                <a  data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $data['id_clave']; ?> " class="btn btn-outline-warning btn-sm" href=""><i class="fa-solid fa-pencil"></i> Actualizar</a>
                                                <a data-bs-toggle="modal" data-bs-target="#exampleModali<?php echo $data['id_clave']; ?> " class="btn btn-outline-danger btn-sm" href=""><i class="fa-solid fa-trash"></i> Eliminar </a>
                                    </div> 
                                    
                                    
                                <!-- Modal editar  -->
                                <div class="modal fade" id="exampleModal<?php echo $data['id_clave']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="editar_claves.php" method="post">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Editar a <?php echo $data['nombre'] ?> </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="card-header text-center " style="padding: 0; margin: 0;">
                                            <input type="hidden" name="eid_clave" value="<?php echo $data['id_clave']; ?>" >
                                            <label for="">Nombre</label>
                                            <input name="ename" class="form-control" style="text-align: center;" type="text" value=" <?php echo $data['nombre'] ?>">
                                             
                                            </div>
                                                <div class="card-body " style="padding: 0;margin: 0;">

                                                    

                                                    <div class="alert alert-warning alert-dismissible fade show" role="alert"> 
                                                    <i class="fa-solid fa-user-lock"></i><strong> Usuarios </strong> <input class="form-control form-control-sm" style="text-align: center;" type="text"  id="dos" name="euser" value="<?php echo $data['usuarios'] ?>" >
                                                        
                                                    </div>
                                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                    <i class="fa-solid fa-key"></i><strong> Password </strong> <input class="form-control form-control-sm" style="text-align: center;" type="text"  id="dos" name="epass" value="<?php echo $data['passwords'] ?>" >
                                                        
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                            <input type="submit" value="Actualizar Registros">
                                        </div>

                                        </form>
                                        </div>
                                    </div>
                                    </div>

                                     <!-- Modal eliminar  -->
                                <div class="modal fade " id="exampleModali<?php echo $data['id_clave']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content  bg-opacity-80">
                                            <form action="eliminar_claves.php" method="post">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Eliminar registro  </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="card-header text-center " style="padding: 0; margin: 0;">
                                            <input type="hidden" name="eid_clave" value="<?php echo $data['id_clave']; ?>" >
                                            
                                            <input name="ename" class="form-control" style="text-align: center;" type="text" value=" <?php echo $data['nombre'] ?> " disabled>
                                             
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




                                

                                    <script>
                                        function ocultar(){
                                        document.getElementById('obj1').style.display = 'none';
                                        }
                                        function mostrar(){
                                        document.getElementById('obj1').style.display = 'block';
                                        }

                                       
                                    </script>

</div>
                            </tbody>
                            </table>

                        
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