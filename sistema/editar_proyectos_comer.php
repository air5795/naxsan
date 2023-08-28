
<?php 

session_start();

    include "../conexion.php";


    

if (!empty($_POST)) {
    
    $alert = '';
    if (empty($_POST['enombre']) || empty($_POST['eubi'])|| empty($_POST['emonto'])|| empty($_POST['eestado'])) {
        $alert = '<p class="alert alert-danger w-50"> Todos los Campos Son Obligatorios  </p> ';
    } else {
        
        
        $idPRO = trim($_POST['eid_pro']);
        $nombre = trim($_POST['enombre']);
        $ubi = trim($_POST['eubi']);
        $tramite = trim($_POST['etramite']);
        $comprobante = trim($_POST['ecomprobante']);
        $cuce = trim($_POST['ecuce']);
        $monto = trim($_POST['emonto']);
        $obs = trim($_POST['eobs']);
        $estado = trim($_POST['eestado']);

        


        
        
            $query = mysqli_query($conexion,"SELECT * FROM proyectos_comer");  
                                                  
            $resul = mysqli_fetch_array($query);
          
            $sql_update = mysqli_query($conexion,"UPDATE proyectos_comer
                                                  SET nombre = '$nombre', 
                                                      ubicacion = '$ubi', 
                                                      num_tramite = '$tramite', 
                                                      num_comprobante = '$comprobante', 
                                                      cuce = '$cuce', 
                                                      monto = '$monto',
                                                      estado = '$estado',
                                                      observacion = '$obs' 
                                                  WHERE id_pro = $idPRO");

                                            
            if ($sql_update ) {
                
                $alert = '<p class="alert alert-success"> Guardado Correctamente </p> ';
                
                //header("Location: inventario_i.php");
                header("Location: proyectos_comer.php");
                

                 
            } else {
                $alert = '<p class="alert alert-danger "> El registro fallo </p> ';
            }
        }

    }

?>