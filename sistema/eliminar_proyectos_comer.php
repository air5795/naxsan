<?php
session_start();

include "../conexion.php";

if (!empty($_POST)) {

    
    $id = $_POST['idProE'];


    //eliminar un registro
    $query_delete = mysqli_query($conexion, "DELETE FROM proyectos_comer WHERE id_pro = $id");

    //$query_delete = mysqli_query($conexion,"UPDATE usuario SET estatus = 0 WHERE idusuario = $idusuario");

    if ($query_delete) {
        header('location: proyectos_comer.php');
    }else {
        echo "error al eliminar ";
    }
}
    

    

?>