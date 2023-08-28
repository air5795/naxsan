<?php

    function subir_imagen(){
        if (isset($_FILES["imagen_usuario"])) {
            
            $extension = explode('.', $_FILES["imagen_usuario"]['name']);
            $nuevo_nombre = rand() . '.' . $extension[1];
            $ubicacion = './img/' . $nuevo_nombre;
            move_uploaded_file($_FILES["imagen_usuario"]['tmp_name'], $ubicacion);
            return $nuevo_nombre;
        }
    }

    function obtener_nombre_imagen($id_producto){
        include('conexion.php');
        $stmt = $conexion->prepare("SELECT foto FROM productos WHERE id_producto = '$id_producto'");
        $stmt->execute();
        $resultado = $stmt->fetchAll();
        foreach($resultado as $fila){
            return $fila["foto"];
        }
    }

    function obtener_todos_registros(){
        include('conexion.php');
        $stmt = $conexion->prepare("SELECT * FROM productos");
        $stmt->execute();
        $resultado = $stmt->fetchAll(); 
        return $stmt->rowCount();       
    }