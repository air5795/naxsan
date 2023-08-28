<?php

include('conexion.php');
include("funciones.php");

if(isset($_POST["id_exp"]))
{

	$image = '';
	$image2 = '';
	$image3 = '';
	$image4 = '';
	$image5 = '';
	$image6 = '';
	$image7 = '';
	$image8 = '';
	$image9 = '';
	$image10 = '';
	$image11 = '';
	$image12 = '';
	$image13 = '';
	$image14 = '';
	$image15 = '';

	

	$image = obtener_nombre_imagen($_POST["id_exp"]);
	if($image != ''){
		unlink("actas/" . $image);
	}
	$image2 = obtener_nombre_imagen2($_POST["id_exp"]);
	if($image2 != ''){
		unlink("actas/" . $image2);
	}
	$image3 = obtener_nombre_imagen3($_POST["id_exp"]);
	if($image3 != ''){
		unlink("actas/" . $image3);
	}
	$image4 = obtener_nombre_imagen4($_POST["id_exp"]);
	if($image4 != ''){
		unlink("actas/" . $image4);
	}
	$image5 = obtener_nombre_imagen5($_POST["id_exp"]);
	if($image5 != ''){
		unlink("actas/" . $image5);
	}
	$image6 = obtener_nombre_imagen6($_POST["id_exp"]);
	if($image6 != ''){
		unlink("actas/" . $image6);
	}
	$image7 = obtener_nombre_imagen7($_POST["id_exp"]);
	if($image7 != ''){
		unlink("actas/" . $image7);
	}
	$image8 = obtener_nombre_imagen8($_POST["id_exp"]);
	if($image8 != ''){
		unlink("actas/" . $image8);
	}
	$image9 = obtener_nombre_imagen9($_POST["id_exp"]);
	if($image9 != ''){
		unlink("actas/" . $image9);
	}
	$image10 = obtener_nombre_imagen10($_POST["id_exp"]);
	if($image10 != ''){
		unlink("actas/" . $image10);
	}
	$image11 = obtener_nombre_imagen11($_POST["id_exp"]);
	if($image11 != ''){
		unlink("actas/" . $image11);
	}
	$image12 = obtener_nombre_imagen12($_POST["id_exp"]);
	if($image12 != ''){
		unlink("actas/" . $image12);
	}
	$image13 = obtener_nombre_imagen13($_POST["id_exp"]);
	if($image13 != ''){
		unlink("actas/" . $image13);
	}
	$image14 = obtener_nombre_imagen14($_POST["id_exp"]);
	if($image14 != ''){
		unlink("actas/" . $image14);
	}
	$image15 = obtener_nombre_imagen15($_POST["id_exp"]);
	if($image15 != ''){
		unlink("actas/" . $image15);
	}



	





	$stmt = $conexion->prepare(
		"DELETE FROM exp_general WHERE id_exp = :id_exp"
	);
	$resultado = $stmt->execute(
		array(
			':id_exp'	=>	$_POST["id_exp"]
		)
	);
	
	if(!empty($resultado))
	{
		echo 'Registro borrado';
	}
}



?>