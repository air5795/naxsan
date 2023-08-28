<?php

$datos_serializados = $_POST['datos'];
$datos = json_decode($datos_serializados, true);
$nombre = $datos['nombre'];
$celular = $datos['celular'];
$datos = array(
  'nombre' => $nombre,
  'celular' => $celular
);
$datos_serializados = serialize($datos);
$fecha_actual = date('Y-m-d');
$conexion = mysqli_connect('localhost:3316', 'root', 'cotizacion', 'prueba');
$sql = "INSERT INTO cotizacion (fecha_actual, datos_serializados) VALUES ('$fecha_actual', '$datos_serializados')";
if(mysqli_query($conexion, $sql)) {
  echo "Los datos se han guardado correctamente";
} else {
  echo "Ha ocurrido un error al guardar los datos";
}


?>