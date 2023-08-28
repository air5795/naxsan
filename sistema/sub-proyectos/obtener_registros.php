<?php

    include("conexion.php");
    include("funciones.php");

    $query = "";
    $salida = array();
    $query = "SELECT * from proyectos_comer ";

    if (isset($_POST["search"]["value"])) {
       $query .= 'WHERE nombre LIKE "%' . $_POST["search"]["value"] . '%" ';
       $query .= 'OR cuce LIKE "%' . $_POST["search"]["value"] . '%" ';
       $query .= 'OR rubro LIKE "%' . $_POST["search"]["value"] . '%" ';
       $query .= 'OR ubicacion LIKE "%' . $_POST["search"]["value"] . '%" ';
       $query .= 'OR estado LIKE "%' . $_POST["search"]["value"] . '%" ';
       $query .= 'OR encargado LIKE "%' . $_POST["search"]["value"] . '%" ';
    }

    if (isset($_POST["order"])) {
        $query .= 'ORDER BY' . $_POST['order']['0']['column'] .' '.$_POST["order"][0]['dir'] . '';        
    }else{
        $query .= 'ORDER BY fecha DESC ';
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

        if ($fila['jazmin'] == '') {
            $jazmin =  '';
        }else {
            $jazmin =  '<span style="font-size:12px;background-color:#fff5ca;text-align: left;" class="btn btn-info btn-sm w-100"><i class="bi bi-person-circle"></i> Jazmin Velasco </span>'.'<br/>'.$fila["jazmin"].'<br/>';
        }

        if ($fila['mavel'] == '') {
            $mavel =  '';
        }else {
            $mavel =  '<span style="font-size:12px;background-color:#fff5ca;text-align: left;" class="btn btn-info btn-sm w-100"><i class="bi bi-person-circle"></i> Mavel Condori  </span>'.'<br/>'.$fila["mavel"].'<br/>';
        }

        if ($fila['nicol'] == '') {
            $nicol =  '';
        }else {
            $nicol =  '<span style="font-size:12px;background-color:#fff5ca;text-align: left;" class="btn btn-info btn-sm w-100"><i class="bi bi-person-circle"></i> Nicol Erquicia </span>'.'<br/>'.$fila["nicol"].'<br/>';
        }

        if ($fila['ale'] == '') {
            $ale =  '';
        }else {
            $ale =  '<span style="font-size:12px;background-color:#fff5ca;text-align: left;" class="btn btn-info btn-sm w-100"><i class="bi bi-person-circle"></i> Alejandro Iglesias </span>'.'<br/>'.$fila["ale"].'<br/>';
        }

        if ($fila['edwin'] == '') {
            $edwin =  '';
        }else {
            $edwin =  '<span style="font-size:12px;background-color:#fff5ca;text-align: left;" class="btn btn-info btn-sm w-100"><i class="bi bi-person-circle"></i> Edwin Pinto </span>'.'<br/>'.$fila["edwin"].'<br/>';
        }

        if ($fila['num_tramite'] == '') {
            $tramite =  '';
        }else {
            $tramite =  '<span style="font-size:12px;background-color:#ffffff;text-align: left;color:black;" class="btn btn-primary btn-sm w-100"><i class="bi bi-card-heading"></i> N° de Tramite </span>'.'<br/>'.$fila["num_tramite"].'<br/>';
        }

        if ($fila['num_comprobante'] == '') {
            $comprobante =  '';
        }else {
            $comprobante =  '<span style="font-size:12px;background-color:#ffffff;text-align: left;color:black;" class="btn btn-primary btn-sm w-100"><i class="bi bi-card-heading"></i> N° de Comprobante </span>'.'<br/>'.$fila["num_comprobante"].'<br/>';
        }

        if ($fila['cuce'] == '') {
            $cuce =  '';
        }else {
            $cuce =  '<span style="font-size:12px;background-color:#ffffff;text-align: left;color:black;" class="btn btn-primary btn-sm w-100"><i class="bi bi-card-heading"></i> CUCE </span>'.'<br/>'.$fila["cuce"].'<br/>';
        }



        if ($fila['estado'] == 'pagado') {
            $estado =  '<span style="font-size:10px;background-color: #1b6600;color: #ffffff;border: greenyellow 3px solid;border-radius: 10px;" class="btn btn-success btn-sm w-100"><i class="bi bi-currency-dollar"></i> </br> Pagado</span>';
        }elseif ($fila['estado'] == 'no') {
            $estado =  '<span style="font-size:10px;background-color:#f77171;color:white;" class="btn btn-warning btn-sm w-100"><i class="bi bi-x-lg"></i> </br> No Adjudicado  </span>';
        }elseif ($fila['estado'] == 'adjudicado') {
            $estado =  '<span style="font-size:10px;background-color:#009b65;color:white;border: 1px solid #3bff3b;" class="btn btn-warning btn-sm w-100"><i class="bi bi-check-lg"></i> </br> Adjudicado  </span>';
        }else if ($fila['estado'] == 'proceso') {
            $estado =  '<span style="font-size:10px;background-color:#fff769;" class="btn btn-warning btn-sm w-100"><i class="bi bi-exclamation-triangle"></i> </br> En Proceso </span>';
        }else {
            $estado =  '<span style="font-size:10px;background-color:#ff9038; color:white" class="btn btn-warning btn-sm w-100"><i class="bi bi-check2"></i> </span>';
        }

        // tipo

        if ($fila['tipo2'] == '') {
            $tipo =  '';
        }else {
            $tipo = $fila["tipo"].'<span class="tipo" style="font-size:12px;background-color:#ecffca;text-align: left;" </span>'.'<br/>'.'Por '.$fila["tipo2"].'<br/>'; 
        }

        // encargado

        if ($fila['encargado'] == 'mavel') {
            $encargado1 = '<span style="font-size:12px;background-color:#cafbff;text-align: left;" class="btn btn-info btn-sm w-100"><i class="bi bi-pin-fill"></i> Mavel  </span>'.'<br/>';
        } else {
            $encargado1 = '';
        }

        if ($fila['encargado'] == 'ale') {
            $encargado2 = '<span style="font-size:12px;background-color:#cafbff;text-align: left;" class="btn btn-info btn-sm w-100"><i class="bi bi-pin-fill"></i> Alejandro  </span>'.'<br/>';
        } else {
            $encargado2 = '';
        }

        if ($fila['encargado'] == 'nicol') {
            $encargado3 = '<span style="font-size:12px;background-color:#cafbff;text-align: left;" class="btn btn-info btn-sm w-100"><i class="bi bi-pin-fill"></i> Nicol  </span>'.'<br/>';
        } else {
            $encargado3 = '';
        }

        
        if ($fila['encargado'] == 'jazmin') {
            $encargado4 = '<span style="font-size:12px;background-color:#cafbff;text-align: left;" class="btn btn-info btn-sm w-100"><i class="bi bi-pin-fill"></i> Jazmin   </span>'.'<br/>';
        } else {
            $encargado4 = '';
        }

        
        if ($fila['encargado'] == 'edwin') {
            $encargado5 = '<span style="font-size:12px;background-color:#cafbff;text-align: left;" class="btn btn-info btn-sm w-100"><i class="bi bi-pin-fill"></i> Edwin </span>'.'<br/>';
        } else {
            $encargado5 = '';
        }
        

        if ($fila['rubro'] == 'CONSTRUCTORA') {
            $rubro = '<span style="font-size:12px;background-color:#626262;text-align: left;color:yellow;border: 1px solid yellow;" class="btn btn-info w-100 "><i class="bi bi-tools"></i> Constructora</span>';
        }else {
            $rubro = '<span style="font-size:12px;background-color:#626262;text-align: left;color:#7fd0ff;" class="btn btn-info w-100 "><i class="bi bi-cart4"> Comercializadora</i></span>';
        }

       

        

        //fecha de presentacion
        setlocale(LC_TIME, "spanish");
        $fecha =  strftime('%e de %B %Y', strtotime($fila['fecha']));

        //
        
        $sub_array = array();
        $sub_array[] = $fila["id_pro"];
        $sub_array[] = $rubro;
        $sub_array[] = $fila["nombre"];
        
        $sub_array[] = $fila["ubicacion"];
        
        $sub_array[] = number_format($fila['monto'],2,'.',',').' Bs';
        $sub_array[] = number_format($fila['monto_ofertado'],2,'.',',').' Bs';
        
        $sub_array[] = $fecha;
        $sub_array[] = $fila["posicion"];
        $sub_array[] = $tipo;
        $sub_array[] = $fila["observacion"];
        $sub_array[] = $tramite.$cuce.$comprobante;
        
        $sub_array[] = $estado;
        
        $sub_array[] = $encargado1.$encargado2.$encargado3.$encargado4.$encargado5;
        $sub_array[] =  $jazmin.$mavel.$nicol.$ale.$edwin;
        $sub_array[] = '<button type="button" name="editar" id="'.$fila["id_pro"].'" class="btn btn-warning btn-sm boton-w  editar" style="background-color: #fbe806;color: #505050; color:#767676;"><i class="fa-solid fa-pencil"></i> </button>';
        $sub_array[] = '<button type="button" name="borrar" id="'.$fila["id_pro"].'" class="btn btn-danger btn-sm boton-w borrar" style="background-color: #ff5757;color: #505050; color:white;"><i class="fa-solid fa-trash-can"></i> </button>';
        $datos[] = $sub_array;
    }

    $salida = array(
        "draw"               => intval($_POST["draw"]),
        "recordsTotal"       => $filtered_rows,
        "recordsFiltered"    => obtener_todos_registros(),
        "data"               => $datos
    );

    echo json_encode($salida);