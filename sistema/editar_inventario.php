
<?php 

session_start();

    include "../conexion.php";

    

    


if (!empty($_POST)) {
    
    
        
        
        $idInv = $_POST['eid_inv'];
        $articulo = $_POST['earticulo'];
        $stock = $_POST['estock'];
        $categoria = $_POST['ecategoria'];


    
        

        


        
        
            $query = mysqli_query($conexion,"SELECT * FROM inventario");  
                                                  
            $resul = mysqli_fetch_array($query);
          
            $sql_update = mysqli_query($conexion,"UPDATE inventario
                                                  SET articulo = '$articulo', stock = '$stock', categoria_id = '$categoria'
                                                  WHERE inventario.id_inv = $idInv");


                                            
            if ($sql_update ) {
                
                $alert = '<p class="alert alert-success"> Guardado Correctamente </p> ';
                
                //header("Location: inventario_i.php");
                header("Location: inventario_i.php");
                

                 
            } else {
                $alert = '<p class="alert alert-danger "> El registro fallo </p> ';
                header("Location: inventario_i.php");
            }
        }

    

?>

