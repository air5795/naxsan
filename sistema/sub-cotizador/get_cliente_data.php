<?php
// Establecer la conexión a la base de datos


$servername = "localhost:3316";
$username = "root";
$password = "";
$dbname = "naxsan";

// Crear la conexión
$conexion = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error en la conexión a la base de datos: " . $conexion->connect_error);
}

// Obtener el cliente seleccionado del parámetro GET
$selectedCliente = $_GET['cliente'];

// Consultar los datos del cliente en la base de datos
$query = "SELECT * FROM cliente WHERE nombre = ?";
$stmt = $conexion->prepare($query);
$stmt->bind_param("s", $selectedCliente);
$stmt->execute();
$result = $stmt->get_result();

// Verificar si se encontraron resultados
if ($result->num_rows > 0) {
    // Obtener los datos del cliente
    $data = $result->fetch_assoc();
} else {
    // Si no se encontraron resultados, inicializar los datos como un arreglo vacío
    $data = array();
}

// Devolver los datos del cliente en formato JSON
header('Content-Type: application/json');
echo json_encode($data);

// Cerrar la conexión a la base de datos
$stmt->close();
$conexion->close();
?>
