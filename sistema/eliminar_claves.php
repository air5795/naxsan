<?php
session_start();

include "../conexion.php";

if (!empty($_POST)) {

    
    $idClave = $_POST['eid_clave'];


    //eliminar un registro
    $query_delete = mysqli_query($conexion, "DELETE FROM claves WHERE id_clave = $idClave");

    //$query_delete = mysqli_query($conexion,"UPDATE usuario SET estatus = 0 WHERE idusuario = $idusuario");

    if ($query_delete) {
        header('location: claves.php');
    }else {
        echo "error al eliminar ";
    }
}
    

    

?>