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

        $sql = "SELECT * FROM productos WHERE p_descripcion='$name'";
        $resultado = mysqli_query($conexion,$sql);

        while($row = mysqli_fetch_array($resultado)){
            $data["id_producto"] = $row["id_producto"];
            $data["p_descripcion"] = $row["p_descripcion"];
            $data["p_marca"] = $row["p_marca"];
            $data["p_unidad"] = $row["p_unidad"];
            $data["p_precioc"] = $row["p_precioc"];
            $data["p_preciov"] = $row["p_preciov"];
            
        }

       echo json_encode($data);


    }


?>