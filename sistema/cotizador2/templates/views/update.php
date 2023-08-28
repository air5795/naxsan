<?php
    // conexion a bases de datos
    $host = 'localhost:3316';
    $user = 'root';
    $password = '';
    $db = 'cotizacion';

    $conexion = @mysqli_connect($host,$user,$password,$db);

    

    if (!$conexion) {
        echo "Error en la conexion";
    } 


    if (!empty($_POST['id_producto2'] && !empty($_POST['concepto2']) && !empty($_POST['precio_unitario2']) && !empty($_POST['precio_unitario_c2']) && !empty($_POST['tipo2']) && !empty($_POST['marca2']))   ) {

        $id_producto2 = $_POST['id_producto2'];
        $precio_unitario_c2 = $_POST['precio_unitario_c2'];
        $precio_unitario2 = $_POST['precio_unitario2'];
        $tipo2 = $_POST['tipo2'];
        $marca2 = $_POST['marca2'];
        $concepto2 = $_POST['concepto2'];
        
        echo $id_producto2;
        echo $precio_unitario2;
        echo $tipo2;
        echo $precio_unitario_c2;
        echo $marca2;
        echo $concepto2;

        $sql = "UPDATE productos SET p_preciov =$precio_unitario2, p_precioc =$precio_unitario_c2, p_tipo ='$tipo2', p_marca ='$marca2', p_descripcion ='$concepto2' WHERE id_producto =$id_producto2";

        $result = mysqli_query($conexion, $sql);

        if ($result) {
        header("location: /poncelet-sis/sistema/cotizador/");
        }
        else {
            echo 'error';
        }
    }
    else {
        echo 'error';
    }


?>

