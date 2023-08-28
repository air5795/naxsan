<?php

include("conexion.php");
include("funciones.php");

if (isset($_POST["id_cliente"])) {
    $salida = array();
    $stmt = $conexion->prepare("SELECT * FROM cliente WHERE id_cliente = '".$_POST["id_cliente"]."' LIMIT 1");
    $stmt->execute();
    $resultado = $stmt->fetchAll();
    foreach($resultado as $fila){
        $salida["nombre"] = $fila["nombre"];
        $salida["nit"] = $fila["nit"];
        $salida["telefono"] = $fila["telefono"];
        $salida["direccion"] = $fila["direccion"];
        $salida["estatus"] = $fila["estatus"];

    
    }

    echo json_encode($salida);
}