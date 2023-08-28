<?php

    include("conexion.php");
    include("funciones.php");

    $query = "";
    $salida = array();
    $query = "SELECT * FROM exp_general ";

    if (isset($_POST["search"]["value"])) {
       $query .= 'WHERE nombre_contratante LIKE "%' . $_POST["search"]["value"] . '%" ';
       $query .= 'OR monto_bs LIKE "%' . $_POST["search"]["value"] . '%" ';
       $query .= 'OR ubicacion LIKE "%' . $_POST["search"]["value"] . '%" ';
       $query .= 'OR fecha_ejecucion LIKE "%' . $_POST["search"]["value"] . '%" ';
       $query .= 'OR participa_aso LIKE "%' . $_POST["search"]["value"] . '%" ';
       $query .= 'OR n_socio LIKE "%' . $_POST["search"]["value"] . '%" ';
       $query .= 'OR profesional_resp LIKE "%' . $_POST["search"]["value"] . '%" ';
       $query .= 'OR detalle LIKE "%' . $_POST["search"]["value"] . '%" ';
       $query .= 'OR obj_contrato LIKE "%' . $_POST["search"]["value"] . '%" ';
    }

    if (isset($_POST["order"])) {
        $query .= 'ORDER BY' . $_POST['order']['0']['column'] .' '.$_POST["order"][0]['dir'] . '';        
    }else{
        $query .= 'ORDER BY id_exp DESC ';
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
        $image = '';
        if($fila["image"] != '' ){
            $image = '<img class="gallery-item boton-w" src="actas/'.$fila['image'].'" height="70px"   id="actas/'.$fila['image'].'">';
            //$image = '<a class="btn btn-outline-primary btn-sm gallery-item boton-w"  id="actas/'.$fila['image'].'"><i class="fa-solid fa-image"></i> </a>';
        }else{
            $image = '<a class="btn btn-outline-secondary btn-sm gallery-item boton-w disabled" id=""><i class="fa-solid fa-ban"></i> </a>';
        }

        $image2 = '';
        if($fila["image2"] != '' ){
            $image2 = '<img class="gallery-item boton-w" src="actas/'.$fila['image2'].'" height="70px" id="actas/'.$fila['image2'].'">';
            //$image = '<a class="btn btn-outline-primary btn-sm gallery-item boton-w"  id="actas/'.$fila['image'].'"><i class="fa-solid fa-image"></i> </a>';
        }else{
            $image2 = '<a class="btn btn-outline-secondary btn-sm gallery-item boton-w disabled" id=""><i class="fa-solid fa-ban"></i> </a>';
        }

        $image3 = '';
        if($fila["image3"] != '' ){
            $image3 = '<img class="gallery-item boton-w" src="actas/'.$fila['image3'].'" height="70px" id="actas/'.$fila['image3'].'">';
            //$image = '<a class="btn btn-outline-primary btn-sm gallery-item boton-w"  id="actas/'.$fila['image'].'"><i class="fa-solid fa-image"></i> </a>';
        }else{
            $image3 = '<a class="btn btn-outline-secondary btn-sm gallery-item boton-w disabled" id=""><i class="fa-solid fa-ban"></i> </a>';
        }

        $image4 = '';
        if($fila["image4"] != '' ){
            $image4 = '<img class="gallery-item boton-w" src="actas/'.$fila['image4'].'" height="70px" id="actas/'.$fila['image4'].'">';
            //$image = '<a class="btn btn-outline-primary btn-sm gallery-item boton-w"  id="actas/'.$fila['image'].'"><i class="fa-solid fa-image"></i> </a>';
        }else{
            $image4 = '<a class="btn btn-outline-secondary btn-sm gallery-item boton-w disabled" id=""><i class="fa-solid fa-ban"></i> </a>';
        }

        $usuario = '';
        if($fila["usuario_id"] == 1 ){
            $usuario =  '<span style="font-size:12px;background-color:#d1d1d1;text-align: center;color:#4e4e4e;border: 1px solid #2a2a2a;" class="btn btn-info w-100 "><i class="bi bi-person-circle"></i> Alejandro</span>';
        }else if ($fila["usuario_id"] == 29) {
            $usuario =  '<span style="font-size:12px;background-color:#d1d1d1;text-align: center;color:#4e4e4e;border: 1px solid #2a2a2a;" class="btn btn-info w-100 "><i class="bi bi-person-circle"></i> Jazmin</span>';
        }elseif ($fila["usuario_id"] == 12) {
            $usuario =  '<span style="font-size:12px;background-color:#d1d1d1;text-align: center;color:#4e4e4e;border: 1px solid #2a2a2a;" class="btn btn-info w-100 "><i class="bi bi-person-circle"></i> Nicol</span>';
        }elseif ($fila["usuario_id"] == 28) {
            $usuario =  '<span style="font-size:12px;background-color:#d1d1d1;text-align: center;color:#4e4e4e;border: 1px solid #2a2a2a;" class="btn btn-info w-100 "><i class="bi bi-person-circle"></i> Mavel</span>';
        }else{
            $usuario =  '<span style="font-size:12px;background-color:#d1d1d1;text-align: center;color:#4e4e4e;border: 1px solid #2a2a2a;" class="btn btn-info w-100 "><i class="bi bi-person-circle"></i> otro</span>';
        }



        

       
        //fecha de presentacion
        setlocale(LC_TIME, "spanish");
        $fecha =  strftime('%e de %B %Y', strtotime($fila['fecha_ejecucion']));

        //
        

        if ($fila['detalle'] != '') {
            $detalle = '<span style="font-size:12px;background-color:#626262;text-align: left;color:#05ffd1;border: 1px solid #05ffd1;" class="btn btn-info w-100 "><i class="bi bi-clipboard"></i> '.' '.$fila['detalle'].'</span>';
        }else {
            $detalle = '<span style="font-size:12px;background-color:#626262;text-align: left;color:#7fd0ff;" class="btn btn-info w-100 "><i class="bi bi-cart4"> Comercializadora</i></span>';
        }
       



        $sub_array = array();
        $sub_array[] = $fila["id_exp"];
        $sub_array[] = $fila["nombre_contratante"];
        $sub_array[] = $fila["obj_contrato"];
        $sub_array[] = $fila["ubicacion"];
        $sub_array[] = number_format($fila['monto_bs'],2,'.',',').' Bs';
        $sub_array[] = number_format($fila['monto_dolares'],2,'.',',').' $';
      
        $sub_array[] = $fecha;
        $sub_array[] = $detalle;
        $sub_array[] = $usuario;

        //$sub_array[] = $fila["participa_aso"];
        //$sub_array[] = $fila["n_socio"];
        $sub_array[] = $image;
        $sub_array[] = $image2;
        $sub_array[] = $image3;
        $sub_array[] = $image4;
        $sub_array[] = '<button type="button" name="editar" id="'.$fila["id_exp"].'" class="btn btn-warning btn-sm boton-w  editar" style="background-color: #fbe806;color: #505050; color:#767676;"><i class="fa-solid fa-pencil"></i> </button>';
        $sub_array[] = '<button type="button" name="borrar" id="'.$fila["id_exp"].'" class="btn btn-danger btn-sm boton-w borrar" style="background-color: #ff5757;color: #505050; color:white;"><i class="fa-solid fa-trash-can"></i> </button>';
        $sub_array[] = '<button type="button" name="borrar" id="'.$fila["id_exp"].'" class="btn btn-outline-danger btn-sm boton-w img-delete" style="background-color: #ffffff;color: #ff5757;"><i class="bi bi-images"></i> Borrar Actas</button>';
        $datos[] = $sub_array;
    }

    $salida = array(
        "draw"               => intval($_POST["draw"]),
        "recordsTotal"       => $filtered_rows,
        "recordsFiltered"    => obtener_todos_registros(),
        "data"               => $datos
    );

    echo json_encode($salida);