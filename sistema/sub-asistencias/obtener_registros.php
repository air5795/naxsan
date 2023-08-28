<?php
session_start();
date_default_timezone_set('America/La_Paz');


include("conexion.php");
include("funciones.php");

    $usuario = $_SESSION['user'];
    setlocale(LC_TIME, "spanish");
    $fecha = date("Y-m-d");
    // Consulta SQL para obtener los datos del usuario
    $query = "SELECT * FROM asis WHERE usuario_id = :usuario and fecha_registro = :fecha ";

     if (isset($_POST["order"])) {
         $query .= 'ORDER BY' . $_POST['order']['0']['column'] .' '.$_POST["order"][0]['dir'] . '';        
     }else{
         $query .= 'ORDER BY id_asistencia DESC ';
     }
 
     if($_POST["length"] != -1){
         $query .= 'LIMIT ' . $_POST["start"] . ','. $_POST["length"];
     }



    $stmt = $conexion->prepare($query);
    $stmt->bindParam(':usuario', $usuario);
    $stmt->bindParam(':fecha', $fecha);
    $stmt->execute();
    $resultado = $stmt->fetchAll();

    $datos = array();
    $filtered_rows = $stmt->rowCount();
    
    foreach($resultado as $fila){
    


        // encargado

        if ($fila['usuario_id'] == 'levam') {
            $encargado1 = '<span style="font-size:12px;background-color:#caffe1;text-align: left; color:#5a5a5a;" class="btn  btn-sm w-100"><i class="bi bi-person-circle"></i> Mavel Condori  </span>'.'<br/>';
        } else {
            $encargado1 = '';
        }

        if ($fila['usuario_id'] == 'admin') {
            $encargado2 = '<span style="font-size:12px;background-color:#e9ffca;text-align: left; color:#5a5a5a;" class="btn  btn-sm w-100"><i class="bi bi-person-circle"></i> Alejandro Iglesias  </span>'.'<br/>';
        } else {
            $encargado2 = '';
        }

        if ($fila['usuario_id'] == 'Nicol10') {
            $encargado3 = '<span style="font-size:12px;background-color:#fde7de;text-align: left; color:#5a5a5a;" class="btn  btn-sm w-100"><i class="bi bi-person-circle"></i> Nicol Erquicia  </span>'.'<br/>';
        } else {
            $encargado3 = '';
        }

        
        if ($fila['usuario_id'] == 'Jazmin Velasco') {
            $encargado4 = '<span style="font-size:12px;background-color:#fbe9f4;text-align: left; color:#5a5a5a;" class="btn  btn-sm w-100"><i class="bi bi-person-circle"></i> Jazmin Velasco   </span>'.'<br/>';
        } else {
            $encargado4 = '';
        }

        
        if ($fila['usuario_id'] == 'edwin') {
            $encargado5 = '<span style="font-size:12px;background-color:#cafbff;text-align: left; color:#5a5a5a;" class="btn  btn-sm w-100"><i class="bi bi-person-circle"></i> Edwin Pinto </span>'.'<br/>';
        } else {
            $encargado5 = '';
        }

        //fecha Ingreso
        setlocale(LC_TIME, "spanish");
        $fecha =  strftime('%e de %B %Y', strtotime($fila['fecha_registro']));

        // INGRESO
        setlocale(LC_TIME, "spanish");
        $ingreso =  strftime('%H:%M:%S', strtotime($fila['ingreso']));
        $ingreso = '<span style="color: #319f6c;font-size: larger;font-family: system-ui;" >'.$ingreso.' </span>'.'<br/>';

        // SALIDA
        if ($fila['salida'] == '0000-00-00 00:00:00' ) {
            $salida = '<span style="font-size:12px;text-align: center; color:red;" ><i class="bi bi-x-octagon"></i> </span>'.'<br/>';
            
        }else {
            $salida = $fila['salida'] ;
            $salida =  strftime('%H:%M:%S', strtotime($salida));
            $salida = '<span style="color: #e50202;font-size: larger;font-family: system-ui;" >'.$salida.' </span>'.'<br/>';
        }


        // turno
        if ($fila['turno'] == 'dia') {
            $turno = '<span style="font-size:12px;background-color:#ffffc2;text-align: left; color:#5a5a5a;" class="btn  btn-sm w-100"><i class="bi bi-sun"></i> Mañana  </span>'.'<br/>';
        } else {
            $turno = '<span style="font-size:12px;background-color:#c6d1f7;text-align: left; color:#5a5a5a;" class="btn  btn-sm w-100"><i class="bi bi-cloud-moon"></i> Tarde  </span>'.'<br/>';
        }

        $sub_array = array();
        $sub_array[] = '<button type="button" name="salida" id="'.$fila["id_asistencia"].'" class="btn btn-danger btn-sm boton-w salida"> Salida </button>';
        $sub_array[] = '<button type="button" name="editar" id="'.$fila["id_asistencia"].'" class="btn btn-warning btn-sm boton-w  editar" style="background-color: #fbe806;color: #505050; color:#767676;"><i class="fa-solid fa-pencil"></i>  </button>';
        $sub_array[] = $encargado1.$encargado2.$encargado3.$encargado4.$encargado5;

        
        $sub_array[] = $ingreso;
        $sub_array[] = $salida;
        $sub_array[] = $fecha;
        $sub_array[] = $turno;





        if ($fila['salida'] == '0000-00-00 00:00:00') {
            $sub_array[] = "";
        } else{

            $fecha1 = DateTime::createFromFormat("Y-m-d H:i:s", $fila['ingreso']);
            $fecha2 = DateTime::createFromFormat("Y-m-d H:i:s", $fila['salida']);

        if ($fecha1 && $fecha2) {
            $intervalo = $fecha1->diff($fecha2);
            $f = $intervalo->format('Trabajo %a Dias %H horas y %i min ');
            $total_minutos = ($intervalo->h * 60) + $intervalo->i;
            $porcentaje = min(($total_minutos / 240) * 100, 100);
            
            // Establecer el color de la barra de progreso
            $color = ($total_minutos >= 225) ? '#43b55f' : 'red';

            // Generar el código HTML de la barra de progreso
            $barra_progreso = '<div class="progress" style="background-color: #a7a7a7; border:1px solid green">';
            $barra_progreso .= '<div class="progress-bar" role="progressbar" style="width: ' . $porcentaje . '%; background-color: ' . $color . ';" aria-valuenow="' . $porcentaje . '" aria-valuemin="0" aria-valuemax="100"></div>';
            $barra_progreso .= '</div>';

            // Agregar la barra de progreso al subarray
            $sub_array[] = $barra_progreso.$f;
        } else {
            $sub_array[] = "Error ";
        }

        }

        




        
        $sub_array[] = $fila["observacion"];
       
       
        
        $datos[] = $sub_array;

    }

    $salida = array(
        "draw"               => intval($_POST["draw"]),
        "recordsTotal"       => $filtered_rows,
        "recordsFiltered"    => obtener_todos_registros(),
        "data"               => $datos
    );

    echo json_encode($salida);