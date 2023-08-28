<?php
session_start();

include "../conexion.php";

if (!empty($_POST)) {

    
    $idClave = $_POST['idR'];


    //eliminar un registro
    $query_delete = mysqli_query($conexion, "DELETE FROM recibos WHERE id_recibo = $idClave");

    //$query_delete = mysqli_query($conexion,"UPDATE usuario SET estatus = 0 WHERE idusuario = $idusuario");

    if ($query_delete) {
        header('location: recibos.php');
    }else {
        echo "error al eliminar ";
    }
}
    

    

?>