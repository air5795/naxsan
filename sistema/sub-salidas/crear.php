<?php

include("conexion.php");
include("funciones.php");




if ($_POST["operacion"] == "Crear") {


    $stmt = $conexion->prepare("INSERT INTO salidas(personal, lugar, motivo)
                                VALUES(:personal, :lugar, :motivo)");

    $resultado = $stmt->execute(
        array(
            ':personal'         => $_POST["personal"],
            ':lugar'            => $_POST["lugar"],
            ':motivo'           => $_POST["motivo"]
        
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