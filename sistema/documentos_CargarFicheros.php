<?php

// Cómo subir el archivo
$fichero = $_FILES["file"];
$fecha = date("d-M-Y");

// Cargando el fichero en la carpeta "subidas"
move_uploaded_file($fichero["tmp_name"], "subidas/".$fichero["name"]);

// Redirigiendo hacia atrás
header("Location: " . $_SERVER["HTTP_REFERER"]);
?>