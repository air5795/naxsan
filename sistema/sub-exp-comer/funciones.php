<?php
   

     function subir_image(){
        if (isset($_FILES["image"])) {

            include('conexion.php');
            $stmt = $conexion->prepare("SELECT COUNT(id_exp) FROM exp_general;");
            $stmt->execute();
            $resultado = $stmt->fetchAll();
            foreach($resultado as $fila){
                $data = $fila["COUNT(id_exp)"];
                
            }

            $num = $data +1;

            $fecha_ejecucion = $_POST['fecha_ejecucion'];
            $extension = explode('.', $_FILES["image"]['name']);
            //$nuevo_nombre = 'Acta-'.date('d-m-y').'-'.rand() . '.' . $extension[1];
            $nuevo_nombre = 'acta_'.$fecha_ejecucion.'_'.$num.'_1'.'.'. $extension[1];
            $ubicacion = './actas/' . $nuevo_nombre;
            move_uploaded_file($_FILES["image"]['tmp_name'], $ubicacion);
            return $nuevo_nombre;
        }
    }

    function subir_image2(){
        if (isset($_FILES["image2"])) {

            include('conexion.php');
            $stmt = $conexion->prepare("SELECT COUNT(id_exp) FROM exp_general;");
            $stmt->execute();
            $resultado = $stmt->fetchAll();
            foreach($resultado as $fila){
                $data = $fila["COUNT(id_exp)"];
                
            }

            $num = $data +1;

            $fecha_ejecucion = $_POST['fecha_ejecucion'];
            $extension = explode('.', $_FILES["image2"]['name']);
            //$nuevo_nombre = 'Acta-'.date('d-m-y').'-'.rand() . '.' . $extension[1];
            $nuevo_nombre = 'acta_'.$fecha_ejecucion.'_'.$num.'_2'.'.'. $extension[1];
            $ubicacion = './actas/' . $nuevo_nombre;
            move_uploaded_file($_FILES["image2"]['tmp_name'], $ubicacion);
            return $nuevo_nombre;
        }
    }

    function subir_image3(){
        if (isset($_FILES["image3"])) {

            include('conexion.php');
            $stmt = $conexion->prepare("SELECT COUNT(id_exp) FROM exp_general;");
            $stmt->execute();
            $resultado = $stmt->fetchAll();
            foreach($resultado as $fila){
                $data = $fila["COUNT(id_exp)"];
                
            }

            $num = $data +1;

            $fecha_ejecucion = $_POST['fecha_ejecucion'];
            $extension = explode('.', $_FILES["image3"]['name']);
            //$nuevo_nombre = 'Acta-'.date('d-m-y').'-'.rand() . '.' . $extension[1];
            $nuevo_nombre = 'acta_'.$fecha_ejecucion.'_'.$num.'_3'.'.'. $extension[1];
            $ubicacion = './actas/' . $nuevo_nombre;
            move_uploaded_file($_FILES["image3"]['tmp_name'], $ubicacion);
            return $nuevo_nombre;
        }
    }

    function subir_image4(){
        if (isset($_FILES["image4"])) {

            include('conexion.php');
            $stmt = $conexion->prepare("SELECT COUNT(id_exp) FROM exp_general;");
            $stmt->execute();
            $resultado = $stmt->fetchAll();
            foreach($resultado as $fila){
                $data = $fila["COUNT(id_exp)"];
                
            }

            $num = $data +1;

            $fecha_ejecucion = $_POST['fecha_ejecucion'];
            $extension = explode('.', $_FILES["image4"]['name']);
            //$nuevo_nombre = 'Acta-'.date('d-m-y').'-'.rand() . '.' . $extension[1];
            $nuevo_nombre = 'acta_'.$fecha_ejecucion.'_'.$num.'_4'.'.'. $extension[1];
            $ubicacion = './actas/' . $nuevo_nombre;
            move_uploaded_file($_FILES["image4"]['tmp_name'], $ubicacion);
            return $nuevo_nombre;
        }
    }

    function subir_image5(){
        if (isset($_FILES["image5"])) {

            include('conexion.php');
            $stmt = $conexion->prepare("SELECT COUNT(id_exp) FROM exp_general;");
            $stmt->execute();
            $resultado = $stmt->fetchAll();
            foreach($resultado as $fila){
                $data = $fila["COUNT(id_exp)"];
                
            }

            $num = $data +1;

            $fecha_ejecucion = $_POST['fecha_ejecucion'];
            $extension = explode('.', $_FILES["image5"]['name']);
            //$nuevo_nombre = 'Acta-'.date('d-m-y').'-'.rand() . '.' . $extension[1];
            $nuevo_nombre = 'acta_'.$fecha_ejecucion.'_'.$num.'_5'.'.'. $extension[1];
            $ubicacion = './actas/' . $nuevo_nombre;
            move_uploaded_file($_FILES["image5"]['tmp_name'], $ubicacion);
            return $nuevo_nombre;
        }
    }

    function subir_image6(){
        if (isset($_FILES["image6"])) {

            include('conexion.php');
            $stmt = $conexion->prepare("SELECT COUNT(id_exp) FROM exp_general;");
            $stmt->execute();
            $resultado = $stmt->fetchAll();
            foreach($resultado as $fila){
                $data = $fila["COUNT(id_exp)"];
                
            }

            $num = $data +1;

            $fecha_ejecucion = $_POST['fecha_ejecucion'];
            $extension = explode('.', $_FILES["image6"]['name']);
            //$nuevo_nombre = 'Acta-'.date('d-m-y').'-'.rand() . '.' . $extension[1];
            $nuevo_nombre = 'acta_'.$fecha_ejecucion.'_'.$num.'_6'.'.'. $extension[1];
            $ubicacion = './actas/' . $nuevo_nombre;
            move_uploaded_file($_FILES["image6"]['tmp_name'], $ubicacion);
            return $nuevo_nombre;
        }
    }

    function subir_image7(){
        if (isset($_FILES["image7"])) {

            include('conexion.php');
            $stmt = $conexion->prepare("SELECT COUNT(id_exp) FROM exp_general;");
            $stmt->execute();
            $resultado = $stmt->fetchAll();
            foreach($resultado as $fila){
                $data = $fila["COUNT(id_exp)"];
                
            }

            $num = $data +1;

            $fecha_ejecucion = $_POST['fecha_ejecucion'];
            $extension = explode('.', $_FILES["image7"]['name']);
            //$nuevo_nombre = 'Acta-'.date('d-m-y').'-'.rand() . '.' . $extension[1];
            $nuevo_nombre = 'acta_'.$fecha_ejecucion.'_'.$num.'_7'.'.'. $extension[1];
            $ubicacion = './actas/' . $nuevo_nombre;
            move_uploaded_file($_FILES["image7"]['tmp_name'], $ubicacion);
            return $nuevo_nombre;
        }
    }

    function subir_image8(){
        if (isset($_FILES["image8"])) {

            include('conexion.php');
            $stmt = $conexion->prepare("SELECT COUNT(id_exp) FROM exp_general;");
            $stmt->execute();
            $resultado = $stmt->fetchAll();
            foreach($resultado as $fila){
                $data = $fila["COUNT(id_exp)"];
                
            }

            $num = $data +1;

            $fecha_ejecucion = $_POST['fecha_ejecucion'];
            $extension = explode('.', $_FILES["image8"]['name']);
            //$nuevo_nombre = 'Acta-'.date('d-m-y').'-'.rand() . '.' . $extension[1];
            $nuevo_nombre = 'acta_'.$fecha_ejecucion.'_'.$num.'_8'.'.'. $extension[1];
            $ubicacion = './actas/' . $nuevo_nombre;
            move_uploaded_file($_FILES["image8"]['tmp_name'], $ubicacion);
            return $nuevo_nombre;
        }
    }

    function subir_image9(){
        if (isset($_FILES["image9"])) {

            include('conexion.php');
            $stmt = $conexion->prepare("SELECT COUNT(id_exp) FROM exp_general;");
            $stmt->execute();
            $resultado = $stmt->fetchAll();
            foreach($resultado as $fila){
                $data = $fila["COUNT(id_exp)"];
                
            }

            $num = $data +1;

            $fecha_ejecucion = $_POST['fecha_ejecucion'];
            $extension = explode('.', $_FILES["image9"]['name']);
            //$nuevo_nombre = 'Acta-'.date('d-m-y').'-'.rand() . '.' . $extension[1];
            $nuevo_nombre = 'acta_'.$fecha_ejecucion.'_'.$num.'_9'.'.'. $extension[1];
            $ubicacion = './actas/' . $nuevo_nombre;
            move_uploaded_file($_FILES["image9"]['tmp_name'], $ubicacion);
            return $nuevo_nombre;
        }
    }

    function subir_image10(){
        if (isset($_FILES["image10"])) {

            include('conexion.php');
            $stmt = $conexion->prepare("SELECT COUNT(id_exp) FROM exp_general;");
            $stmt->execute();
            $resultado = $stmt->fetchAll();
            foreach($resultado as $fila){
                $data = $fila["COUNT(id_exp)"];
                
            }

            $num = $data +1;

            $fecha_ejecucion = $_POST['fecha_ejecucion'];
            $extension = explode('.', $_FILES["image10"]['name']);
            //$nuevo_nombre = 'Acta-'.date('d-m-y').'-'.rand() . '.' . $extension[1];
            $nuevo_nombre = 'acta_'.$fecha_ejecucion.'_'.$num.'_10'.'.'. $extension[1];
            $ubicacion = './actas/' . $nuevo_nombre;
            move_uploaded_file($_FILES["image10"]['tmp_name'], $ubicacion);
            return $nuevo_nombre;
        }
    }

    function subir_image11(){
        if (isset($_FILES["image11"])) {

            include('conexion.php');
            $stmt = $conexion->prepare("SELECT COUNT(id_exp) FROM exp_general;");
            $stmt->execute();
            $resultado = $stmt->fetchAll();
            foreach($resultado as $fila){
                $data = $fila["COUNT(id_exp)"];
                
            }

            $num = $data +1;

            $fecha_ejecucion = $_POST['fecha_ejecucion'];
            $extension = explode('.', $_FILES["image11"]['name']);
            //$nuevo_nombre = 'Acta-'.date('d-m-y').'-'.rand() . '.' . $extension[1];
            $nuevo_nombre = 'acta_'.$fecha_ejecucion.'_'.$num.'_11'.'.'. $extension[1];
            $ubicacion = './actas/' . $nuevo_nombre;
            move_uploaded_file($_FILES["image11"]['tmp_name'], $ubicacion);
            return $nuevo_nombre;
        }
    }

    function subir_image12(){
        if (isset($_FILES["image12"])) {

            include('conexion.php');
            $stmt = $conexion->prepare("SELECT COUNT(id_exp) FROM exp_general;");
            $stmt->execute();
            $resultado = $stmt->fetchAll();
            foreach($resultado as $fila){
                $data = $fila["COUNT(id_exp)"];
                
            }

            $num = $data +1;

            $fecha_ejecucion = $_POST['fecha_ejecucion'];
            $extension = explode('.', $_FILES["image12"]['name']);
            //$nuevo_nombre = 'Acta-'.date('d-m-y').'-'.rand() . '.' . $extension[1];
            $nuevo_nombre = 'acta_'.$fecha_ejecucion.'_'.$num.'_12'.'.'. $extension[1];
            $ubicacion = './actas/' . $nuevo_nombre;
            move_uploaded_file($_FILES["image12"]['tmp_name'], $ubicacion);
            return $nuevo_nombre;
        }
    }

    function subir_image13(){
        if (isset($_FILES["image13"])) {

            include('conexion.php');
            $stmt = $conexion->prepare("SELECT COUNT(id_exp) FROM exp_general;");
            $stmt->execute();
            $resultado = $stmt->fetchAll();
            foreach($resultado as $fila){
                $data = $fila["COUNT(id_exp)"];
                
            }

            $num = $data +1;

            $fecha_ejecucion = $_POST['fecha_ejecucion'];
            $extension = explode('.', $_FILES["image13"]['name']);
            //$nuevo_nombre = 'Acta-'.date('d-m-y').'-'.rand() . '.' . $extension[1];
            $nuevo_nombre = 'acta_'.$fecha_ejecucion.'_'.$num.'_13'.'.'. $extension[1];
            $ubicacion = './actas/' . $nuevo_nombre;
            move_uploaded_file($_FILES["image13"]['tmp_name'], $ubicacion);
            return $nuevo_nombre;
        }
    }

    function subir_image14(){
        if (isset($_FILES["image14"])) {

            include('conexion.php');
            $stmt = $conexion->prepare("SELECT COUNT(id_exp) FROM exp_general;");
            $stmt->execute();
            $resultado = $stmt->fetchAll();
            foreach($resultado as $fila){
                $data = $fila["COUNT(id_exp)"];
                
            }

            $num = $data +1;

            $fecha_ejecucion = $_POST['fecha_ejecucion'];
            $extension = explode('.', $_FILES["image14"]['name']);
            //$nuevo_nombre = 'Acta-'.date('d-m-y').'-'.rand() . '.' . $extension[1];
            $nuevo_nombre = 'acta_'.$fecha_ejecucion.'_'.$num.'_14'.'.'. $extension[1];
            $ubicacion = './actas/' . $nuevo_nombre;
            move_uploaded_file($_FILES["image14"]['tmp_name'], $ubicacion);
            return $nuevo_nombre;
        }
    }

    function subir_image15(){
        if (isset($_FILES["image15"])) {

            include('conexion.php');
            $stmt = $conexion->prepare("SELECT COUNT(id_exp) FROM exp_general;");
            $stmt->execute();
            $resultado = $stmt->fetchAll();
            foreach($resultado as $fila){
                $data = $fila["COUNT(id_exp)"];
                
            }

            $num = $data +1;

            $fecha_ejecucion = $_POST['fecha_ejecucion'];
            $extension = explode('.', $_FILES["image15"]['name']);
            //$nuevo_nombre = 'Acta-'.date('d-m-y').'-'.rand() . '.' . $extension[1];
            $nuevo_nombre = 'acta_'.$fecha_ejecucion.'_'.$num.'_15'.'.'. $extension[1];
            $ubicacion = './actas/' . $nuevo_nombre;
            move_uploaded_file($_FILES["image15"]['tmp_name'], $ubicacion);
            return $nuevo_nombre;
        }
    }
















    function obtener_nombre_imagen($id_exp){
        include('conexion.php');
        $stmt = $conexion->prepare("SELECT image FROM exp_general WHERE id_exp = '$id_exp'");
        $stmt->execute();
        $resultado = $stmt->fetchAll();
        foreach($resultado as $fila){
            return $fila["image"];
        }
    }

    function obtener_nombre_imagen2($id_exp){
        include('conexion.php');
        $stmt = $conexion->prepare("SELECT image2 FROM exp_general WHERE id_exp = '$id_exp'");
        $stmt->execute();
        $resultado = $stmt->fetchAll();
        foreach($resultado as $fila){
            return $fila["image2"];
        }
    }

    function obtener_nombre_imagen3($id_exp){
        include('conexion.php');
        $stmt = $conexion->prepare("SELECT image3 FROM exp_general WHERE id_exp = '$id_exp'");
        $stmt->execute();
        $resultado = $stmt->fetchAll();
        foreach($resultado as $fila){
            return $fila["image3"];
        }
    }

    function obtener_nombre_imagen4($id_exp){
        include('conexion.php');
        $stmt = $conexion->prepare("SELECT image4 FROM exp_general WHERE id_exp = '$id_exp'");
        $stmt->execute();
        $resultado = $stmt->fetchAll();
        foreach($resultado as $fila){
            return $fila["image4"];
        }
    }

    function obtener_nombre_imagen5($id_exp){
        include('conexion.php');
        $stmt = $conexion->prepare("SELECT image5 FROM exp_general WHERE id_exp = '$id_exp'");
        $stmt->execute();
        $resultado = $stmt->fetchAll();
        foreach($resultado as $fila){
            return $fila["image5"];
        }
    }

    function obtener_nombre_imagen6($id_exp){
        include('conexion.php');
        $stmt = $conexion->prepare("SELECT image6 FROM exp_general WHERE id_exp = '$id_exp'");
        $stmt->execute();
        $resultado = $stmt->fetchAll();
        foreach($resultado as $fila){
            return $fila["image6"];
        }
    }

    function obtener_nombre_imagen7($id_exp){
        include('conexion.php');
        $stmt = $conexion->prepare("SELECT image7 FROM exp_general WHERE id_exp = '$id_exp'");
        $stmt->execute();
        $resultado = $stmt->fetchAll();
        foreach($resultado as $fila){
            return $fila["image7"];
        }
    }

    function obtener_nombre_imagen8($id_exp){
        include('conexion.php');
        $stmt = $conexion->prepare("SELECT image8 FROM exp_general WHERE id_exp = '$id_exp'");
        $stmt->execute();
        $resultado = $stmt->fetchAll();
        foreach($resultado as $fila){
            return $fila["image8"];
        }
    }

    function obtener_nombre_imagen9($id_exp){
        include('conexion.php');
        $stmt = $conexion->prepare("SELECT image9 FROM exp_general WHERE id_exp = '$id_exp'");
        $stmt->execute();
        $resultado = $stmt->fetchAll();
        foreach($resultado as $fila){ 
            return $fila["image9"];
        }
    }

    function obtener_nombre_imagen10($id_exp){
        include('conexion.php');
        $stmt = $conexion->prepare("SELECT image10 FROM exp_general WHERE id_exp = '$id_exp'");
        $stmt->execute();
        $resultado = $stmt->fetchAll();
        foreach($resultado as $fila){ 
            return $fila["image10"];
        }
    }

    function obtener_nombre_imagen11($id_exp){
        include('conexion.php');
        $stmt = $conexion->prepare("SELECT image11 FROM exp_general WHERE id_exp = '$id_exp'");
        $stmt->execute();
        $resultado = $stmt->fetchAll();
        foreach($resultado as $fila){ 
            return $fila["image11"];
        }
    }

    function obtener_nombre_imagen12($id_exp){
        include('conexion.php');
        $stmt = $conexion->prepare("SELECT image12 FROM exp_general WHERE id_exp = '$id_exp'");
        $stmt->execute();
        $resultado = $stmt->fetchAll();
        foreach($resultado as $fila){ 
            return $fila["image12"];
        }
    }

    function obtener_nombre_imagen13($id_exp){
        include('conexion.php');
        $stmt = $conexion->prepare("SELECT image13 FROM exp_general WHERE id_exp = '$id_exp'");
        $stmt->execute();
        $resultado = $stmt->fetchAll();
        foreach($resultado as $fila){ 
            return $fila["image13"];
        }
    }

    function obtener_nombre_imagen14($id_exp){
        include('conexion.php');
        $stmt = $conexion->prepare("SELECT image14 FROM exp_general WHERE id_exp = '$id_exp'");
        $stmt->execute();
        $resultado = $stmt->fetchAll();
        foreach($resultado as $fila){ 
            return $fila["image14"];
        }
    }

    function obtener_nombre_imagen15($id_exp){
        include('conexion.php');
        $stmt = $conexion->prepare("SELECT image15 FROM exp_general WHERE id_exp = '$id_exp'");
        $stmt->execute();
        $resultado = $stmt->fetchAll();
        foreach($resultado as $fila){ 
            return $fila["image15"];
        }
    }

    function obtener_todos_registros(){
        include('conexion.php');
        $stmt = $conexion->prepare("SELECT * FROM exp_general");
        $stmt->execute();
        $resultado = $stmt->fetchAll(); 
        return $stmt->rowCount();       
    }































    function editar_image(){
        if (isset($_FILES["image"])) {

            include('conexion.php');
            $id = $_POST['id_exp'];

            $stmt = $conexion->prepare("SELECT COUNT(*) AS conteo FROM exp_general WHERE id_exp <= $id");
            $stmt->execute();
            $resultado = $stmt->fetchAll();
            foreach($resultado as $fila){
                $data = $fila["conteo"];
                
            }

            $num = $data;

            $fecha_ejecucion = $_POST['fecha_ejecucion'];
            $extension = explode('.', $_FILES["image"]['name']);
            //$nuevo_nombre = 'Acta-'.date('d-m-y').'-'.rand() . '.' . $extension[1];
            $nuevo_nombre = 'acta_'.$fecha_ejecucion.'_'.$num.'_1'.'.'. $extension[1];
            $ubicacion = './actas/' . $nuevo_nombre;
            move_uploaded_file($_FILES["image"]['tmp_name'], $ubicacion);
            return $nuevo_nombre;
        }
    }

    function editar_image2(){
        if (isset($_FILES["image2"])) {

            include('conexion.php');
            $id = $_POST['id_exp'];

            $stmt = $conexion->prepare("SELECT COUNT(*) AS conteo FROM exp_general WHERE id_exp <= $id");
            $stmt->execute();
            $resultado = $stmt->fetchAll();
            foreach($resultado as $fila){
                $data = $fila["conteo"];
                
            }

            $num = $data;

            $fecha_ejecucion = $_POST['fecha_ejecucion'];
            $extension = explode('.', $_FILES["image2"]['name']);
            //$nuevo_nombre = 'Acta-'.date('d-m-y').'-'.rand() . '.' . $extension[1];
            $nuevo_nombre = 'acta_'.$fecha_ejecucion.'_'.$num.'_2'.'.'. $extension[1];
            $ubicacion = './actas/' . $nuevo_nombre;
            move_uploaded_file($_FILES["image2"]['tmp_name'], $ubicacion);
            return $nuevo_nombre;
        }
    }

    function editar_image3(){
        if (isset($_FILES["image3"])) {

            include('conexion.php');
            $id = $_POST['id_exp'];

            $stmt = $conexion->prepare("SELECT COUNT(*) AS conteo FROM exp_general WHERE id_exp <= $id");
            $stmt->execute();
            $resultado = $stmt->fetchAll();
            foreach($resultado as $fila){
                $data = $fila["conteo"];
                
            }

            $num = $data;

            $fecha_ejecucion = $_POST['fecha_ejecucion'];
            $extension = explode('.', $_FILES["image3"]['name']);
            //$nuevo_nombre = 'Acta-'.date('d-m-y').'-'.rand() . '.' . $extension[1];
            $nuevo_nombre = 'acta_'.$fecha_ejecucion.'_'.$num.'_3'.'.'. $extension[1];
            $ubicacion = './actas/' . $nuevo_nombre;
            move_uploaded_file($_FILES["image3"]['tmp_name'], $ubicacion);
            return $nuevo_nombre;
        }
    }

    function editar_image4(){
        if (isset($_FILES["image4"])) {

            include('conexion.php');
            $id = $_POST['id_exp'];

            $stmt = $conexion->prepare("SELECT COUNT(*) AS conteo FROM exp_general WHERE id_exp <= $id");
            $stmt->execute();
            $resultado = $stmt->fetchAll();
            foreach($resultado as $fila){
                $data = $fila["conteo"];
                
            }

            $num = $data;

            $fecha_ejecucion = $_POST['fecha_ejecucion'];
            $extension = explode('.', $_FILES["image4"]['name']);
            //$nuevo_nombre = 'Acta-'.date('d-m-y').'-'.rand() . '.' . $extension[1];
            $nuevo_nombre = 'acta_'.$fecha_ejecucion.'_'.$num.'_4'.'.'. $extension[1];
            $ubicacion = './actas/' . $nuevo_nombre;
            move_uploaded_file($_FILES["image4"]['tmp_name'], $ubicacion);
            return $nuevo_nombre;
        }
    }

    function editar_image5(){
        if (isset($_FILES["image5"])) {

            include('conexion.php');
            $id = $_POST['id_exp'];

            $stmt = $conexion->prepare("SELECT COUNT(*) AS conteo FROM exp_general WHERE id_exp <= $id");
            $stmt->execute();
            $resultado = $stmt->fetchAll();
            foreach($resultado as $fila){
                $data = $fila["conteo"];
                
            }

            $num = $data;

            $fecha_ejecucion = $_POST['fecha_ejecucion'];
            $extension = explode('.', $_FILES["image5"]['name']);
            //$nuevo_nombre = 'Acta-'.date('d-m-y').'-'.rand() . '.' . $extension[1];
            $nuevo_nombre = 'acta_'.$fecha_ejecucion.'_'.$num.'_5'.'.'. $extension[1];
            $ubicacion = './actas/' . $nuevo_nombre;
            move_uploaded_file($_FILES["image5"]['tmp_name'], $ubicacion);
            return $nuevo_nombre;
        }
    }

    function editar_image6(){
        if (isset($_FILES["image6"])) {

            include('conexion.php');
            $id = $_POST['id_exp'];

            $stmt = $conexion->prepare("SELECT COUNT(*) AS conteo FROM exp_general WHERE id_exp <= $id");
            $stmt->execute();
            $resultado = $stmt->fetchAll();
            foreach($resultado as $fila){
                $data = $fila["conteo"];
                
            }

            $num = $data;

            $fecha_ejecucion = $_POST['fecha_ejecucion'];
            $extension = explode('.', $_FILES["image6"]['name']);
            //$nuevo_nombre = 'Acta-'.date('d-m-y').'-'.rand() . '.' . $extension[1];
            $nuevo_nombre = 'acta_'.$fecha_ejecucion.'_'.$num.'_6'.'.'. $extension[1];
            $ubicacion = './actas/' . $nuevo_nombre;
            move_uploaded_file($_FILES["image6"]['tmp_name'], $ubicacion);
            return $nuevo_nombre;
        }
    }

    function editar_image7(){
        if (isset($_FILES["image7"])) {

            include('conexion.php');
            $id = $_POST['id_exp'];

            $stmt = $conexion->prepare("SELECT COUNT(*) AS conteo FROM exp_general WHERE id_exp <= $id");
            $stmt->execute();
            $resultado = $stmt->fetchAll();
            foreach($resultado as $fila){
                $data = $fila["conteo"];
                
            }

            $num = $data;

            $fecha_ejecucion = $_POST['fecha_ejecucion'];
            $extension = explode('.', $_FILES["image7"]['name']);
            //$nuevo_nombre = 'Acta-'.date('d-m-y').'-'.rand() . '.' . $extension[1];
            $nuevo_nombre = 'acta_'.$fecha_ejecucion.'_'.$num.'_7'.'.'. $extension[1];
            $ubicacion = './actas/' . $nuevo_nombre;
            move_uploaded_file($_FILES["image7"]['tmp_name'], $ubicacion);
            return $nuevo_nombre;
        }
    }

    function editar_image8(){
        if (isset($_FILES["image8"])) {

            include('conexion.php');
            $id = $_POST['id_exp'];

            $stmt = $conexion->prepare("SELECT COUNT(*) AS conteo FROM exp_general WHERE id_exp <= $id");
            $stmt->execute();
            $resultado = $stmt->fetchAll();
            foreach($resultado as $fila){
                $data = $fila["conteo"];
                
            }

            $num = $data;

            $fecha_ejecucion = $_POST['fecha_ejecucion'];
            $extension = explode('.', $_FILES["image8"]['name']);
            //$nuevo_nombre = 'Acta-'.date('d-m-y').'-'.rand() . '.' . $extension[1];
            $nuevo_nombre = 'acta_'.$fecha_ejecucion.'_'.$num.'_8'.'.'. $extension[1];
            $ubicacion = './actas/' . $nuevo_nombre;
            move_uploaded_file($_FILES["image8"]['tmp_name'], $ubicacion);
            return $nuevo_nombre;
        }
    }

    function editar_image9(){
        if (isset($_FILES["image9"])) {

            include('conexion.php');
            $id = $_POST['id_exp'];

            $stmt = $conexion->prepare("SELECT COUNT(*) AS conteo FROM exp_general WHERE id_exp <= $id");
            $stmt->execute();
            $resultado = $stmt->fetchAll();
            foreach($resultado as $fila){
                $data = $fila["conteo"];
                
            }

            $num = $data;

            $fecha_ejecucion = $_POST['fecha_ejecucion'];
            $extension = explode('.', $_FILES["image9"]['name']);
            //$nuevo_nombre = 'Acta-'.date('d-m-y').'-'.rand() . '.' . $extension[1];
            $nuevo_nombre = 'acta_'.$fecha_ejecucion.'_'.$num.'_9'.'.'. $extension[1];
            $ubicacion = './actas/' . $nuevo_nombre;
            move_uploaded_file($_FILES["image9"]['tmp_name'], $ubicacion);
            return $nuevo_nombre;
        }
    }

    function editar_image10(){
        if (isset($_FILES["image10"])) {

            include('conexion.php');
            $id = $_POST['id_exp'];

            $stmt = $conexion->prepare("SELECT COUNT(*) AS conteo FROM exp_general WHERE id_exp <= $id");
            $stmt->execute();
            $resultado = $stmt->fetchAll();
            foreach($resultado as $fila){
                $data = $fila["conteo"];
                
            }

            $num = $data;

            $fecha_ejecucion = $_POST['fecha_ejecucion'];
            $extension = explode('.', $_FILES["image10"]['name']);
            //$nuevo_nombre = 'Acta-'.date('d-m-y').'-'.rand() . '.' . $extension[1];
            $nuevo_nombre = 'acta_'.$fecha_ejecucion.'_'.$num.'_10'.'.'. $extension[1];
            $ubicacion = './actas/' . $nuevo_nombre;
            move_uploaded_file($_FILES["image10"]['tmp_name'], $ubicacion);
            return $nuevo_nombre;
        }
    }

    function editar_image11(){
        if (isset($_FILES["image11"])) {

            include('conexion.php');
            $id = $_POST['id_exp'];

            $stmt = $conexion->prepare("SELECT COUNT(*) AS conteo FROM exp_general WHERE id_exp <= $id");
            $stmt->execute();
            $resultado = $stmt->fetchAll();
            foreach($resultado as $fila){
                $data = $fila["conteo"];
                
            }

            $num = $data;

            $fecha_ejecucion = $_POST['fecha_ejecucion'];
            $extension = explode('.', $_FILES["image11"]['name']);
            //$nuevo_nombre = 'Acta-'.date('d-m-y').'-'.rand() . '.' . $extension[1];
            $nuevo_nombre = 'acta_'.$fecha_ejecucion.'_'.$num.'_11'.'.'. $extension[1];
            $ubicacion = './actas/' . $nuevo_nombre;
            move_uploaded_file($_FILES["image11"]['tmp_name'], $ubicacion);
            return $nuevo_nombre;
        }
    }

    function editar_image12(){
        if (isset($_FILES["image12"])) {

            include('conexion.php');
            $id = $_POST['id_exp'];

            $stmt = $conexion->prepare("SELECT COUNT(*) AS conteo FROM exp_general WHERE id_exp <= $id");
            $stmt->execute();
            $resultado = $stmt->fetchAll();
            foreach($resultado as $fila){
                $data = $fila["conteo"];
                
            }

            $num = $data;

            $fecha_ejecucion = $_POST['fecha_ejecucion'];
            $extension = explode('.', $_FILES["image12"]['name']);
            //$nuevo_nombre = 'Acta-'.date('d-m-y').'-'.rand() . '.' . $extension[1];
            $nuevo_nombre = 'acta_'.$fecha_ejecucion.'_'.$num.'_12'.'.'. $extension[1];
            $ubicacion = './actas/' . $nuevo_nombre;
            move_uploaded_file($_FILES["image12"]['tmp_name'], $ubicacion);
            return $nuevo_nombre;
        }
    }

    function editar_image13(){
        if (isset($_FILES["image13"])) {

            include('conexion.php');
            $id = $_POST['id_exp'];

            $stmt = $conexion->prepare("SELECT COUNT(*) AS conteo FROM exp_general WHERE id_exp <= $id");
            $stmt->execute();
            $resultado = $stmt->fetchAll();
            foreach($resultado as $fila){
                $data = $fila["conteo"];
            }

            $num = $data;

            $fecha_ejecucion = $_POST['fecha_ejecucion'];
            $extension = explode('.', $_FILES["image13"]['name']);
            $nuevo_nombre = 'acta_'.$fecha_ejecucion.'_'.$num.'_13'.'.'. $extension[1];
            $ubicacion = './actas/' . $nuevo_nombre;
            move_uploaded_file($_FILES["image13"]['tmp_name'], $ubicacion);
            return $nuevo_nombre;
        }
    }

    function editar_image14(){
        if (isset($_FILES["image14"])) {

            include('conexion.php');
            $id = $_POST['id_exp'];
            
            $stmt = $conexion->prepare("SELECT COUNT(*) AS conteo FROM exp_general WHERE id_exp <= $id");
            $stmt->execute();
            $resultado = $stmt->fetchAll();
            
            foreach($resultado as $fila){
                $data = $fila["conteo"];
            }

            $num = $data;

            $fecha_ejecucion = $_POST['fecha_ejecucion'];
            $extension = explode('.', $_FILES["image14"]['name']);
            $nuevo_nombre = 'acta_'.$fecha_ejecucion.'_'.$num.'_14'.'.'. $extension[1];
            $ubicacion = './actas/' . $nuevo_nombre;
            move_uploaded_file($_FILES["image14"]['tmp_name'], $ubicacion);
            return $nuevo_nombre;
        }
    }

    function editar_image15(){
        if (isset($_FILES["image15"])) {

            include('conexion.php');
            $id = $_POST['id_exp'];
            
            $stmt = $conexion->prepare("SELECT COUNT(*) AS conteo FROM exp_general WHERE id_exp <= $id");
            $stmt->execute();
            $resultado = $stmt->fetchAll();
            
            foreach($resultado as $fila){
                $data = $fila["conteo"];
            }

            $num = $data;

            $fecha_ejecucion = $_POST['fecha_ejecucion'];
            $extension = explode('.', $_FILES["image15"]['name']);
            $nuevo_nombre = 'acta_'.$fecha_ejecucion.'_'.$num.'_15'.'.'. $extension[1];
            $ubicacion = './actas/' . $nuevo_nombre;
            move_uploaded_file($_FILES["image15"]['tmp_name'], $ubicacion);
            return $nuevo_nombre;
        }
    }








 