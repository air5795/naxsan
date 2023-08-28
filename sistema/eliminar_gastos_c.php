<?php
session_start();

include "../conexion.php";

if (!empty($_POST)) {

    
    $idG = $_POST['idGasto'];


    //eliminar un registro
    $query_delete = mysqli_query($conexion, "DELETE FROM gastos_c WHERE id_gastoC = $idG");

    //$query_delete = mysqli_query($conexion,"UPDATE usuario SET estatus = 0 WHERE idusuario = $idusuario");

    if ($query_delete) {
        header('location: gastos_c.php');
    }else {
        echo "error al eliminar ";
    }
}
    

    

?>