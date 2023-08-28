<?php

include('conexion.php');
include("funciones.php");

if(isset($_POST["id_salida"]))
{

	
	$stmt = $conexion->prepare(
		"DELETE FROM salidas WHERE id_salida = :id_salida"
	);
	$resultado = $stmt->execute(
		array(
			':id_salida'	=>	$_POST["id_salida"]
		)
	);
	
	if(!empty($resultado))
	{
		echo 'Registro borrado';
	}
}



?>