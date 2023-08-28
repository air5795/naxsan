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
            $imagen = '<a class="btn btn-outline-primary btn-sm gallery-item boton-w"  id="productos/'.$fila['foto'].'"><i class="fa-solid fa-image"></i> </a>';
        }else{
            $imagen = '<a class="btn btn-outline-secondary btn-sm gallery-item boton-w disabled" id=""><i class="fa-solid fa-ban"></i> </a>';
        }

        $ficha = '';
        if($fila["pdf"] != ''){
            $ficha = '<a  target="_blank" class="btn btn-outline-danger btn-sm boton-w boton-f " href="fichas/'.$fila['pdf'].' "><i class="bi bi-file-earmark-pdf-fill"></i></a>';
        }else{
            $ficha = '<a class="btn btn-outline-secondary btn-sm boton-w disabled" href="" ><i class="fa-solid fa-ban"></i></a>';
        }

        $certificado = '';
        if($fila["certificado"] != ''){
            $certificado = '<a  target="_blank" class="btn btn-outline-danger btn-sm boton-w boton-c" href="certificados/'.$fila['certificado'].' "><i class="bi bi-file-earmark-post"></i></a>';
        }else{
            $certificado = '<a  class="btn btn-outline-secondary btn-sm boton-w disabled" href=""><i class="fa-solid fa-ban"></i></a>';
        }



        $sub_array = array();
        $sub_array[] = $fila["id_producto"];
        $sub_array[] = $fila["p_descripcion"];
        $sub_array[] = $fila["p_marca"];
        $sub_array[] = $fila["p_unidad"];
        $sub_array[] = $fila["p_precioc"].' Bs';
        $sub_array[] = $fila["p_preciov"].' Bs';
        $sub_array[] = $fila["p_tipo"];
        $sub_array[] = $fila["p_proveedor"];
        $sub_array[] = $fila["p_fecha_registro"];
        $sub_array[] = $imagen;
        $sub_array[] = $ficha;
        $sub_array[] = $certificado;
        $sub_array[] = '<button type="button" name="editar" id="'.$fila["id_producto"].'" class="btn btn-warning btn-sm boton-w  editar" style="background-color: #fbe806;color: #505050; color:#767676;"><i class="fa-solid fa-pencil"></i> </button>';
        $sub_array[] = '<button type="button" name="borrar" id="'.$fila["id_producto"].'" class="btn btn-danger btn-sm boton-w borrar" style="background-color: #ff5757;color: #505050; color:white;"><i class="fa-solid fa-trash-can"></i> </button>';
        $datos[] = $sub_array;
    }

    $salida = array(
        "draw"               => intval($_POST["draw"]),
        "recordsTotal"       => $filtered_rows,
        "recordsFiltered"    => obtener_todos_registros(),
        "data"               => $datos
    );

    echo json_encode($salida);