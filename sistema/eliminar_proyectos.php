<?php
session_start();

include "../conexion.php";

if (!empty($_POST)) {

    
    $idP = $_POST['idProyecto'];


    //eliminar un registro
    $query_delete = mysqli_query($conexion, "DELETE FROM proyectos WHERE id_proyecto = $idP");

    //$query_delete = mysqli_query($conexion,"UPDATE usuario SET estatus = 0 WHERE idusuario = $idusuario");

    if ($query_delete) {
        header('location: proyectos_c.php');
    }else {
        echo "error al eliminar ";
    }
}
    

    

?>