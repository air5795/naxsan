<?php

include("conexion.php");
include("funciones.php");

if (isset($_POST["id_asistencia"])) {
    $salida = array();
    $stmt = $conexion->prepare("SELECT * FROM asis WHERE id_asistencia = '".$_POST["id_asistencia"]."' LIMIT 1");
    $stmt->execute();
    $resultado = $stmt->fetchAll();
    foreach($resultado as $fila){
        $salida["ingreso"] = $fila["ingreso"];
        $salida["salida"] = $fila["salida"];
        $salida["fecha_registro"] = $fila["fecha_registro"];
        $salida["observacion"] = $fila["observacion"];
        $salida["estado"] = $fila["estado"];
        $salida["usuario_id"] = $fila["usuario_id"];
        $salida["turno"] = $fila["turno"];  
    }
    echo json_encode($salida);
} else {
    echo 'error';
}