<?php

include("conexion.php");
include("funciones.php");

session_start();



if ($_POST["operacion"] == "Crear") {

    
    $image = '';
    $image2 = '';
    $image3 = '';
    $image4 = '';
    $image5 = '';
    $image6 = '';
    $image7 = '';
    $image8 = '';
    $image9 = '';
    $image10 = '';
    $image11 = '';
    $image12 = '';
    $image13 = '';
    $image14 = '';
    $image15 = '';

    if ($_FILES["image"]["name"] != '') {
        
        $image = subir_image();
    }

    if ($_FILES["image2"]["name"] != '') {
        $image2 = subir_image2();
    }
    if ($_FILES["image3"]["name"] != '') {
        $image3 = subir_image3();
    }
    if ($_FILES["image4"]["name"] != '') {
        $image4 = subir_image4();
    }
    if ($_FILES["image5"]["name"] != '') {
        $image5 = subir_image5();
    }
    if ($_FILES["image6"]["name"] != '') {
        $image6 = subir_image6();
    }
    if ($_FILES["image7"]["name"] != '') {
        $image7 = subir_image7();
    }
    if ($_FILES["image8"]["name"] != '') {
        $image8 = subir_image8();
    }
    if ($_FILES["image9"]["name"] != '') {
        $image9 = subir_image9();
    }
    if ($_FILES["image10"]["name"] != '') {
        $image10 = subir_image10();
    }
    if ($_FILES["image11"]["name"] != '') {
        $image11 = subir_image11();
    }
    if ($_FILES["image12"]["name"] != '') {
        $image12 = subir_image12();
    }
    if ($_FILES["image13"]["name"] != '') {
        $image13 = subir_image13();
    }
    if ($_FILES["image14"]["name"] != '') {
        $image14 = subir_image14();
    }
    if ($_FILES["image15"]["name"] != '') {
        $image15 = subir_image15();
    }
    
    
    $stmt = $conexion->prepare("INSERT INTO exp_general(nombre_contratante, obj_contrato, ubicacion, monto_bs, monto_dolares, fecha_ejecucion, 
                                            participa_aso, n_socio, profesional_resp, detalle, usuario_id, image, image2, image3, 
                                            image4, image5, image6,image7,image8,image9,image10,image11,image12,image13,image14,image15)
                                VALUES(:nombre_contratante, :obj_contrato, :ubicacion, :monto_bs, :monto_dolares, :fecha_ejecucion, :participa_aso, 
                                            :n_socio, :profesional_resp, :detalle, :usuario_id, :image, :image2, :image3, :image4, :image5, :image6, :image7,
                                            :image8, :image9, :image10, :image11, :image12, :image13, :image14, :image15)");

    $resultado = $stmt->execute(
        array(
            
            ':nombre_contratante' => $_POST['nombre_contratante'],
            ':obj_contrato' => $_POST['obj_contrato'],
            ':ubicacion' => $_POST['ubicacion'],
            ':monto_bs' => $_POST['monto_bs'],
            ':monto_dolares' => $_POST['monto_dolares'],
            ':fecha_ejecucion' => $_POST['fecha_ejecucion'],
            ':participa_aso' => $_POST['participa_aso'],
            ':n_socio' => $_POST['n_socio'],
            ':profesional_resp' => $_POST['profesional_resp'],
            ':detalle' => $_POST['detalle'],
            ':usuario_id' => $_SESSION['iduser'],
            ':image' => $image,
            ':image2' => $image2,
            ':image3' => $image3,
            ':image4' => $image4,
            ':image5' => $image5,
            ':image6' => $image6,
            ':image7' => $image7,
            ':image8' => $image8,
            ':image9' => $image9,
            ':image10' => $image10,
            ':image11' => $image11,
            ':image12' => $image12,
            ':image13' => $image13,
            ':image14' => $image14,
            ':image15' => $image15
      


        )
    );

    if (!empty($resultado)) {
        echo 'Registro creado';
    }
}




	



if ($_POST["operacion"] == "Editar") {
    $image = obtener_nombre_imagen($_POST["id_exp"]);
    $image2 = obtener_nombre_imagen2($_POST["id_exp"]);
    $image3 = obtener_nombre_imagen3($_POST["id_exp"]);
    $image4 = obtener_nombre_imagen4($_POST["id_exp"]);
    $image5 = obtener_nombre_imagen5($_POST["id_exp"]);
    $image6 = obtener_nombre_imagen6($_POST["id_exp"]);
    $image7 = obtener_nombre_imagen7($_POST["id_exp"]);
    $image8 = obtener_nombre_imagen8($_POST["id_exp"]);
    $image9 = obtener_nombre_imagen9($_POST["id_exp"]);
    $image10 = obtener_nombre_imagen10($_POST["id_exp"]);
    $image11 = obtener_nombre_imagen11($_POST["id_exp"]);
    $image12 = obtener_nombre_imagen12($_POST["id_exp"]);
    $image13 = obtener_nombre_imagen13($_POST["id_exp"]);
    $image14 = obtener_nombre_imagen14($_POST["id_exp"]);
    $image15 = obtener_nombre_imagen15($_POST["id_exp"]);



    if ($_FILES["image"]["name"] != '') {
        unlink("actas/" . $image);
        $image = editar_image();
    } 
    else {
        $image = @$_POST['img_o'];    
    }

    if ($_FILES["image2"]["name"] != '') {
        unlink("actas/" . $image2);
        $image2 = editar_image2();
    } 
    else {
        $image2 = @$_POST['img_o2'];    
    }

    if ($_FILES["image3"]["name"] != '') {
        unlink("actas/" . $image3);
        $image3 = editar_image3();
    } 
    else {
        $image3 = @$_POST['img_o3'];    
    }

    if ($_FILES["image4"]["name"] != '') {
        unlink("actas/" . $image4);
        $image4 = editar_image4();
    } 
    else {
        $image4 = @$_POST['img_o4'];    
    }

    if ($_FILES["image5"]["name"] != '') {
        unlink("actas/" . $image5);
        $image5 = editar_image5();
    } 
    else {
        $image5 = @$_POST['img_o5'];    
    }

    if ($_FILES["image6"]["name"] != '') {
        unlink("actas/" . $image6);
        $image6 = editar_image6();
    } 
    else {
        $image6 = @$_POST['img_o6'];    
    }

    if ($_FILES["image7"]["name"] != '') {
        unlink("actas/" . $image7);
        $image7 = editar_image7();
    } 
    else {
        $image7 = @$_POST['img_o7'];    
    }

    if ($_FILES["image8"]["name"] != '') {
        unlink("actas/" . $image8);
        $image8 = editar_image8();
    } 
    else {
        $image8 = @$_POST['img_o8'];    
    }

    if ($_FILES["image9"]["name"] != '') {
        unlink("actas/" . $image9);
        $image9 = editar_image9();
    } 
    else {
        $image9 = @$_POST['img_o9'];    
    }

    if ($_FILES["image10"]["name"] != '') {
        unlink("actas/" . $image10);
        $image10 = editar_image10();
    } 
    else {
        $image10 = @$_POST['img_o10'];    
    }

    if ($_FILES["image11"]["name"] != '') {
        unlink("actas/" . $image11);
        $image11 = editar_image11();
    } 
    else {
        $image11 = @$_POST['img_o11'];    
    }

    if ($_FILES["image12"]["name"] != '') {
        unlink("actas/" . $image12);
        $image12 = editar_image12();
    } 
    else {
        $image12 = @$_POST['img_o12'];    
    }

    if ($_FILES["image13"]["name"] != '') {
        unlink("actas/" . $image13);
        $image13 = editar_image13();
    } 
    else {
        $image13 = @$_POST['img_o13'];    
    }

    if ($_FILES["image14"]["name"] != '') {
        unlink("actas/" . $image14);
        $image14 = editar_image14();
    } 
    else {
        $image14 = @$_POST['img_o14'];    
    }

    if ($_FILES["image15"]["name"] != '') {
        unlink("actas/" . $image15);
        $image15 = editar_image15();
    } 
    else {
        $image15 = @$_POST['img_o15'];    
    }
    




    $stmt = $conexion->prepare("UPDATE exp_general SET nombre_contratante=:nombre_contratante, obj_contrato=:obj_contrato, ubicacion=:ubicacion, monto_bs=:monto_bs, monto_dolares=:monto_dolares, fecha_ejecucion=:fecha_ejecucion, participa_aso=:participa_aso, 
    n_socio=:n_socio,profesional_resp=:profesional_resp,detalle=:detalle,usuario_id=:usuario_id,image=:image,image2=:image2,image3=:image3,image4=:image4
    ,image5=:image5,image6=:image6,image7=:image7,image8=:image8,image9=:image9,image10=:image10,image11=:image11,image12=:image12
    ,image13=:image13,image14=:image14,image15=:image15 WHERE id_exp = :id_exp");

    $resultado = $stmt->execute(
        array(
            ':id_exp'    => $_POST["id_exp"],
            ':nombre_contratante'    => $_POST["nombre_contratante"],
            ':obj_contrato'    => $_POST["obj_contrato"],
            ':ubicacion'    => $_POST["ubicacion"],
            ':monto_bs'    => $_POST["monto_bs"],
            ':monto_dolares'    => $_POST["monto_dolares"],
            ':fecha_ejecucion'    => $_POST["fecha_ejecucion"],
            ':participa_aso'    => $_POST["participa_aso"],
            ':n_socio'    => $_POST["n_socio"],
            ':profesional_resp'    => $_POST["profesional_resp"],
            ':detalle'    => $_POST["detalle"],
            ':usuario_id' => $_SESSION['iduser'],
            ':image'    => $image,
            ':image2'    => $image2,
            ':image3'    => $image3,
            ':image4'    => $image4,
            ':image5'    => $image5,
            ':image6'    => $image6,
            ':image7'    => $image7,
            ':image8'    => $image8,
            ':image9'    => $image9,
            ':image10'    => $image10,
            ':image11'    => $image11,
            ':image12'    => $image12,
            ':image13'    => $image13,
            ':image14'    => $image14,
            ':image15'    => $image15

          

        )

        
    );

    if (!empty($resultado)) {
        echo 'Registro actualizado';
    }
}