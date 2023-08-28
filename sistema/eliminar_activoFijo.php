<?php
session_start();

include "../conexion.php";

if (!empty($_POST)) {

    
    $idAc = $_POST['idAct'];


    //eliminar un registro
    $query_delete = mysqli_query($conexion, "DELETE FROM activo_fijo WHERE id_activoFijo = $idAc");

    //$query_delete = mysqli_query($conexion,"UPDATE usuario SET estatus = 0 WHERE idusuario = $idusuario");

    if ($query_delete) {
        header('location: activos.php');
    }else {
        echo "error al eliminar ";
    }
}
    

    

?>