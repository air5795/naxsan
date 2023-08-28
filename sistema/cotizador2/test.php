<?php
// Conexion a la base de datos
$host = 'localhost:3316';
$user = 'root';
$password = '';
$db = 'prueba';

$conexion = @mysqli_connect($host, $user, $password, $db);

// Verificar la conexión
if (!$conexion) {
    die("Error de conexión a la base de datos: " . mysqli_connect_error());
}

// Recibir el objeto JSON enviado por AJAX
$formulario = $_POST["formData"];

// Convertir el objeto JSON en un array asociativo de PHP
$formularioArray = json_decode($formulario, true);

// Convertir el array en una cadena serializada
$datosSerializados = serialize($formularioArray);

// Obtener la fecha actual
$fechaActual = date('Y-m-d');

// Consulta SQL para insertar los datos en la tabla "cotizacion"
$sql = "INSERT INTO cotizacion (fecha_actual, datos_serializados) VALUES ('$fechaActual', '$datosSerializados')";

if (mysqli_query($conexion, $sql)) {
    echo "Los datos se han guardado correctamente";
} else {
    echo "Ha ocurrido un error al guardar los datos: " . mysqli_error($conexion);
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>