<?php

include("conexion.php");
include("funciones.php");

if (isset($_POST["id_producto"])) {
    $salida = array();
    $stmt = $conexion->prepare("SELECT * FROM productos WHERE id_producto = '".$_POST["id_producto"]."' LIMIT 1");
    $stmt->execute();
    $resultado = $stmt->fetchAll();
    foreach($resultado as $fila){
        $salida["nombre"] = $fila["p_descripcion"];
        $salida["marca"] = $fila["p_marca"];
        $salida["unidad"] = $fila["p_unidad"];
        $salida["pc"] = $fila["p_precioc"];
        $salida["pv"] = $fila["p_preciov"];
        $salida["tipo"] = $fila["p_tipo"];
        $salida["proveedor"] = $fila["p_proveedor"];

        /* FOTO */ 
        if ($fila["foto"] != "") {
            $salida["foto"] = '<img src="productos/' . $fila["foto"] . '"  class="img-thumbnail" width="150" height="150" />
            <input type="hidden" name="img_o" value="'.$fila["foto"].'" />';
        }else{
            $salida["foto"] = '<div class="alert alert-danger" role="alert"> <input type="hidden" name="img_o" value="" /> <i class="bi bi-exclamation-octagon-fill"></i> Sin Foto</div>' ;
            //$salida["foto"] = '<input type="hidden" name="img_o" value="" />';
        }
        
        /* PDF */
        if ($fila["pdf"] != "") {
            $salida["ficha"] = '<div class="alert alert-success" role="alert"> <input name="ficha_o" type="hidden" value="'.$fila["pdf"].'" /> <i class="bi bi-check-circle-fill"></i> Contiene Ficha Tecnica</div>' ;
        }else{
            $salida["ficha"] = '<div class="alert alert-danger" role="alert"> <input name="ficha_o" type="hidden" value="" /> <i class="bi bi-exclamation-octagon-fill"></i> Sin Ficha Tecnica</div>' ;
            //$salida["ficha"] = '<input type="hidden" name="ficha_o" value="" />';
        }

        /* CERTIFIACADO */

        
        
        if ($fila["certificado"] != "") {
            $salida["certificado"] = '<div class="alert alert-success" role="alert"> <input name=" certificado_o" type="hidden" value="'.$fila["certificado"].'" /> <i class="bi bi-check-circle-fill"></i> Contiene Certificado</div>' ;

        }else{
            $salida["certificado"] = '<div class="alert alert-danger" role="alert"> <input name=" certificado_o" type="hidden" value="" /> <i class="bi bi-exclamation-octagon-fill"></i> Sin Certificado</div>' ;
            //$salida["certificado"] = '<input type="hidden" name="certificado_o" value="" />';
        }
    }

    echo json_encode($salida);
}