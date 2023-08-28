<?php
session_start();

include "../conexion.php";

if (!empty($_POST)) {

    
    $idC = $_POST['idCategoria'];


    //eliminar un registro
    $query_delete = mysqli_query($conexion, "DELETE FROM categoria_i WHERE id_categoria = $idC");

    //$query_delete = mysqli_query($conexion,"UPDATE usuario SET estatus = 0 WHERE idusuario = $idusuario");

    if ($query_delete) {
        header('location: categorias_i.php');
    }else {
        echo "error al eliminar ";
    }
}
    

    

?>