<?php

include('conexion.php');
include("funciones.php");

if(isset($_POST["id_asistencia"]))
{

	
	$stmt = $conexion->prepare(
		"DELETE FROM asis WHERE id_asistencia = :id_asistencia"
	);
	$resultado = $stmt->execute(
		array(
			':id_asistencia'	=>	$_POST["id_asistencia"]
		)
	);
	
	if(!empty($resultado))
	{
		echo 'Registro borrado';
	}
}



?>