<?php

session_start();

include("conexion.php");
include("funciones.php");

$usuario = $_SESSION['user'];
$salida = '0';


if ($_POST["operacion"] == "ingreso") {

        // Obtener la hora actual
        date_default_timezone_set('America/La_Paz');
        $hora_actual = date("H:i:s");


        // Determinar el turno según la hora actual
        // 10:00 > 12:00 
        if ($hora_actual > "12:00:00") {
            $turno = "tarde";
        } else {
            $turno = "dia";
        }

        // Obtener la fecha actual en formato YYYY-MM-DD
        $fecha_actual = date("Y-m-d");

        // Verificar el número de registros existentes para el turno actual, el usuario actual y la fecha actual
        $stmt = $conexion->prepare("SELECT COUNT(*) AS cantidad FROM asis WHERE usuario_id = :usuario_id AND fecha_registro = :fecha");
        
        $stmt->bindParam(':usuario_id', $usuario);
        $stmt->bindParam(':fecha', $fecha_actual);
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($resultado['cantidad'] < 2) {


        $stmt = $conexion->prepare("INSERT INTO asis(salida, usuario_id, turno) VALUES(:salida, :usuario_id, :turno)");

        $resultado = $stmt->execute(
            array(
                ':salida'       => $salida,
                ':usuario_id'   => $usuario,
                ':turno'        => $turno
            )
        );

    } else {
        echo '<script>
        Swal.fire({
            icon: "info",
            title: "Registro no creado",
            text: "Ya se han alcanzado los dos registros para este turno y usuario"
        });
      </script>';
    }

    if (!empty($resultado)) {
        echo 'Registro creado';
    }
}




if ($_POST["operacion"] == "Editar") {
    

    $stmt = $conexion->prepare("UPDATE asis SET ingreso=:ingreso, salida=:salida, fecha_registro=:fecha_registro, observacion=:observacion, turno=:turno
                                WHERE id_asistencia = :id_asistencia");

    $resultado = $stmt->execute(
        array(
            ':id_asistencia'        => $_POST["id_asistencia"],   
            ':ingreso'              => $_POST["ingreso"],
            ':salida'               => $_POST["salida"],
            ':fecha_registro'       => $_POST["fecha_registro"],
            ':observacion'          => $_POST["observacion"],
            ':turno'                => $_POST["turno"]
        )

        
    );

    if (!empty($resultado)) {
        echo 'Registro actualizado';
    }
}