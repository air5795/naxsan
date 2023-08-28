<?php

include("conexion.php");
include("funciones.php");




if ($_POST["operacion"] == "Crear") {


    $stmt = $conexion->prepare("INSERT INTO proyectos_comer(nombre, rubro, tipo, tipo2, ubicacion, num_tramite, num_comprobante, cuce, monto, monto_ofertado, fecha, estado, posicion , observacion , encargado, jazmin, mavel, nicol, ale, edwin)
                                VALUES(:nombre,:rubro, :tipo, :tipo2, :ubicacion, :tramite, :comprobante, :cuce, :monto,:monto_ofertado, :fecha, :estado, :posicion ,  :observacion, :encargado,  :jazmin, :mavel, :nicol, :ale, :edwin)");

    $resultado = $stmt->execute(
        array(
            ':nombre'           => $_POST["nombre"],
            ':rubro'           => $_POST["rubro"],
            ':ubicacion'        => $_POST["ubicacion"],
            ':tipo'             => $_POST["tipo"],
            ':tipo2'            => $_POST["tipo2"],
            ':tramite'          => $_POST["tramite"],
            ':comprobante'      => $_POST["comprobante"],
            ':monto'            => $_POST["monto"],
            ':monto_ofertado'   => $_POST["monto_ofertado"],
            ':cuce'             => $_POST["cuce"],
            ':estado'           => $_POST["estado"],
            ':posicion'         => $_POST["posicion"],
            ':observacion'      => $_POST["observacion"],
            ':encargado'        => $_POST["encargado"],
            ':fecha'            => $_POST["fecha"],
            ':jazmin'           => $_POST["jazmin"],
            ':mavel'            => $_POST["mavel"],
            ':nicol'            => $_POST["nicol"],
            ':ale'              => $_POST["ale"],
            ':edwin'            => $_POST["edwin"]
        )
    );

    if (!empty($resultado)) {
        echo 'Registro creado';
    }
}


if ($_POST["operacion"] == "Editar") {
    

    $stmt = $conexion->prepare("UPDATE proyectos_comer SET rubro=:rubro, nombre=:nombre, tipo=:tipo, tipo2=:tipo2, ubicacion=:ubicacion, num_tramite=:tramite, num_comprobante=:comprobante, cuce=:cuce, monto=:monto, 
    monto_ofertado=:monto_ofertado,fecha=:fecha,estado=:estado,posicion=:posicion,observacion=:observacion,encargado=:encargado,jazmin=:jazmin,mavel=:mavel,ale=:ale,nicol=:nicol,edwin=:edwin WHERE id_pro = :id_pro");

    $resultado = $stmt->execute(
        array(
            ':id_pro'       => $_POST["id_pro"],   
            ':nombre'       => $_POST["nombre"],
            'rubro'       => $_POST["rubro"],
            ':tipo'         => $_POST["tipo"],
            ':tipo2'        => $_POST["tipo2"],
            ':ubicacion'    => $_POST["ubicacion"],
            ':tramite'      => $_POST["tramite"],
            ':comprobante'  => $_POST["comprobante"],
            ':cuce'         => $_POST["cuce"],
            ':monto'        => $_POST["monto"],
            ':monto_ofertado'   => $_POST["monto_ofertado"],
            ':fecha'        => $_POST["fecha"],
            ':estado'       => $_POST["estado"],
            ':posicion'     => $_POST["posicion"],
            ':observacion'  => $_POST["observacion"],
            ':encargado'    => $_POST["encargado"],
            ':jazmin'       => $_POST["jazmin"],
            ':mavel'        => $_POST["mavel"],
            ':nicol'        => $_POST["nicol"],
            ':ale'          => $_POST["ale"],
            ':edwin'        => $_POST["edwin"]
          

        )

        
    );

    if (!empty($resultado)) {
        echo 'Registro actualizado';
    }
}