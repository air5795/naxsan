
<?php 

session_start();

    include "../conexion.php";


if (!empty($_POST)) {
    $alert = '';
    if (empty($_POST['ename']) || empty($_POST['euser']) || empty($_POST['epass'])) {
        $alert = '<p class="alert alert-danger w-50"> Todos los Campos Son Obligatorios menos telefono* </p> ';
    } else {
        
        $idClave = $_POST['eid_clave'];
        $names = $_POST['ename'];
        $users = $_POST['euser'];
        $passs = $_POST['epass'];

        
            $query = mysqli_query($conexion,"SELECT * FROM claves");  
                                                  
            $resul = mysqli_fetch_array($query);
            
        }
        
            
            
            $sql_update = mysqli_query($conexion,"UPDATE claves
                                                  SET nombre = '$names', usuarios = '$users',  passwords = '$passs'  
                                                  WHERE id_clave = $idClave ");    
            

            
            if ($sql_update) {
                header('location: claves.php');
            }
            else{
                $alert = '<p class="alert alert-danger w-50"> LA ACTUALIZACION FALLO </p> ';
            }
        }
    

?>
