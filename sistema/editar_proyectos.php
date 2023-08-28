
<?php 

session_start();

    include "../conexion.php";


    

if (!empty($_POST)) {
    
    $alert = '';
    if (empty($_POST['ename']) || empty($_POST['ecolor'])) {
        $alert = '<p class="alert alert-danger w-50"> Todos los Campos Son Obligatorios  </p> ';
    } else {
        
        
        $idPRO = trim($_POST['idProyecto']);
        $nombre = trim($_POST['ename']);
        $color = trim($_POST['ecolor']);
        

        


        
        
            $query = mysqli_query($conexion,"SELECT * FROM proyectos");  
                                                  
            $resul = mysqli_fetch_array($query);
          
            $sql_update = mysqli_query($conexion,"UPDATE proyectos
                                                  SET pro_nombre = '$nombre', 
                                                      color = '$color' 
                                                  WHERE id_proyecto = $idPRO");

                                            
            if ($sql_update ) {
                
                $alert = '<p class="alert alert-success"> Guardado Correctamente </p> ';
                
                //header("Location: inventario_i.php");
                header("Location: proyectos_c.php");
                

                 
            } else {
                $alert = '<p class="alert alert-danger "> El registro fallo </p> ';
            }
        }

    }

?>