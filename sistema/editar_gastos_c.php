
<?php 

session_start();

    include "../conexion.php";


    

if (!empty($_POST)) {
    
    $alert = '';
    if (empty($_POST['edetalle']) || empty($_POST['emonto'])) {
        $alert = '<p class="alert alert-danger w-50"> Todos los Campos Son Obligatorios  </p> ';
    } else {
        
        
        $idG = trim($_POST['idGasto']);
        $detalle = trim($_POST['edetalle']);
        $monto = trim($_POST['emonto']);
        

        


        
        
            $query = mysqli_query($conexion,"SELECT * FROM gastos_c");  
                                                  
            $resul = mysqli_fetch_array($query);
          
            $sql_update = mysqli_query($conexion,"UPDATE gastos_c
                                                  SET g_detalleGasto = '$detalle', 
                                                      g_montoBs = '$monto' 
                                                  WHERE id_gastoC = $idG");

                                            
            if ($sql_update ) {
                
                $alert = '<p class="alert alert-success"> Guardado Correctamente </p> ';
                
                //header("Location: inventario_i.php");
                header("Location: gastos_c.php");
                

                 
            } else {
                $alert = '<p class="alert alert-danger "> El registro fallo </p> ';
            }
        }

    }

?>