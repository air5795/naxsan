<?php
    
    session_start();
    
    include "../conexion.php";
    $query = mysqli_query($conexion, "SELECT * FROM exp_general");
    $result = mysqli_num_rows($query);
    if ($result > 0) {
        while ($data = mysqli_fetch_array($query)) {
             $num = $data['id_exp'];
             
        }}

        $sql_tfila = mysqli_query($conexion, "SELECT COUNT(id_exp) FROM exp_general;");
        $result_f = mysqli_fetch_array($sql_tfila);
        $total2 = $result_f['COUNT(id_exp)'];
        $total3 =  $total2 + 1;  
    

    if (!empty($_POST)) {
        $alert = '';
        if (empty($_POST['nombre_contratante']) 
        || empty($_POST['obj_contrato']) 
        || empty($_POST['ubicacion']) 
        || empty($_POST['monto_bs']) 
        || empty($_POST['monto_dolares']) 
        || empty($_POST['fecha_ejecucion'])  
        || empty($_POST['profesional_resp'])
        || empty($_POST['detalle'])) {
            $alert = '<p class="alert alert-danger w-50"> Todos los Campos Son Obligatorios </p> ';
        } else {
            
            $idExp = $_POST['id_exp'];
            $nombre_contratante = $_POST['nombre_contratante'];
            $obj_contrato = $_POST['obj_contrato'];
            $ubicacion = $_POST['ubicacion'];
            $monto_bs = $_POST['monto_bs'];
            $monto_dolares = $_POST['monto_dolares'];
            $fecha_ejecucion = $_POST['fecha_ejecucion'];
            $participa_aso = $_POST['participa_aso'];
            $n_socio = $_POST['n_socio'];
            $detalle = $_POST['detalle'];
            $profesional_resp = $_POST['profesional_resp'];

            /*$picture1 = $_FILES['image1'];
            $picture2 = $_FILES['image2'];
            $picture3 = $_FILES['image3'];
            $picture4 = $_FILES['image4'];
            $picture5 = $_FILES['image5'];
            $picture6 = $_FILES['image6'];
            $picture7 = $_FILES['image7'];
            $picture8 = $_FILES['image8'];
            $picture9 = $_FILES['image9'];
            $picture10 = $_FILES['image10'];
            $picture11 = $_FILES['image11'];
            $picture12 = $_FILES['image12'];
            $picture13 = $_FILES['image13'];
            $picture14 = $_FILES['image14'];
            $picture15 = $_FILES['image15'];

            

        //imagen 1   
        $nombre_image1 = $picture1['name'];
        $type1= $picture1['type'];
        $url_temp1 = $picture1['tmp_name'];

        $imgProducto1 = 'nodisponible.png';

        if ($nombre_image1 != '') {
            $destino1 = 'img/actas/';
            $img_nombre1 = 'acta_'.$fecha_ejecucion.'_'.$num.'_1';
            //$img_nombre2 = 'acta_'.$num.'_2_'.$fecha_ejecucion;
            //$img_nombre = 'acta_'.$ubicacion.'-'.$fecha_ejecucion.date('H:m:s');
            $imgActa1 = $img_nombre1.'.jpg';
            $src1= $destino1.$imgActa1;
        }
        

        //imagen 2   
        $nombre_image2 = $picture2['name'];
        $type2= $picture2['type'];
        $url_temp2 = $picture2['tmp_name'];

        $imgProducto2 = 'nodisponible.png';

        if ($nombre_image2 != '') {
            $destino2 = 'img/actas/';
            $img_nombre2 = 'acta_'.$fecha_ejecucion.'_'.$num.'_2';
            //$img_nombre2 = 'acta_'.$num.'_2_'.$fecha_ejecucion;
            //$img_nombre = 'acta_'.$ubicacion.'-'.$fecha_ejecucion.date('H:m:s');
            $imgActa2 = $img_nombre2.'.jpg';
            $src2= $destino2.$imgActa2;
        }

    

        //imagen 3
        $nombre_image3 = $picture3['name'];
        $type3 = $picture3['type'];
        $url_temp3 = $picture3['tmp_name'];

        $imgProducto3 = 'nodisponible.png';

        if ($nombre_image3 != '') {
            $destino3 = 'img/actas/';
            $img_nombre3 = 'acta_'.$fecha_ejecucion.'_'.$num.'_3';
            //$img_nombre3 = 'acta_'.$num.'_3_'.$fecha_ejecucion;
            //$img_nombre = 'acta_'.$ubicacion.'-'.$fecha_ejecucion.date('H:m:s');
            $imgActa3 = $img_nombre3.'.jpg';
            $src3= $destino3.$imgActa3;
        }

        //imagen 4
        $nombre_image4 = $picture4['name'];
        $type4 = $picture4['type'];
        $url_temp4 = $picture4['tmp_name'];

        $imgProducto4 = 'nodisponible.png';

        if ($nombre_image4 != '') {
            $destino4 = 'img/actas/';
            $img_nombre4 = 'acta_'.$fecha_ejecucion.'_'.$num.'_4';
            //$img_nombre3 = 'acta_'.$num.'_3_'.$fecha_ejecucion;
            //$img_nombre = 'acta_'.$ubicacion.'-'.$fecha_ejecucion.date('H:m:s');
            $imgActa4 = $img_nombre4.'.jpg';
            $src4= $destino4.$imgActa4;
        }

        //imagen 5
        $nombre_image5 = $picture5['name'];
        $type5 = $picture5['type'];
        $url_temp5 = $picture5['tmp_name'];

        $imgProducto5 = 'nodisponible.png';

        if ($nombre_image5 != '') {
            $destino5 = 'img/actas/';
            $img_nombre5 = 'acta_'.$fecha_ejecucion.'_'.$num.'_5';
            //$img_nombre3 = 'acta_'.$num.'_3_'.$fecha_ejecucion;
            //$img_nombre = 'acta_'.$ubicacion.'-'.$fecha_ejecucion.date('H:m:s');
            $imgActa5 = $img_nombre5.'.jpg';
            $src5= $destino5.$imgActa5;
        }


        //imagen 6
        $nombre_image6 = $picture6['name'];
        $type6 = $picture6['type'];
        $url_temp6 = $picture6['tmp_name'];

        $imgProducto6 = 'nodisponible.png';

        if ($nombre_image6 != '') {
            $destino6 = 'img/actas/';
            $img_nombre6 = 'acta_'.$fecha_ejecucion.'_'.$num.'_6';
            //$img_nombre3 = 'acta_'.$num.'_3_'.$fecha_ejecucion;
            //$img_nombre = 'acta_'.$ubicacion.'-'.$fecha_ejecucion.date('H:m:s');
            $imgActa6 = $img_nombre6.'.jpg';
            $src6= $destino6.$imgActa6;
        }

        //imagen 7
        $nombre_image7 = $picture7['name'];
        $type7 = $picture7['type'];
        $url_temp7 = $picture7['tmp_name'];

        $imgProducto7 = 'nodisponible.png';

        if ($nombre_image7 != '') {
            $destino7 = 'img/actas/';
            $img_nombre7 = 'acta_'.$fecha_ejecucion.'_'.$num.'_7';
            //$img_nombre3 = 'acta_'.$num.'_3_'.$fecha_ejecucion;
            //$img_nombre = 'acta_'.$ubicacion.'-'.$fecha_ejecucion.date('H:m:s');
            $imgActa7 = $img_nombre7.'.jpg';
            $src7= $destino7.$imgActa7;
        }

        //imagen 8
        $nombre_image8 = $picture8['name'];
        $type8 = $picture8['type'];
        $url_temp8 = $picture8['tmp_name'];

        $imgProducto8 = 'nodisponible.png';

        if ($nombre_image8 != '') {
            $destino8 = 'img/actas/';
            $img_nombre8 = 'acta_'.$fecha_ejecucion.'_'.$num.'_8';
            //$img_nombre3 = 'acta_'.$num.'_3_'.$fecha_ejecucion;
            //$img_nombre = 'acta_'.$ubicacion.'-'.$fecha_ejecucion.date('H:m:s');
            $imgActa8 = $img_nombre8.'.jpg';
            $src8= $destino8.$imgActa8;
        }


        //imagen 9
        $nombre_image9 = $picture9['name'];
        $type9 = $picture9['type'];
        $url_temp9 = $picture9['tmp_name'];

        $imgProducto9 = 'nodisponible.png';

        if ($nombre_image9 != '') {
            $destino9 = 'img/actas/';
            $img_nombre9 = 'acta_'.$fecha_ejecucion.'_'.$num.'_9';
            //$img_nombre3 = 'acta_'.$num.'_3_'.$fecha_ejecucion;
            //$img_nombre = 'acta_'.$ubicacion.'-'.$fecha_ejecucion.date('H:m:s');
            $imgActa9 = $img_nombre9.'.jpg';
            $src9= $destino9.$imgActa9;
        }

        //imagen 10
        $nombre_image10 = $picture10['name'];
        $type10 = $picture10['type'];
        $url_temp10 = $picture10['tmp_name'];

        $imgProducto10 = 'nodisponible.png';

        if ($nombre_image10 != '') {
            $destino10 = 'img/actas/';
            $img_nombre10 = 'acta_'.$fecha_ejecucion.'_'.$num.'_10';
            //$img_nombre3 = 'acta_'.$num.'_3_'.$fecha_ejecucion;
            //$img_nombre = 'acta_'.$ubicacion.'-'.$fecha_ejecucion.date('H:m:s');
            $imgActa10 = $img_nombre10.'.jpg';
            $src10= $destino10.$imgActa10;
        }

        //imagen 11
        $nombre_image11 = $picture11['name'];
        $type11 = $picture11['type'];
        $url_temp11 = $picture11['tmp_name'];

        $imgProducto11 = 'nodisponible.png';

        if ($nombre_image11 != '') {
            $destino11 = 'img/actas/';
            $img_nombre11 = 'acta_'.$fecha_ejecucion.'_'.$num.'_11';
            //$img_nombre3 = 'acta_'.$num.'_3_'.$fecha_ejecucion;
            //$img_nombre = 'acta_'.$ubicacion.'-'.$fecha_ejecucion.date('H:m:s');
            $imgActa11 = $img_nombre11.'.jpg';
            $src11= $destino11.$imgActa11;
        }

        //imagen 12
        $nombre_image12 = $picture12['name'];
        $type12 = $picture12['type'];
        $url_temp12 = $picture12['tmp_name'];

        $imgProducto12 = 'nodisponible.png';

        if ($nombre_image12 != '') {
            $destino12 = 'img/actas/';
            $img_nombre12 = 'acta_'.$fecha_ejecucion.'_'.$num.'_12';
            //$img_nombre3 = 'acta_'.$num.'_3_'.$fecha_ejecucion;
            //$img_nombre = 'acta_'.$ubicacion.'-'.$fecha_ejecucion.date('H:m:s');
            $imgActa12 = $img_nombre12.'.jpg';
            $src12= $destino12.$imgActa12;
        }

        //imagen 13
        $nombre_image13 = $picture13['name'];
        $type13 = $picture13['type'];
        $url_temp13 = $picture13['tmp_name'];

        $imgProducto13 = 'nodisponible.png';

        if ($nombre_image13 != '') {
            $destino13 = 'img/actas/';
            $img_nombre13 = 'acta_'.$fecha_ejecucion.'_'.$num.'_13';
            //$img_nombre3 = 'acta_'.$num.'_3_'.$fecha_ejecucion;
            //$img_nombre = 'acta_'.$ubicacion.'-'.$fecha_ejecucion.date('H:m:s');
            $imgActa13 = $img_nombre13.'.jpg';
            $src13= $destino13.$imgActa13;
        }

        //imagen 14
        $nombre_image14 = $picture14['name'];
        $type14 = $picture14['type'];
        $url_temp14 = $picture14['tmp_name'];

        $imgProducto14 = 'nodisponible.png';

        if ($nombre_image14 != '') {
            $destino14 = 'img/actas/';
            $img_nombre14 = 'acta_'.$fecha_ejecucion.'_'.$num.'_14';
            //$img_nombre3 = 'acta_'.$num.'_3_'.$fecha_ejecucion;
            //$img_nombre = 'acta_'.$ubicacion.'-'.$fecha_ejecucion.date('H:m:s');
            $imgActa14 = $img_nombre14.'.jpg';
            $src14= $destino14.$imgActa14;
        }

        //imagen 15
        $nombre_image15 = $picture15['name'];
        $type15 = $picture15['type'];
        $url_temp15 = $picture15['tmp_name'];

        $imgProducto15 = 'nodisponible.png';

        if ($nombre_image15 != '') {
            $destino15 = 'img/actas/';
            $img_nombre15 = 'acta_'.$fecha_ejecucion.'_'.$num.'_15';
            //$img_nombre3 = 'acta_'.$num.'_3_'.$fecha_ejecucion;
            //$img_nombre = 'acta_'.$ubicacion.'-'.$fecha_ejecucion.date('H:m:s');
            $imgActa15 = $img_nombre15.'.jpg';
            $src15= $destino15.$imgActa15;
        }
     
            $query = mysqli_query($conexion,"SELECT * FROM exp_general 
                                                      WHERE (id_exp = $idExp)");
            $resul = mysqli_fetch_array($query);

            if ($resul > 0) {
                while ($data = mysqli_fetch_array($query)) {
                    $ruta = 'img/actas/';
                    $r = $data['image'];
                    $ruta2 = $ruta.$r;
        
                    
                    $r2 = $data['image2'];
                    $ruta4 = $ruta.$r2;
                    
                    
                    $r3 = $data['image3'];
                    $ruta6 = $ruta.$r3;
        
                    $r4 = $data['image4'];
                    $ruta8 = $ruta.$r4;
        
                    $r5 = $data['image5'];
                    $ruta10 = $ruta.$r5;
        
                    $r6 = $data['image6'];
                    $ruta12 = $ruta.$r6;
        
                    $r7 = $data['image7'];
                    $ruta14 = $ruta.$r7;
        
                    $r8 = $data['image8'];
                    $ruta16 = $ruta.$r8;
        
                    $r9 = $data['image9'];
                    $ruta18 = $ruta.$r9;
        
                    $r10 = $data['image10'];
                    $ruta20 = $ruta.$r10;
        
                    $r11 = $data['image11'];
                    $ruta22 = $ruta.$r11;
        
                    $r12 = $data['image12'];
                    $ruta24 = $ruta.$r12;
        
                    $r13 = $data['image13'];
                    $ruta26 = $ruta.$r13;
        
                    $r14 = $data['image14'];
                    $ruta28 = $ruta.$r14;
        
                    $r15 = $data['image15'];
                    $ruta30 = $ruta.$r15;
                    
        
        
        
                    
        
                    
                    //$nombre = $data['nombre'];
                    //$nit = $data['nit'];
                }
            }else {
                header('location: lista_exp.php');
            }

            

            //$query_delete = mysqli_query($conexion,"UPDATE cliente SET estatus = 0 WHERE idcliente = $idcliente");

            



            if ($resul = 0) {
                $alert  = $alert = '<p class="alert alert-danger w-50"> No esta disponible </p> ';
            }else {


                $sql_update = mysqli_query($conexion, "UPDATE
                                                    exp_general
                                                    SET
                                                        nombre_contratante = '$nombre_contratante',
                                                        obj_contrato = '$obj_contrato ',
                                                        ubicacion = '$ubicacion',
                                                        monto_bs = $monto_bs,
                                                        monto_dolares = $monto_dolares,
                                                        fecha_ejecucion = '$fecha_ejecucion',
                                                        participa_aso = '$participa_aso',
                                                        n_socio = '$n_socio',
                                                        profesional_resp = '$profesional_resp',
                                                        image = '$imgActa1',
                                                        image2 = '$imgActa2',
                                                        image3 = '$imgActa3',
                                                        image4 = '$imgActa4',
                                                        image5 = '$imgActa5',
                                                        image6 = '$imgActa6',
                                                        image7 = '$imgActa7',
                                                        image8 = '$imgActa8',
                                                        image9 = '$imgActa9',
                                                        image10 = '$imgActa10',
                                                        image11 = '$imgActa11',
                                                        image12 = '$imgActa12',
                                                        image13 = '$imgActa13',
                                                        image14 = '$imgActa14',
                                                        image15 = '$imgActa15'
                                                    WHERE
                                                        id_exp = $idExp");*/

    

           
                

            $sql_update1 = mysqli_query($conexion, "UPDATE
                                                    exp_general
                                                    SET
                                                        nombre_contratante = '$nombre_contratante',
                                                        obj_contrato = '$obj_contrato ',
                                                        ubicacion = '$ubicacion',
                                                        monto_bs = $monto_bs,
                                                        monto_dolares = $monto_dolares,
                                                        fecha_ejecucion = '$fecha_ejecucion',
                                                        participa_aso = '$participa_aso',
                                                        n_socio = '$n_socio',
                                                        profesional_resp = '$profesional_resp',
                                                        detalle = '$detalle'
                                                        
                                                    WHERE
                                                        id_exp = $idExp");    



                }

                if ($sql_update1) {
                     
                        
                        /*if ($ruta2 != '' ) {
                            unlink($ruta2);
                            unlink($ruta4);
                            unlink($ruta6);
                            unlink($ruta8);
                            unlink($ruta10);
                            unlink($ruta12);
                            unlink($ruta14);
                            unlink($ruta16);
        
                            unlink($ruta18);
                            unlink($ruta20);
                            unlink($ruta22);
                            unlink($ruta24);
                            unlink($ruta26);
                            unlink($ruta28);
                            unlink($ruta30);
                        
                        } 
                    
                    if ($nombre_image1 != '') {
                        move_uploaded_file($url_temp1, $src1);
                        move_uploaded_file($url_temp2,$src2);
                        move_uploaded_file($url_temp3,$src3);

                        move_uploaded_file($url_temp4,$src4);
                        move_uploaded_file($url_temp5,$src5);
                        move_uploaded_file($url_temp6,$src6);
                        move_uploaded_file($url_temp7,$src7);
                        move_uploaded_file($url_temp8,$src8);

                        move_uploaded_file($url_temp9,$src9);
                        move_uploaded_file($url_temp10,$src10);
                        move_uploaded_file($url_temp11,$src11);
                        move_uploaded_file($url_temp12,$src12);
                        move_uploaded_file($url_temp13,$src13);
                        move_uploaded_file($url_temp14,$src14);
                        move_uploaded_file($url_temp15,$src15);
                    }*/
                    $alert = '<p class="alert alert-success"> SE ACTUALIZO CORRECTAMENTE </p> ';
                    header("Location: lista_exp.php");
                }
                else{
                    $alert = '<p class="alert alert-danger w-50"> LA ACTUALIZACION FALLO </p> ';
                    

                }
            }
        


    //mostrar datos

    if (empty($_GET['id'])) 
    {
        header('Location: lista_exp.php');
    }


    $id_exp = $_GET['id'];
    $sql= mysqli_query($conexion,"SELECT id_exp, 
                                            nombre_contratante, 
                                            obj_contrato, 
                                            ubicacion, 
                                            monto_bs, 
                                            monto_dolares, 
                                            fecha_ejecucion, 
                                            participa_aso, 
                                            n_socio, 
                                            profesional_resp,
                                            detalle,
                                            image,
                                            image2,
                                            image3,
                                            image4,
                                            image5,
                                            image6,
                                            image7,
                                            image8,
                                            image9,
                                            image10,
                                            image11,
                                            image12,
                                            image13,
                                            image14,
                                            image15
                                FROM exp_general 
                                WHERE id_exp = $id_exp"); // colocar la variable rescatada de GET 

    $result_sql = mysqli_num_rows($sql);

    if ($result_sql == 0) {
        header('Location: lista_exp.php');
    }else {

        while ($data = mysqli_fetch_array($sql)) {
            $id_exp = $data['id_exp'];
            $n_c = $data['nombre_contratante'];
            $obj_c = $data['obj_contrato'];
            $ubi = $data['ubicacion'];
            $m_bs = $data['monto_bs'];
            $m_dolores = $data['monto_dolares'];
            $f_ejecucion = $data['fecha_ejecucion'];
            $p_aso = $data['participa_aso'];
            $n_scio = $data['n_socio'];
            $detalle = $data['detalle'];
            $p_resp = $data['profesional_resp'];

            $jpg = $data['image'];
            $jpg2 = $data['image2'];
            $jpg3 = $data['image3'];
            $jpg4 = $data['image4'];
            $jpg5 = $data['image5'];
            $jpg6 = $data['image6'];
            $jpg7 = $data['image7'];
            $jpg8 = $data['image8'];
            $jpg9 = $data['image9'];
            $jpg10 = $data['image10'];
            $jpg11 = $data['image11'];
            $jpg12 = $data['image12'];
            $jpg13 = $data['image13'];
            $jpg14 = $data['image14'];
            $jpg15 = $data['image15'];

            if ($data['image'] != 'nodisponible.png' ) {
                $image = 'img/actas/'.$data['image'];
                

            }else {
                $image = 'img/'.$data['image'];
            }
            
            $image2 = 'img/actas/'.$data['image2'];
            $image3= 'img/actas/'.$data['image3'];

            $image4= 'img/actas/'.$data['image4'];
            $image5= 'img/actas/'.$data['image5'];
            $image6= 'img/actas/'.$data['image6'];
            $image7= 'img/actas/'.$data['image7'];
            $image8= 'img/actas/'.$data['image8'];
            $image9= 'img/actas/'.$data['image9'];
            $image10= 'img/actas/'.$data['image10'];
            $image11= 'img/actas/'.$data['image11'];
            $image12= 'img/actas/'.$data['image12'];
            $image13= 'img/actas/'.$data['image13'];
            $image14= 'img/actas/'.$data['image14'];
            $image15= 'img/actas/'.$data['image15'];

            
        }
    }

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <?php include "includes/scripts.php";?>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>SISPONCELET</title>
        
    </head>
    <body class="sb-nav-fixed">
    <?php include "includes/header.php";?>
    

        <!-- contenido del sistema-->

        <div id="layoutSidenav_content">
                <main>
                
                <div class="container-fluid px-4 ">
                <div class="container-fluid px-4 row">
                
                <center>
                    <h1 class="mt-4 col"><i class="fa-solid fa-triangle-exclamation"></i> Editar Experiencia <a class="btn btn-warning btn-sm disabled"> Que Corresponde a : <strong> <?php echo $n_c;?> </strong></a></h1> 
                    </center>
                    </div>   
                        
                        <hr>
                       <!-- contenido del sistema 2--> 
                        <!-- formulario de registro de usuarios-->



                    <div class="form_register  container px-4 ">

                    <div class=" container-register2 row ">
                        
                        
                        <form action="" method="post" enctype='multipart/form-data'>

                            <input type="hidden" name="id_exp" value="<?php echo $id_exp;?>">

                            <div class=" mb-3 caja">
                                    <span for="inputFirstName">Nombre del Contratante / Persona y Dirección de Contacto</span>
                                    <input  class="form-control form-control-sm " name="nombre_contratante" type="text" value="<?php echo $n_c;?>" />
                            </div>

                            <div class=" mb-3 caja">
                                    <span for="inputFirstName">Objeto del Contrato (Obra similar)</span> 
                                    <input class="form-control form-control-sm" name="obj_contrato" type="text"  value="<?php echo $obj_c;?>"/>
                            </div>

                             <hr>
                            <div class="row">
                                    <div class="col-md-6">
                                        <div class=" mb-3 mb-md-0">
                                            <span for="inputFirstName">Ubicación</span> 
                                            <input class="form-control form-control-sm" name="ubicacion" type="text" value="<?php echo $ubi;?>"  />
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class=" mb-3 mb-md-0">
                                            <span for="inputFirstName">Monto en Bs.</span> 
                                            <input class="form-control form-control-sm money" id="bs" name="monto_bs" type="number" step='0.001'  placeholder='0.00' oninput="calcular_a_dolar()" value="<?php echo $m_bs;?>" />
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class=" mb-3 mb-md-0">
                                            <span for="inputFirstName">Monto en $u$ </span> 
                                            <input class="form-control form-control-sm money " id="dolar" name="monto_dolares" type="number" step='0.001'  placeholder='0.00' oninput="calcular_a_bs()" value="<?php echo $m_dolores;?>" />
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class=" mb-3 mb-md-0">
                                            <span for="inputFirstName">Período de ejecución </span> 
                                            <input class="form-control form-control-sm" name="fecha_ejecucion" type="date" value="<?php echo $f_ejecucion;?>" />
                                        </div>
                                    </div>

                                    

                                    <div class="col-md-6">
                                        <div class=" mb-3 mb-md-0">
                                            <span for="inputFirstName">% participación en Asociación (**)</span> 
                                            <input class="form-control form-control-sm" name="participa_aso" type="text" value="<?php echo $p_aso;?>" />
                                        </div>
                                    </div> 

                                    <div class="col-md-6">
                                        <div class=" mb-3 mb-md-0">
                                            <span for="inputFirstName">Nombre Ll del Socio(s) (***)</span> 
                                            <input class="form-control form-control-sm" name="n_socio" type="text" value="<?php echo $p_aso;?>" />
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class=" mb-3 mb-md-0">
                                            <span for="inputFirstName">Profesional Responsable (****)</span> 
                                            <input class="form-control form-control-sm warning" name="profesional_resp" type="text" value="<?php echo $p_resp;?>"/>
                                            
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class=" mb-3 mb-md-0">
                                            <span for="inputFirstName">Detalle de la Experiencia <span style="color:red"> (Colocar Palabras Clave ejm. Computadoras) </span></span> 
                                            <input class="form-control form-control-sm bg-info bg-opacity-25" name="detalle" type="text"  value="<?php echo $detalle;?>" required  />
                                        </div>
                                    </div>

                                    <hr class="w-100">     
                                    <center><input type="submit" value="Actualizar Datos" class="btn btn-success  border-0 w-50   " data-dismiss="alert" ></center>

                                </form>
                                    <hr>

                                    


                                    <form action="editar_acta.php" method="post" enctype='multipart/form-data' class="row">

                                    <input type="hidden" name="id_exp" value="<?php echo $id_exp;?>">
                                    <input type="hidden" name="fecha" value="<?php echo $f_ejecucion;?>">
                                    
                                    


                                    
                                
                                    
                                    <div class="dropdown col-sm-6 ">
                                <button class="btn btn-secondary dropdown-toggle w-100" type="button" data-bs-toggle="dropdown" aria-expanded="false" >
                                <i class="fa-solid fa-folder-open"></i> Subir Actas 1-8 Pag.
                                </button>
                                <ul class="dropdown-menu dropdown-menu-dark w-100 ">
                                    <li><a class="dropdown-item" href="#">Acta N°1<input type="file" class="form-control form-control-sm"  name="image1" id="files" ></a></li>
                                    <li><a class="dropdown-item" href="#">Acta N°2<input type="file" class="form-control form-control-sm"  name="image2" id="files"></a></li>
                                    <li><a class="dropdown-item" href="#">Acta N°3<input type="file" class="form-control form-control-sm"  name="image3" id="files"></a></li>

                                    <li><a class="dropdown-item" href="#">Acta N°4<input type="file" class="form-control form-control-sm"  name="image4" id="files"></a></li>
                                    <li><a class="dropdown-item" href="#">Acta N°5<input type="file" class="form-control form-control-sm"  name="image5" id="files"></a></li>
                                    <li><a class="dropdown-item" href="#">Acta N°6<input type="file" class="form-control form-control-sm"  name="image6" id="files"></a></li>
                                    <li><a class="dropdown-item" href="#">Acta N°7<input type="file" class="form-control form-control-sm"  name="image7" id="files"></a></li>
                                    <li><a class="dropdown-item" href="#">Acta N°8<input type="file" class="form-control form-control-sm"  name="image8" id="files"></a></li>

                                    
                                    
                                </ul>
                                </div>

                                <div class="dropdown col-sm-6 ">
                                <button class="btn btn-secondary dropdown-toggle w-100" type="button" data-bs-toggle="dropdown" aria-expanded="false" >
                                <i class="fa-solid fa-folder-open"></i> Subir Actas 9-15 Pag.
                                </button>
                                <ul class="dropdown-menu dropdown-menu-dark w-100 ">
                                    <li><a class="dropdown-item" href="#">Acta N°9<input type="file" class="form-control form-control-sm"  name="image9" id="files"></a></li>
                                    <li><a class="dropdown-item" href="#">Acta N°10<input type="file" class="form-control form-control-sm"  name="image10" id="files" ></a></li>
                                    <li><a class="dropdown-item" href="#">Acta N°11<input type="file" class="form-control form-control-sm"  name="image11" id="files"></a></li>

                                    <li><a class="dropdown-item" href="#">Acta N°12<input type="file" class="form-control form-control-sm"  name="image12" id="files"></a></li>
                                    <li><a class="dropdown-item" href="#">Acta N°13<input type="file" class="form-control form-control-sm"  name="image13" id="files"></a></li>
                                    <li><a class="dropdown-item" href="#">Acta N°14<input type="file" class="form-control form-control-sm"  name="image14" id="files"></a></li>
                                    <li><a class="dropdown-item" href="#">Acta N°15<input type="file" class="form-control form-control-sm"  name="image15" id="files"></a></li>
                                    

                                    
                                    
                                </ul>
                                </div>

                                <hr class="w-100">     
                                    <center><input type="submit" value="Actualizar Actas " class="btn btn-success  border-0 w-50   " data-dismiss="alert" ></center>
                                    

                                </form>

                                </div>

                                

                                    <div class=" col-md-12"> <hr>

                                        <td class="col-sm-3">
                                            <img style= "width:100px; heigth:200px;" src="<?php echo $image ?>" alt="" class="gallery-item"> 
</td>
                                        <td>
                                            <img style= "width:100px; heigth:200px;" src="<?php echo $image2 ?>" alt="" class="gallery-item">
                                             
                                        </td>
                                        <td>
                                            <img style= "width:100px; heigth:200px;" src="<?php echo $image3 ?>" alt="" class="gallery-item"> 
                                        </td>
                                        <td>
                                            <img style= "width:100px; heigth:200px;" src="<?php echo $image4 ?>" alt="" class="gallery-item"> 
                                        </td>
                                        <td>
                                            <img style= "width:100px; heigth:200px;" src="<?php echo $image5 ?>" alt="" class="gallery-item"> 
                                        </td>
                                        <td>
                                            <img style= "width:100px; heigth:200px;" src="<?php echo $image6 ?>" alt="" class="gallery-item"> 
                                        </td>
                                        <td>
                                            <img style= "width:100px; heigth:200px;" src="<?php echo $image7 ?>" alt="" class="gallery-item"> 
                                        </td>
                                        <td>
                                            <img style= "width:100px; heigth:200px;" src="<?php echo $image8 ?>" alt="" class="gallery-item"> 
                                        </td>
                                        <td>
                                            <img style= "width:100px; heigth:200px;" src="<?php echo $image9 ?>" alt="" class="gallery-item"> 
                                        </td>
                                        <td>
                                            <img style= "width:100px; heigth:200px;" src="<?php echo $image10 ?>" alt="" class="gallery-item"> 
                                        </td>
                                        <td>
                                            <img style= "width:100px; heigth:200px;" src="<?php echo $image11 ?>" alt="" class="gallery-item"> 
                                        </td>
                                        <td>
                                            <img style= "width:100px; heigth:200px;" src="<?php echo $image12 ?>" alt="" class="gallery-item"> 
                                        </td>
                                        <td>
                                            <img style= "width:200px; heigth:200px;" src="<?php echo $image13 ?>" alt="" class="gallery-item"> 
                                        </td><td>
                                            <img style= "width:200px; heigth:200px;" src="<?php echo $image14 ?>" alt="" class="gallery-item"> 
                                        </td><td>
                                            <img style= "width:200px; heigth:200px;" src="<?php echo $image15 ?>" alt="" class="gallery-item"> 
                                        </td>

                                    </div>
                                    

                                    
                                        </div>
                            
                                    
                                    <div class=" form-text text-center " role="alert" style=""> <?php echo isset ($alert) ? $alert :''; ?></div>
                            
                       </form>

                       
                    </div>
                        
                    </div>

                                    <div class="modal fade" id="gallery-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-xl" >
                                                <div class="modal-content modal-fullscreen ">
                                                <div class="modal-header">
                                                    <!--<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>-->
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body" >
                                                    <img src="img/actas/acta_103_1_2021-02-22.jpg" class="modal-img" alt="modal img">
                                                </div>
                                                
                                                </div>
                                            </div>
                                    </div>

                        
                    </div>
                </main>
                
          


        <script type="text/javascript">
        function calcular_a_dolar(){
            try{
                var a = parseFloat(document.getElementById("bs").value) || 0;
                decimal = a.toFixed(2);
                proceso = decimal/6.96;
                result = proceso.toFixed(2);
                document.getElementById("dolar").value = result;
            } catch(e){}
        }

        function calcular_a_bs(){
            try{
                var b = parseFloat(document.getElementById("dolar").value) || 0;
                decimal = b.toFixed(2);
                proceso = decimal*6.96;
                result = proceso.toFixed(2);
                document.getElementById("bs").value = result;
            } catch(e){}
        }


        

    </script>
        <script>
            function archivo(evt) {
                var files = evt.target.files; // FileList object
                
                    //Obtenemos la imagen del campo "file". 
                for (var i = 0, f; f = files[i]; i++) {         
                    //Solo admitimos imágenes.
                    if (!f.type.match('image.*')) {
                            continue;
                    }
                
                    var reader = new FileReader();
                    
                    reader.onload = (function(theFile) {
                        return function(e) {
                        // Creamos la imagen.
                                document.getElementById("list").innerHTML = ['<img class="form-control" style="max-width:400px;" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
                        };
                    })(f);
            
                    reader.readAsDataURL(f);
                }
            }
                        
                document.getElementById('files').addEventListener('change', archivo, false);
        </script>
        <script>
    document.addEventListener("click",function(e){
        if(e.target.classList.contains("gallery-item")){
            const src = e.target.getAttribute("src");
            document.querySelector(".modal-img").src = src;

            const myModal = new bootstrap.Modal(document.getElementById('gallery-modal'));
            myModal.show();
        }
    });
</script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>