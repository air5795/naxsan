<?php

session_start();
include "../conexion.php";

require_once 'pdf/vendor/autoload.php';
use Dompdf\Dompdf;
ob_start();
?>


<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link href="css/style3.css" rel="stylesheet" />



    <title>SISPONCELET</title>

</head>

<body>
    
<table>
                
                    <tr>
                        <td colspan="10" class="comer">EXPERIENCIA ESPECIFICA</td>
                    </tr>
                    <tr>
                        <td colspan="10" class="comer2">Empresa Comercializadora PONCELET</td>
                    </tr>
                    <tr class="comer3">
                        <th>N°</th>
                        <th>Nombre del contratante / Persona y Direccion de contacto</th>
                        <th>Objeto del Contrato</th>
                        <th>Ubicacion</th>
                        <th>Monto final del contrato en (Bs)</th>
                        <th>Periodo de ejecucion (Fecha de inicio y finalizacion)</th>
                        <th>Monto en $u$ (Llenado de uso alternativo)</th>
                        <th>% de Participacion en Asociacion</th>
                        <th>Nombre LI del Socio(s)</th>
                        <th>Profesional Responsable</th> 
                    </tr>
                    
                    <?php

                    $sql = '';


                    if(!(empty($_POST['check']))){	
                        foreach($_POST['check'] as $elegidos){		
                        // echo $elegidos."<br>";
                        //echo  var_dump($elegidos);

                        //$cadena =  explode(',', $elegidos);

                        if ($sql != '')
                                
                        $sql .= ' OR ';
                        $sql .= "id_exp = $elegidos";

                        
                            
                    }}

                    // rescatar datos DB 
                    $query = mysqli_query($conexion, "SELECT ROW_NUMBER() OVER( ORDER BY fecha_ejecucion) row_num,
                                                                                                        id_exp,
                                                                                                        fecha_ejecucion,
                                                                                                        monto_bs,
                                                                                                        monto_dolares,
                                                                                                        nombre_contratante,
                                                                                                        n_socio,
                                                                                                        obj_contrato,
                                                                                                        participa_aso,
                                                                                                        profesional_resp,
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
                                                                                                        image15,
                                                                                                        ubicacion
                                                                                                        FROM
                                                                                                            exp_general
                                                                                                        WHERE
                                                                                                            $sql
                                                                                                        ORDER BY
                                                                                                            fecha_ejecucion;");



                    

                    $result = mysqli_num_rows($query);

                    // crear directorio o carpeta Exp especifica
                    //$nombre_directorio = "Exp_especifica";
                    //$resultado = mkdir("../sistema/img/"."/$nombre_directorio");
                    
                    
                    

                    // borrar contenido 

                    $files = glob('../sistema/img/Exp_especifica/*'); //obtenemos todos los nombres de los ficheros
                    foreach($files as $file){
                        if(is_file($file))
                        unlink($file); //elimino el fichero
                    }

                    
                    
                    

                    

                    if ($result > 0) {
                        while ($data = mysqli_fetch_array($query)) {
                            if ($data['image'] != 'nodisponible.png' ) {
                                $ru = $data['image'];
                                $image = 'sub-exp-comer/actas/'.$data['image'];
                                

                            }else {
                                $image = 'sub-exp-comer/'.$data['image'];
                            }
                            
                            $image2 = 'sub-exp-comer/actas/'.$data['image2'];
                            $ru2 = $data['image2'];
                            
                            $image3= 'sub-exp-comer/actas/'.$data['image3'];
                            $ru3 = $data['image3'];

                            $image4= 'sub-exp-comer/actas/'.$data['image4'];
                            $ru4 = $data['image4'];

                            $image5= 'sub-exp-comer/actas/'.$data['image5'];
                            $ru5 = $data['image5'];
                            $image6= 'sub-exp-comer/actas/'.$data['image6'];
                            $ru6 = $data['image6'];
                            $image7= 'sub-exp-comer/actas/'.$data['image7'];
                            $ru7 = $data['image7'];
                            $image8= 'sub-exp-comer/actas/'.$data['image8'];
                            $ru8 = $data['image8'];

                            $image9= 'sub-exp-comer/actas/'.$data['image9'];
                            $ru9 = $data['image9'];
                            $image10= 'sub-exp-comer/actas/'.$data['image10'];
                            $ru10 = $data['image10'];
                            $image11= 'sub-exp-comer/actas/'.$data['image11'];
                            $ru11 = $data['image11'];
                            $image12= 'sub-exp-comer/actas/'.$data['image12'];
                            $ru12 = $data['image12'];
                            $image13= 'sub-exp-comer/actas/'.$data['image13'];
                            $ru13 = $data['image13'];
                            $image14= 'sub-exp-comer/actas/'.$data['image14'];
                            $ru14 = $data['image14'];
                            $image15= 'sub-exp-comer/actas/'.$data['image15'];
                            $ru15 = $data['image15'];
                            

                    ?>
                            <tr>
                                <td><?php echo $data['row_num']?></td>
                                <td><?php echo $data['nombre_contratante'] ?></td>
                                <td><?php echo $data['obj_contrato'] ?></td>
                                <td><?php echo $data['ubicacion'] ?></td>
                                <td><?php echo number_format($data['monto_bs'],2,'.',',').' Bs' ?></td>
                                <td><?php 
                                        setlocale(LC_TIME, "spanish");
                                        //echo $data['fecha_ejecucion']
                                        echo strftime('%e/%B/%Y', strtotime($data['fecha_ejecucion']));
                                    ?></td>
                                <td><?php echo number_format($data['monto_dolares'],2,'.',',').' $' ?></td>
                                <td><?php echo $data['participa_aso'] ?></td>
                                <td><?php echo $data['n_socio'] ?></td>
                                <td><?php echo $data['profesional_resp'] ?></td>
                            </tr>
                    <?php

                    

                    // copiar actas especificas

                    
                    
                    if ($ru !='' )  {
                        $origen = "../sistema"."/$image";
                        $destino = "../sistema/img/Exp_especifica"."/$ru";
                        $resultado = copy($origen, $destino);
                        echo $destino;
                    }
                    if ($ru2 !='') {
                        $origen2 = "../sistema/".$image2;
                        $destino2 = "../sistema/img/Exp_especifica"."/$ru2";
                        $resultado2 = copy($origen2, $destino2);
                    }
                    if ($ru3 !='') {
                        $origen3 = "../sistema"."/$image3";
                        $destino3 = "../sistema/img/Exp_especifica"."/$ru3";
                        $resultado3 = copy($origen3, $destino3);
                        
                    }




                    if (!empty($ru4)) {
                        $origen4 = "../sistema"."/$image4";
                        $destino4 = "../sistema/img/Exp_especifica"."/$ru4";
                        $resultado4 = copy($origen4, $destino4);
                        
                    }

                    if (!empty($ru5)) {
                        $origen5 = "../sistema"."/$image5";
                        $destino5 = "../sistema/img/Exp_especifica"."/$ru5";
                        $resultado5 = copy($origen5, $destino5);
                        
                    }
                    if (!empty($ru6)) {
                        $origen6 = "../sistema"."/$image6";
                        $destino6 = "../sistema/img/Exp_especifica"."/$ru6";
                        $resultado6 = copy($origen6, $destino6);
                        
                    }
                    if (!empty($ru7)) {
                        $origen7 = "../sistema"."/$image7";
                        $destino7 = "../sistema/img/Exp_especifica"."/$ru7";
                        $resultado7 = copy($origen7, $destino7);
                        
                    }
                    if (!empty($ru8)) {
                        $origen8 = "../sistema"."/$image8";
                        $destino8 = "../sistema/img/Exp_especifica"."/$ru8";
                        $resultado8 = copy($origen8, $destino8);
                        
                    }




                    if (!empty($ru9)) {
                        $origen9 = "../sistema"."/$image9";
                        $destino9 = "../sistema/img/Exp_especifica"."/$ru9";
                        $resultado9 = copy($origen9, $destino9);
                        
                    }

                    if (!empty($ru10)) {
                        $origen10 = "../sistema"."/$image10";
                        $destino10 = "../sistema/img/Exp_especifica"."/$ru10";
                        $resultado10 = copy($origen10, $destino10);
                        
                    }

                    if (!empty($ru11)) {
                        $origen11 = "../sistema"."/$image11";
                        $destino11 = "../sistema/img/Exp_especifica"."/$ru11";
                        $resultado11 = copy($origen11, $destino11);
                        
                    }

                    if (!empty($ru12)) {
                        $origen12 = "../sistema"."/$image12";
                        $destino12 = "../sistema/img/Exp_especifica"."/$ru12";
                        $resultado12 = copy($origen12, $destino12);
                        
                    }

                    if (!empty($ru13)) {
                        $origen13 = "../sistema"."/$image13";
                        $destino13 = "../sistema/img/Exp_especifica"."/$ru13";
                        $resultado13 = copy($origen13, $destino13);
                        
                    }

                    if (!empty($ru14)) {
                        $origen14 = "../sistema"."/$image14";
                        $destino14 = "../sistema/img/Exp_especifica"."/$ru14";
                        $resultado14 = copy($origen14, $destino14);
                        
                    }

                    if (!empty($ru15)) {
                        $origen15 = "../sistema"."/$image15";
                        $destino15 = "../sistema/img/Exp_especifica"."/$ru15";
                        $resultado15 = copy($origen15, $destino15);
                        
                    }



                        }
                    }

                    //shell_exec('start C:/xampp/htdocs/poncelet-sis/sistema/img/Exp_especifica');
                    //shell_exec('start .');

                    $sql_suma_bs = mysqli_query($conexion, "SELECT SUM(monto_bs) FROM exp_general where $sql ;");
                            $result_sum = mysqli_fetch_array($sql_suma_bs);
                            $total = $result_sum['SUM(monto_bs)']; 
                    ?>
                    <tr>
                        <td colspan="6" class="comer">TOTAL FACTURADO EN BOLIVIANOS (****)</td>
                        <td colspan="4" class="comer2"><?php echo number_format($total,2,'.',',').' Bs'?></td>
                    </tr>
                    <tr>
                         <td colspan="10"  ><img style="height: 150px; width:150px; "  src="img/sello.jpg" ></td>
                    </tr>


                </table>

                

                <!--<div style="page-break-after:always;">
                            
                </div>-->
                    
                </body>

                </html>
                <?php
                    $html = ob_get_clean();
                    $dompdf = new Dompdf();
                    $dompdf->loadHtml($html);
                    //$dompdf->setPaper('letter','portrait');
                    $dompdf->setPaper('A4', 'landscape');
                    $dompdf->render();
                    $dompdf->stream('Experiencia_Especifica',array('attachment'=>0));                   
                ?>

