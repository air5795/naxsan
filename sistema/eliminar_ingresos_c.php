<?php
session_start();

include "../conexion.php";

if (!empty($_POST)) {

    
    $idI = $_POST['idIngreso'];


    //eliminar un registro
    $query_delete = mysqli_query($conexion, "DELETE FROM ingresos_c WHERE id_ingresosC = $idI");

    //$query_delete = mysqli_query($conexion,"UPDATE usuario SET estatus = 0 WHERE idusuario = $idusuario");

    if ($query_delete) {
        header('location: ingresos_c.php');
    }else {
        echo "error al eliminar ";
    }
}
    

    

?>