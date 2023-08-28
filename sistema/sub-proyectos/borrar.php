<?php

include('conexion.php');
include("funciones.php");

if(isset($_POST["id_pro"]))
{

	
	$stmt = $conexion->prepare(
		"DELETE FROM proyectos_comer WHERE id_pro = :id_pro"
	);
	$resultado = $stmt->execute(
		array(
			':id_pro'	=>	$_POST["id_pro"]
		)
	);
	
	if(!empty($resultado))
	{
		echo 'Registro borrado';
	}
}



?>