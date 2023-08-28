<?php

include("conexion.php");
include("funciones.php");

if (isset($_POST["id_pro"])) {
    $salida = array();
    $stmt = $conexion->prepare("SELECT * FROM proyectos_comer WHERE id_pro = '".$_POST["id_pro"]."' LIMIT 1");
    $stmt->execute();
    $resultado = $stmt->fetchAll();
    foreach($resultado as $fila){
        $salida["nombre"] = $fila["nombre"];
        $salida["rubro"] = $fila["rubro"];
        $salida["tipo"] = $fila["tipo"];
        $salida["tipo2"] = $fila["tipo2"];
        $salida["ubicacion"] = $fila["ubicacion"];
        $salida["num_tramite"] = $fila["num_tramite"];
        $salida["num_comprobante"] = $fila["num_comprobante"];
        $salida["cuce"] = $fila["cuce"];
        $salida["monto"] = $fila["monto"];
        $salida["monto_ofertado"] = $fila["monto_ofertado"];
        $salida["fecha"] = $fila["fecha"];
        $salida["estado"] = $fila["estado"];
        $salida["posicion"] = $fila["posicion"];
        $salida["observacion"] = $fila["observacion"];
        $salida["encargado"] = $fila["encargado"];
        $salida["jazmin"] = $fila["jazmin"];
        $salida["mavel"] = $fila["mavel"];
        $salida["ale"] = $fila["ale"];
        $salida["nicol"] = $fila["nicol"];
        $salida["edwin"] = $fila["edwin"];

    
    }

    echo json_encode($salida);
}