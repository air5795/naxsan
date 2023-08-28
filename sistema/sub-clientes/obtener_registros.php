<?php


    include("conexion.php");
    include("funciones.php");

    
    

    $query = "";
    $salida = array();
    $query = "SELECT * FROM cliente ";

    if (isset($_POST["search"]["value"])) {
       $query .= 'WHERE nombre LIKE "%' . $_POST["search"]["value"] . '%" ';
       $query .= 'OR nit LIKE "%' . $_POST["search"]["value"] . '%" ';
       $query .= 'OR telefono LIKE "%' . $_POST["search"]["value"] . '%" ';
       $query .= 'OR direccion LIKE "%' . $_POST["search"]["value"] . '%" ';
    }

    if (isset($_POST["order"])) {
        $query .= 'ORDER BY' . $_POST['order']['0']['column'] .' '.$_POST["order"][0]['dir'] . '';        
    }else{
        $query .= 'ORDER BY idcliente DESC ';
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

        //fecha de presentacion
        setlocale(LC_TIME, "spanish");
        $fecha =  strftime('%e de %B %Y', strtotime($fila['dateadd']));

        //NIT

        if ($fila['nit'] == "0" or  $fila['nit'] == "") {
            $nit =  '<span style="font-size:12px;background-color:#c55b5b;color:white;border:none;" class="btn btn-info btn-sm w-100"><i class="bi bi-x-octagon"></i> NO TIENE NIT </span>'.'<br/><br/>';
        } else {
            $nit =  '<span style="font-size:12px;color:#646464;border:none;font-weight: 700;">'.$fila["nit"].' </span>'.'<br/>';
        }

        //estado
        if ($fila['estatus'] == 1) {
            $fila['estatus'] = '<span style="font-size:12px;background-color:#5bc55b;color:white;border:none;" class="btn btn-info btn-sm w-100"><i class="bi bi-check-circle"></i> ACTIVO </span>'.'<br/><br/>';
        } else {
            $fila['estatus'] = '<span style="font-size:12px;background-color:#c55b5b;color:white;border:none;" class="btn btn-info btn-sm w-100"><i class="bi bi-x-octagon"></i> INACTIVO </span>'.'<br/><br/>';
        }


        
        

        
        $sub_array = array();
        $sub_array[] = $fila["idcliente"];
        $sub_array[] = $fila["nombre"];
        $sub_array[] = $nit;
        $sub_array[] = $fila["telefono"];
        $sub_array[] = $fila["direccion"];
        $sub_array[] = $fecha;
        $sub_array[] = $fila["estatus"];
        $sub_array[] = '<button type="button" name="editar" id="'.$fila["idcliente"].'" class="btn btn-warning btn-sm boton-w  editar" style="background-color: #fbe806;color: #505050; color:#767676;"><i class="fa-solid fa-pencil"></i> </button>';
        $sub_array[] = '<button type="button" name="borrar" id="'.$fila["idcliente"].'" class="btn btn-danger btn-sm boton-w borrar" style="background-color: #ff5757;color: #505050; color:white;"><i class="fa-solid fa-trash-can"></i> </button>';
           
        
        
        $datos[] = $sub_array;
    }

    $salida = array(
        "draw"               => intval($_POST["draw"]),
        "recordsTotal"       => $filtered_rows,
        "recordsFiltered"    => obtener_todos_registros(),
        "data"               => $datos
    );

    echo json_encode($salida);