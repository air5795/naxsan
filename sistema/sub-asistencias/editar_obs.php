<?php

include('conexion.php');
include("funciones.php");


if(isset($_POST["id_asistencia"]))
{
    $stmt = $conexion->prepare("UPDATE asis SET  observacion=:obs WHERE id_asistencia = :id_asistencia");

    $resultado = $stmt->execute(
    array(
    ':id_asistencia'        => $_POST["id_asistencia"],   
    ':obs'                  => $_POST["obs"]
    )

    );

	
	if(!empty($resultado))
	{
		echo 'Registro Actualizado';
	} else {
        echo 'error';
    }
}



?>