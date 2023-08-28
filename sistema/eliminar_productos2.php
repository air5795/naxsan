<?php
session_start();

include "../conexion.php";

if (!empty($_POST)) {

    
    $idPRO = $_POST['idPro_s'];


    $query = mysqli_query($conexion,"SELECT * FROM productos_s
            WHERE id_producto_s = $idPRO");

        $result = mysqli_num_rows($query);
        if ($result > 0) {
        while ($data = mysqli_fetch_array($query)) {
        $ruta = 'img/productos_s/';
        $image = $data['s_foto'];
        $ruta2 = $ruta.$image;

        $ruta3 = 'img/fichas_tecnicas_s/';
        $pdf = $data['s_pdf'];
        $ruta4 = $ruta3.$pdf;
    
    }
}

        


    //eliminar un registro
    $query_delete = mysqli_query($conexion, "DELETE FROM productos_s WHERE id_producto_s= $idPRO");
    if ($query_delete) {
        header('location: productos_old.php');
        if ($ruta2 != '' ) {
            unlink($ruta2);
        
        }
        if ($ruta4 != '' ) {
            unlink($ruta4);
        
        }  
    }else {
        echo "error al eliminar ";
    }

    //$query_delete = mysqli_query($conexion,"UPDATE usuario SET estatus = 0 WHERE idusuario = $idusuario");

}
    

    

?>