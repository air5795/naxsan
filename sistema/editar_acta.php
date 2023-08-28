<?php 
session_start();
include "../conexion.php";



$query = mysqli_query($conexion, "SELECT * FROM exp_general");
    $result = mysqli_num_rows($query);
    if ($result > 0) {
        while ($data = mysqli_fetch_array($query)) {

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
             
        }}

if (!empty($_POST)) {

            $id_exp = $_POST['id_exp'];
            $fecha_ejecucion = $_POST['fecha'];



            $picture1 = $_FILES['image1'];
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






if ($picture1['size'] == 0) {
    $picture1 = $jpg;
} else {
    //imagen 1   
$nombre_image1 = $picture1['name'];
$type1= $picture1['type'];
$url_temp1 = $picture1['tmp_name'];

$imgProducto1 = 'nodisponible.png';

if ($nombre_image1 != '' ) {
    $destino1 = 'img/actas/';
    $img_nombre1 = 'acta_'.$fecha_ejecucion.'_'.$id_exp.'_1';
    //$img_nombre2 = 'acta_'.$id_exp.'_2_'.$fecha_ejecucion;
    //$img_nombre = 'acta_'.$ubicacion.'-'.$fecha_ejecucion.date('H:m:s');
    $picture1 = $img_nombre1.'.jpg';
    $src1= $destino1.$picture1;
}
}




if ($picture2['size'] == 0) {
    $picture2 = $jpg2;
}else {
    //imagen 2   
$nombre_image2 = $picture2['name'];
$type2= $picture2['type'];
$url_temp2 = $picture2['tmp_name'];

$imgProducto2 = 'nodisponible.png';

if ($nombre_image2 != '') {
    $destino2 = 'img/actas/';
    $img_nombre2 = 'acta_'.$fecha_ejecucion.'_'.$id_exp.'_2';
    //$img_nombre2 = 'acta_'.$id_exp.'_2_'.$fecha_ejecucion;
    //$img_nombre = 'acta_'.$ubicacion.'-'.$fecha_ejecucion.date('H:m:s');
    $picture2 = $img_nombre2.'.jpg';
    $src2= $destino2.$picture2;
}
}




if ($picture3['size'] == 0) {
    $picture3 = $jpg3;
}else {
//imagen 3
$nombre_image3 = $picture3['name'];
$type3 = $picture3['type'];
$url_temp3 = $picture3['tmp_name'];

$imgProducto3 = 'nodisponible.png';

if ($nombre_image3 != '') {
    $destino3 = 'img/actas/';
    $img_nombre3 = 'acta_'.$fecha_ejecucion.'_'.$id_exp.'_3';
    //$img_nombre3 = 'acta_'.$id_exp.'_3_'.$fecha_ejecucion;
    //$img_nombre = 'acta_'.$ubicacion.'-'.$fecha_ejecucion.date('H:m:s');
    $picture3 = $img_nombre3.'.jpg';
    $src3= $destino3.$picture3;
}
}



if ($picture4['size'] == 0) {
    $picture4 = $jpg4;
}else {
//imagen 4
$nombre_image4 = $picture4['name'];
$type4 = $picture4['type'];
$url_temp4 = $picture4['tmp_name'];

$imgProducto4 = 'nodisponible.png';

if ($nombre_image4 != '') {
    $destino4 = 'img/actas/';
    $img_nombre4 = 'acta_'.$fecha_ejecucion.'_'.$id_exp.'_4';
    //$img_nombre3 = 'acta_'.$id_exp.'_3_'.$fecha_ejecucion;
    //$img_nombre = 'acta_'.$ubicacion.'-'.$fecha_ejecucion.date('H:m:s');
    $picture4 = $img_nombre4.'.jpg';
    $src4= $destino4.$picture4;
}   
}



if ($picture5['size'] == 0) {
    $picture5 = $jpg5;
}else {
//imagen 5
$nombre_image5 = $picture5['name'];
$type5 = $picture5['type'];
$url_temp5 = $picture5['tmp_name'];

$imgProducto5 = 'nodisponible.png';

if ($nombre_image5 != '') {
    $destino5 = 'img/actas/';
    $img_nombre5 = 'acta_'.$fecha_ejecucion.'_'.$id_exp.'_5';
    //$img_nombre3 = 'acta_'.$id_exp.'_3_'.$fecha_ejecucion;
    //$img_nombre = 'acta_'.$ubicacion.'-'.$fecha_ejecucion.date('H:m:s');
    $picture5 = $img_nombre5.'.jpg';
    $src5= $destino5.$picture5;
}    
}



if ($picture6['size'] == 0) {
    $picture6 = $jpg6;
} else {
//imagen 6
$nombre_image6 = $picture6['name'];
$type6 = $picture6['type'];
$url_temp6 = $picture6['tmp_name'];

$imgProducto6 = 'nodisponible.png';

if ($nombre_image6 != '') {
    $destino6 = 'img/actas/';
    $img_nombre6 = 'acta_'.$fecha_ejecucion.'_'.$id_exp.'_6';
    //$img_nombre3 = 'acta_'.$id_exp.'_3_'.$fecha_ejecucion;
    //$img_nombre = 'acta_'.$ubicacion.'-'.$fecha_ejecucion.date('H:m:s');
    $picture6 = $img_nombre6.'.jpg';
    $src6= $destino6.$picture6;
}
}




if ($picture7['size'] == 0) {
    $picture7 = $jpg7;
}else {
//imagen 7
$nombre_image7 = $picture7['name'];
$type7 = $picture7['type'];
$url_temp7 = $picture7['tmp_name'];

$imgProducto7 = 'nodisponible.png';

if ($nombre_image7 != '') {
    $destino7 = 'img/actas/';
    $img_nombre7 = 'acta_'.$fecha_ejecucion.'_'.$id_exp.'_7';
    //$img_nombre3 = 'acta_'.$id_exp.'_3_'.$fecha_ejecucion;
    //$img_nombre = 'acta_'.$ubicacion.'-'.$fecha_ejecucion.date('H:m:s');
    $picture7 = $img_nombre7.'.jpg';
    $src7= $destino7.$picture7;
}    
}


if ($picture8['size'] == 0) {
    $picture8 = $jpg8;
}else {
//imagen 8
$nombre_image8 = $picture8['name'];
$type8 = $picture8['type'];
$url_temp8 = $picture8['tmp_name'];

$imgProducto8 = 'nodisponible.png';

if ($nombre_image8 != '') {
    $destino8 = 'img/actas/';
    $img_nombre8 = 'acta_'.$fecha_ejecucion.'_'.$id_exp.'_8';
    //$img_nombre3 = 'acta_'.$id_exp.'_3_'.$fecha_ejecucion;
    //$img_nombre = 'acta_'.$ubicacion.'-'.$fecha_ejecucion.date('H:m:s');
    $picture8 = $img_nombre8.'.jpg';
    $src8= $destino8.$picture8;
}    
}



if ($picture9['size'] == 0) {
    $picture9 = $jpg9;
}else {
//imagen 9
$nombre_image9 = $picture9['name'];
$type9 = $picture9['type'];
$url_temp9 = $picture9['tmp_name'];

$imgProducto9 = 'nodisponible.png';

if ($nombre_image9 != '') {
    $destino9 = 'img/actas/';
    $img_nombre9 = 'acta_'.$fecha_ejecucion.'_'.$id_exp.'_9';
    //$img_nombre3 = 'acta_'.$id_exp.'_3_'.$fecha_ejecucion;
    //$img_nombre = 'acta_'.$ubicacion.'-'.$fecha_ejecucion.date('H:m:s');
    $picture9 = $img_nombre9.'.jpg';
    $src9= $destino9.$picture9;
}    
}



if ($picture10['size'] == 0) {
    $picture10 = $jpg10;
}else {
//imagen 10
$nombre_image10 = $picture10['name'];
$type10 = $picture10['type'];
$url_temp10 = $picture10['tmp_name'];

$imgProducto10 = 'nodisponible.png';

if ($nombre_image10 != '') {
    $destino10 = 'img/actas/';
    $img_nombre10 = 'acta_'.$fecha_ejecucion.'_'.$id_exp.'_10';
    //$img_nombre3 = 'acta_'.$id_exp.'_3_'.$fecha_ejecucion;
    //$img_nombre = 'acta_'.$ubicacion.'-'.$fecha_ejecucion.date('H:m:s');
    $picture10 = $img_nombre10.'.jpg';
    $src10= $destino10.$picture10;
}   
}



if ($picture11['size'] == 0) {
    $picture11 = $jpg11;
}else {
//imagen 11
$nombre_image11 = $picture11['name'];
$type11 = $picture11['type'];
$url_temp11 = $picture11['tmp_name'];

$imgProducto11 = 'nodisponible.png';

if ($nombre_image11 != '') {
    $destino11 = 'img/actas/';
    $img_nombre11 = 'acta_'.$fecha_ejecucion.'_'.$id_exp.'_11';
    //$img_nombre3 = 'acta_'.$id_exp.'_3_'.$fecha_ejecucion;
    //$img_nombre = 'acta_'.$ubicacion.'-'.$fecha_ejecucion.date('H:m:s');
    $picture11 = $img_nombre11.'.jpg';
    $src11= $destino11.$picture11;
}    
}



if ($picture12['size'] == 0) {
    $picture12 = $jpg12;
}else {
//imagen 12
$nombre_image12 = $picture12['name'];
$type12 = $picture12['type'];
$url_temp12 = $picture12['tmp_name'];

$imgProducto12 = 'nodisponible.png';

if ($nombre_image12 != '') {
    $destino12 = 'img/actas/';
    $img_nombre12 = 'acta_'.$fecha_ejecucion.'_'.$id_exp.'_12';
    //$img_nombre3 = 'acta_'.$id_exp.'_3_'.$fecha_ejecucion;
    //$img_nombre = 'acta_'.$ubicacion.'-'.$fecha_ejecucion.date('H:m:s');
    $picture12 = $img_nombre12.'.jpg';
    $src12= $destino12.$picture12;
}    
}



if ($picture13['size'] == 0) {
    $picture13 = $jpg13;
}else {
//imagen 13
$nombre_image13 = $picture13['name'];
$type13 = $picture13['type'];
$url_temp13 = $picture13['tmp_name'];

$imgProducto13 = 'nodisponible.png';

if ($nombre_image13 != '') {
    $destino13 = 'img/actas/';
    $img_nombre13 = 'acta_'.$fecha_ejecucion.'_'.$id_exp.'_13';
    //$img_nombre3 = 'acta_'.$id_exp.'_3_'.$fecha_ejecucion;
    //$img_nombre = 'acta_'.$ubicacion.'-'.$fecha_ejecucion.date('H:m:s');
    $picture13 = $img_nombre13.'.jpg';
    $src13= $destino13.$picture13;
}   
}



if ($picture14['size'] == 0) {
    $picture14 = $jpg14;
}else {
//imagen 14
$nombre_image14 = $picture14['name'];
$type14 = $picture14['type'];
$url_temp14 = $picture14['tmp_name'];

$imgProducto14 = 'nodisponible.png';

if ($nombre_image14 != '') {
    $destino14 = 'img/actas/';
    $img_nombre14 = 'acta_'.$fecha_ejecucion.'_'.$id_exp.'_14';
    //$img_nombre3 = 'acta_'.$id_exp.'_3_'.$fecha_ejecucion;
    //$img_nombre = 'acta_'.$ubicacion.'-'.$fecha_ejecucion.date('H:m:s');
    $picture14 = $img_nombre14.'.jpg';
    $src14= $destino14.$picture14;
}   
}



if ($picture15['size'] == 0) {
    $picture15 = $jpg15;
}else {
//imagen 15
$nombre_image15 = $picture15['name'];
$type15 = $picture15['type'];
$url_temp15 = $picture15['tmp_name'];

$imgProducto15 = 'nodisponible.png';

if ($nombre_image15 != '') {
    $destino15 = 'img/actas/';
    $img_nombre15 = 'acta_'.$fecha_ejecucion.'_'.$id_exp.'_15';
    //$img_nombre3 = 'acta_'.$id_exp.'_3_'.$fecha_ejecucion;
    //$img_nombre = 'acta_'.$ubicacion.'-'.$fecha_ejecucion.date('H:m:s');
    $picture15 = $img_nombre15.'.jpg';
    $src15= $destino15.$picture15;
}   
}














$sql_update1 = mysqli_query($conexion, "UPDATE
                                                    exp_general
                                                    SET
                                                        image = '$picture1',
                                                        image2 = '$picture2',
                                                        image3 = '$picture3',
                                                        image4 = '$picture4',
                                                        image5 = '$picture5',
                                                        image6 = '$picture6',
                                                        image7 = '$picture7',
                                                        image8 = '$picture8',
                                                        image9 = '$picture9',
                                                        image10 = '$picture10',
                                                        image11 = '$picture11',
                                                        image12 = '$picture12',
                                                        image13 = '$picture13',
                                                        image14 = '$picture14',
                                                        image15 = '$picture15'
                                                    WHERE
                                                        id_exp = $id_exp");


if ($sql_update1) {

    $alert = '<p class="alert alert-success"> SE ACTUALIZO CORRECTAMENTE </p> ';
    header("Location:  lista_exp.php");


    unlink('img/actas/'.$jpg);
    unlink('img/actas/'.$jpg2);
    unlink('img/actas/'.$jpg3);
    unlink('img/actas/'.$jpg4);
    unlink('img/actas/'.$jpg5);
    unlink('img/actas/'.$jpg6);
    unlink('img/actas/'.$jpg7);
    unlink('img/actas/'.$jpg8);
    unlink('img/actas/'.$jpg9);
    unlink('img/actas/'.$jpg10);
    unlink('img/actas/'.$jpg11);
    unlink('img/actas/'.$jpg12);
    unlink('img/actas/'.$jpg13);
    unlink('img/actas/'.$jpg14);
    unlink('img/actas/'.$jpg15);

 


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


    

}
else{
$alert = '<p class="alert alert-danger w-50"> LA ACTUALIZACION FALLO </p> ';


}
}






        
?>


