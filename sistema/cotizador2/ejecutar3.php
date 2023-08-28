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


    if(isset($_POST['nombre'])){
        $name = $_POST['nombre'];

        $sql = "SELECT * FROM productos_s WHERE s_descripcion='$name'";
        $resultado = mysqli_query($conexion,$sql);

        while($row = mysqli_fetch_array($resultado)){
            $data["id_producto_s"] = $row["id_producto_s"];
            $data["s_descripcion"] = $row["s_descripcion"];
            $data["s_marca"] = $row["s_marca"];
            $data["s_unidad"] = $row["s_unidad"];
            $data["s_precioc"] = $row["s_precioc"];
            $data["s_preciov"] = $row["s_preciov"];
            
        }

       echo json_encode($data);


    }


?>