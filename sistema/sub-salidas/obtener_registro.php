<?php

include("conexion.php");
include("funciones.php");

if (isset($_POST["id_salida"])) {
    $salida = array();
    $stmt = $conexion->prepare("SELECT * FROM salidas WHERE id_salida = '".$_POST["id_salida"]."' LIMIT 1");
    $stmt->execute();
    $resultado = $stmt->fetchAll();
    foreach($resultado as $fila){
        $salida["personal"] = $fila["personal"];
        $salida["fecha"] = $fila["fecha"];
        $salida["hora"] = $fila["hora"];
        $salida["lugar"] = $fila["lugar"];
        $salida["motivo"] = $fila["motivo"];

    
    }

    echo json_encode($salida);
}