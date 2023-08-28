<?php
session_start();

include "../conexion.php";

if (!empty($_POST)) {

    
    $idASSis = $_POST['idAsis'];


    //eliminar un registro
    $query_delete = mysqli_query($conexion, "DELETE FROM asistencias WHERE id_asistencia = $idASSis");

    //$query_delete = mysqli_query($conexion,"UPDATE usuario SET estatus = 0 WHERE idusuario = $idusuario");

    if ($query_delete) {
        header('location: asistencia.php');
    }else {
        echo "error al eliminar ";
    }
}
    

    

?>