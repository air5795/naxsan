<?php
session_start();

include "../conexion.php";

if (!empty($_POST)) {

    
    $idI = $_POST['idInv'];


    $query = mysqli_query($conexion,"SELECT * FROM inventario
            WHERE id_inv = $idI");

        $result = mysqli_num_rows($query);
        if ($result > 0) {
        while ($data = mysqli_fetch_array($query)) {
        $ruta = 'img/inventario/';
        $image = $data['foto'];
        $ruta2 = $ruta.$image;
    
    }
}


    //eliminar un registro
    $query_delete = mysqli_query($conexion, "DELETE FROM inventario WHERE id_inv= $idI");
    if ($query_delete) {
        header('location: inventario_i.php');
        if ($ruta2 != '' ) {
            unlink($ruta2);
        
        } 
    }else {
        echo "error al eliminar ";
    }

    //$query_delete = mysqli_query($conexion,"UPDATE usuario SET estatus = 0 WHERE idusuario = $idusuario");

}
    

    

?>