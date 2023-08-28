<?php

    include("conexion.php");
    include("funciones.php");

    $query = "";
    $salida = array();
    $query = "SELECT * FROM productos ";

    if (isset($_POST["search"]["value"])) {
       $query .= 'WHERE p_descripcion LIKE "%' . $_POST["search"]["value"] . '%" ';
       $query .= 'OR p_marca LIKE "%' . $_POST["search"]["value"] . '%" ';
    }

    if (isset($_POST["order"])) {
        $query .= 'ORDER BY' . $_POST['order']['0']['column'] .' '.$_POST["order"][0]['dir'] . '';        
    }else{
        $query .= 'ORDER BY id_producto DESC ';
    }

    if($_POST["length"] != -1){
        $query .= 'LIMIT ' . $_POST["start"] . ','. $_POST["length"];
    }

    $stmt = $conexion->prepare($query);
    $stmt->execute();
    $resultado = $stmt->fetchAll();
    $datos = array();
    $filtered_rows = $stmt->rowCount();
    foreach($resultado as $fila){
        $imagen = '';
        if($fila["foto"] != ''){
            $imagen = '<img src="productos/' . $fila["foto"] . '"  class="img-thumbnail" width="50" height="35" />';
        }else{
            $imagen = '';
        }

        $sub_array = array();
        $sub_array[] = $fila["id_producto"];
        $sub_array[] = $fila["p_descripcion"];
        $sub_array[] = $fila["p_marca"];
        $sub_array[] = $fila["p_unidad"];
        $sub_array[] = $fila["p_precioc"];
        $sub_array[] = $fila["p_preciov"];
        $sub_array[] = $fila["p_tipo"];
        $sub_array[] = $fila["p_proveedor"];
        $sub_array[] = $fila["p_fecha_registro"];
        $sub_array[] = $imagen;
        $sub_array[] = '<button type="button" name="editar" id="'.$fila["id_producto"].'" class="btn btn-warning btn-xs editar">Editar</button>';
        $sub_array[] = '<button type="button" name="borrar" id="'.$fila["id_producto"].'" class="btn btn-danger btn-xs borrar">Borrar</button>';
        $datos[] = $sub_array;
    }

    $salida = array(
        "draw"               => intval($_POST["draw"]),
        "recordsTotal"       => $filtered_rows,
        "recordsFiltered"    => obtener_todos_registros(),
        "data"               => $datos
    );

    echo json_encode($salida);