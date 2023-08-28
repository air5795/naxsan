
<?php 

session_start();

    include "../conexion.php";


if (!empty($_POST)) {
    $alert = '';
    if (empty($_POST['efecha']) ) {
        $alert = '<p class="alert alert-danger w-50"> Todos los Campos Son Obligatorios menos telefono* </p> ';
    } else {
        
        $idAsis = $_POST['eid_inv'];
        $Obs = $_POST['eobs'];
        $Fecha = $_POST['efecha'];

        
            $query = mysqli_query($conexion,"SELECT * FROM asistencias");  
                                                  
            $resul = mysqli_fetch_array($query);
            
        }
        
            
            
            $sql_update = mysqli_query($conexion,"UPDATE asistencias
                                                  SET fecha_asis = '$Fecha', observacion_asis = '$Obs'  
                                                  WHERE id_asistencia = $idAsis ");    
            

            
            if ($sql_update) {
                header('location: asistencia.php');
            }
            else{
                $alert = '<p class="alert alert-danger w-50"> LA ACTUALIZACION FALLO </p> ';
            }
        }
    

?>
