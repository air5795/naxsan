
<?php 

session_start();

    include "../conexion.php";


if (!empty($_POST)) {
    $alert = '';
    if (empty($_POST['enombre'])) {
        $alert = '<p class="alert alert-danger w-50"> Todos los Campos Son Obligatorios  </p> ';
    } else {
        
        $idClave    = $_POST['eid'];
        $nombre     = $_POST['enombre'];
        $monto      = $_POST['emonto'];
        $fecha      = $_POST['efecha'];
        $concepto   = $_POST['econcepto'];

        
            $query = mysqli_query($conexion,"SELECT * FROM recibos");  
                                                  
            $resul = mysqli_fetch_array($query);
            
        }
        
            
            
            $sql_update = mysqli_query($conexion,"UPDATE recibos
                                                  SET nombre_r = '$nombre', monto = '$monto',  concepto = '$concepto' ,  fecha = '$fecha'  
                                                  WHERE id_recibo = $idClave ");    
            

            
            if ($sql_update) {
                header('location: recibos.php');
            }
            else{
                $alert = '<p class="alert alert-danger w-50"> LA ACTUALIZACION FALLO </p> ';
                header('location: editar_recibos.php');
            }
        }
    

?>
