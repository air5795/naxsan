<?php
session_start();

include "../conexion.php";

if (!empty($_POST)) {

    
    $idG = $_POST['idGasto'];


    //eliminar un registro
    $query_delete = mysqli_query($conexion, "DELETE FROM gastos WHERE id_gasto = $idG");

    //$query_delete = mysqli_query($conexion,"UPDATE usuario SET estatus = 0 WHERE idusuario = $idusuario");

    if ($query_delete) {
        header('location: gastos.php');
    }else {
        echo "error al eliminar ";
    }
}
    

    

?>