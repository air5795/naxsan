<?php

include('conexion.php');
include("funciones.php");


if(isset($_POST["id_asistencia"]))
{
    $stmt = $conexion->prepare("UPDATE asis SET ingreso=:ingreso, salida=:salida, fecha_registro=:fecha_registro, observacion=:observacion, turno=:turno WHERE id_asistencia = :id_asistencia");

    $resultado = $stmt->execute(
    array(
    ':id_asistencia'        => $_POST["id_asistencia"],   
    ':ingreso'              => $_POST["ingreso"],
    ':salida'               => $_POST["salida"],
    ':fecha_registro'       => $_POST["fecha_registro"],
    ':observacion'          => $_POST["observacion"],
    ':turno'                => $_POST["turno"]
    

));

	
	if(!empty($resultado))
	{
		echo 'Registro Actualizado';
	} else {
        echo 'error';
    }
}



?>