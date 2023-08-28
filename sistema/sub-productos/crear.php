<?php

include("conexion.php");
include("funciones.php");




if ($_POST["operacion"] == "Crear") {
    $imagen = '';
    $ficha = '';
    $certificado = '';
    if ($_FILES["foto"]["name"] != '') {
        $imagen = subir_imagen();
    }
    if ($_FILES["ficha"]["name"] != '') {
        $ficha = subir_ficha();
    }
    if ($_FILES["certificado"]["name"] != '') {
        $certificado = subir_certificado();
    }
    $stmt = $conexion->prepare("INSERT INTO productos(p_descripcion, p_marca, p_unidad, p_precioc, p_preciov, p_tipo, p_proveedor, foto, pdf, certificado)
                                VALUES(:nombre, :marca, :unidad, :pc, :pv, :tipo, :proveedor, :foto, :ficha, :certificado)");

    $resultado = $stmt->execute(
        array(
            ':nombre'           => $_POST["nombre"],
            ':marca'            => $_POST["marca"],
            ':unidad'           => $_POST["unidad"],
            ':pc'               => $_POST["pc"],
            ':pv'               => $_POST["pv"],
            ':tipo'             => $_POST["tipo"],
            ':proveedor'        => $_POST["proveedor"],
            ':foto'             => $imagen,
            ':ficha'            => $ficha,
            ':certificado'      => $certificado
        )
    );

    if (!empty($resultado)) {
        echo 'Registro creado';
    }
}



	




if ($_POST["operacion"] == "Editar") {
    $imagen = obtener_nombre_imagen($_POST["id_producto"]);
    $ficha = obtener_nombre_ficha($_POST["id_producto"]);
    $certificados = obtener_nombre_certificado($_POST["id_producto"]);

    if ($_FILES["ficha"]["name"] != '') {
        unlink("fichas/" . $ficha);
        $ficha = subir_ficha();
    } 
    else {
        $ficha = @$_POST['ficha_o'];    
    } 

    if ($_FILES["certificado"]["name"] != '') {
        unlink("certificados/" . $certificados); 
        $certificado =  subir_certificado();
    }
    else {
        $certificado = @$_POST['certificado_o'];
    }


    if ($_FILES["foto"]["name"] != '') {
        unlink("productos/" . $imagen);
         $imagen = subir_imagen();
    }
    else {

        $imagen = @$_POST['img_o'];     
    }
    




    $stmt = $conexion->prepare("UPDATE productos SET p_descripcion=:nombre, p_marca=:marca, p_unidad=:unidad, p_precioc=:pc, p_preciov=:pv, p_tipo=:tipo, p_proveedor=:proveedor, 
    foto=:foto,pdf=:ficha,certificado=:certificado WHERE id_producto = :id_producto");

    $resultado = $stmt->execute(
        array(
            ':id_producto'      => $_POST["id_producto"],
            ':nombre'           => $_POST["nombre"],
            ':marca'            => $_POST["marca"],
            ':unidad'           => $_POST["unidad"],
            ':pc'               => $_POST["pc"],
            ':pv'               => $_POST["pv"],
            ':tipo'             => $_POST["tipo"],
            ':proveedor'        => $_POST["proveedor"],
            ':foto'             => $imagen,
            ':ficha'            => $ficha,
            ':certificado'      => $certificado

        )

        

        
    );

    if (!empty($resultado)) {
        echo 'Registro actualizado';
    }
}