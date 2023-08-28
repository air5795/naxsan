<?php
session_start();

include "../conexion.php";

if (!empty($_POST)) {

    
    $idA = $_POST['idActivo'];


    //eliminar un registro
    $query_delete = mysqli_query($conexion, "DELETE FROM activos WHERE id_activo = $idA");

    //$query_delete = mysqli_query($conexion,"UPDATE usuario SET estatus = 0 WHERE idusuario = $idusuario");

    if ($query_delete) {
        header('location: categorias_a.php');
    }else {
        echo "error al eliminar ";
    }
}
    

    

?>