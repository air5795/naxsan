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

        $sql = "SELECT * FROM cliente WHERE nombre='$name'";
        $resultado = mysqli_query($conexion,$sql);

        while($row = mysqli_fetch_array($resultado)){
            $data["nombre"] = $row["nombre"];
            $data["nit"] = $row["nit"];
            $data["direccion"] = $row["direccion"];
        }

       echo json_encode($data);


    }


?>