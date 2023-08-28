<?php

include("conexion.php");
include("funciones.php");




if ($_POST["operacion"] == "Crear") {


    $stmt = $conexion->prepare("INSERT INTO cliente(nit, nombre, telefono, direccion, estatus)
                                VALUES(:nit, :nombre, :telefono, :direccion, :estatus)");

    $resultado = $stmt->execute(
        array(
            ':nombre'         => $_POST["nombre"],
            ':nit'            => $_POST["nit"],
            ':telefono'       => $_POST["telefono"],
            ':direccion'      => $_POST["direccion"],
            ':estatus'        => '1'
        
        )
    );

    if (!empty($resultado)) {
        echo 'Registro creado';
    }
}



	




if ($_POST["operacion"] == "Editar") {
    

    $stmt = $conexion->prepare("UPDATE salidas SET personal=:personal, lugar=:lugar, motivo=:motivo WHERE id_salida = :id_salida");

    $resultado = $stmt->execute(
        array(
            ':id_salida'       => $_POST["id_salida"],
            ':personal'       => $_POST["personal"],
            ':lugar'         => $_POST["lugar"],
            ':motivo'        => $_POST["motivo"]
          

        )

        
    );

    if (!empty($resultado)) {
        echo 'Registro actualizado';
    }
}