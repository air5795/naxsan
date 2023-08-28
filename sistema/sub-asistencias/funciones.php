<?php


    function obtener_todos_registros(){
        
        include('conexion.php');
        $query = "SELECT * FROM asis WHERE usuario_id = :usuario and fecha_registro = :fecha ";
        $stmt = $conexion->prepare($query);
        $stmt->bindParam(':usuario', $usuario);
        $stmt->bindParam(':fecha', $fecha);
        $stmt->execute();
        $resultado = $stmt->fetchAll();
                return $stmt->rowCount();       
    }

    function obtener_todos_registros2(){
        
        include('conexion.php');
        $query = "SELECT * FROM asis ";
        $stmt = $conexion->prepare($query);
        $stmt->execute();
        $resultado = $stmt->fetchAll();
                return $stmt->rowCount();       
    }