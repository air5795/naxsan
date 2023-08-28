
<?php 

session_start();

    include "../conexion.php";


if (!empty($_POST)) {
    $alert = '';
    if (empty($_POST['ncategoria'])) {
        $alert = '<p class="alert alert-danger w-50"> Todos los Campos Son Obligatorios menos telefono* </p> ';
    } else {
        
        $idCate = $_POST['nid_categoria'];
        $cate = $_POST['ncategoria'];
    

        
            $query = mysqli_query($conexion,"SELECT * FROM categoria_i");  
                                                  
            $resul = mysqli_fetch_array($query);
            
        }
        
            
            
            $sql_update = mysqli_query($conexion,"UPDATE categoria_i
                                                  SET nombre_categoria = '$cate'  
                                                  WHERE id_categoria = $idCate ");    
            

            
            if ($sql_update) {
                header('location: categorias_i.php');
            }
            else{
                $alert = '<p class="alert alert-danger w-50"> LA ACTUALIZACION FALLO </p> ';
            }
        }
    

?>
