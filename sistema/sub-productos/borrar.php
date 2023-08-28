<?php

include('conexion.php');
include("funciones.php");

if(isset($_POST["id_producto"]))
{

	$imagen = '';
	$ficha = ''; 
	$certificados = '';

	$imagen = obtener_nombre_imagen($_POST["id_producto"]);
	if($imagen != '')
	{
		unlink("productos/" . $imagen);
	}
	$ficha = obtener_nombre_ficha($_POST["id_producto"]);
	if($ficha != '')
	{
		unlink("fichas/" . $ficha);
	}
	$certificados = obtener_nombre_certificado($_POST["id_producto"]);
	if($certificados != '')
	{
		unlink("certificados/" . $certificados);
	}





	$stmt = $conexion->prepare(
		"DELETE FROM productos WHERE id_producto = :id_producto"
	);
	$resultado = $stmt->execute(
		array(
			':id_producto'	=>	$_POST["id_producto"]
		)
	);
	
	if(!empty($resultado))
	{
		echo 'Registro borrado';
	}
}



?>