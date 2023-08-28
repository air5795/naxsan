<?php

session_start();
include "../conexion.php";

$sql_suma_bs = mysqli_query($conexion, "SELECT SUM(monto_bs) FROM exp_general_c;");
                            $result_sum = mysqli_fetch_array($sql_suma_bs);
                            $total = $result_sum['SUM(monto_bs)']; 

$sql_suma_us = mysqli_query($conexion, "SELECT SUM(monto_dolares) FROM exp_general_c;");
                            $result_sum = mysqli_fetch_array($sql_suma_us);
                            $total_us = $result_sum['SUM(monto_dolares)']; 

require_once 'pdf/vendor/autoload.php';
use Dompdf\Dompdf;
ob_start();
?>


<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link href="css/style3.css" rel="stylesheet" />

    <title>SISPONCELET</title>

</head>

<body >
<table>
                    
                    
                    
                        <tr>
                            <td colspan="11" class="exp5"> <STRONG style="font-size:12px;"> FORMULARIO </STRONG></td>
                        </tr>
                        <tr>
                            <td colspan="11" class="exp4"> <STRONG style="font-size:13px;"> EXPERIENCIA GENERAL DE LA EMPRESA </STRONG></td>
                        </tr>
                        
                     
                    
                    <tr>
                        <td colspan="11" class="emp" style="background-color: #B3B3B3;"> <STRONG>  EMPRESA CONSTRUCTORA PONCELET </STRONG></td> 
                    </tr>
                    <tr  style="background-color: #F2F2F2; ">
                        <td>N°</td>
                        <td >Nombre del contratante / Persona y Direccion de contacto</td>
                        <td >Objeto del Contrato(Obras General)</td>
                        <td>Ubicación </td>
                        <td>Monto final del contrato en Bs. (*)</td>
                        <td>Periodo de ejecucion (Fecha de inicio y finalizacion)</td>
                        <td>Monto en $u$ (Llenado de uso alternativo)</td>

                        <td>% de Participacion en Asociacion(**)</td>
                        <td>Nombre del Socio(s)(***)</td>
                        <td >Profesional Responsable(****)</td>
                        <td>Documento que acredita # Página</td>
    
                    </tr>
                    
                    <?php
                    // rescatar datos DB 
                    $query = mysqli_query($conexion, "SELECT
                                                            ROW_NUMBER() OVER(
                                                        ORDER BY
                                                            fecha_ejecucion
                                                        ) row_num,
                                                        fecha_ejecucion,
                                                        fecha_final,
                                                        monto_bs,
                                                        monto_dolares,
                                                        nombre_contratante,
                                                        n_socio,
                                                        obj_contrato,
                                                        participa_aso,
                                                        profesional_resp,
                                                        ubicacion
                                                        FROM
                                                            exp_general_c
                                                        ORDER BY
                                                            fecha_ejecucion;");




                    $result = mysqli_num_rows($query);

                    

                    if ($result > 0) {
                        while ($data = mysqli_fetch_array($query)) {
                            

                    ?>
                            <tr>
                                <td><?php echo $data['row_num']?></td>
                                <td><?php echo $data['nombre_contratante'] ?></td>
                                <td><?php echo $data['obj_contrato'] ?></td>
                                <td><?php echo $data['ubicacion'] ?></td>
                                <td><?php echo number_format($data['monto_bs'],2,'.',',').' Bs' ?></td>
                                <td>
                                    <strong>FECHA INICIO</strong> <br>
                                    <?php 
                                        setlocale(LC_TIME, "spanish");
                                        //echo $data['fecha_ejecucion']
                                        echo strftime('%e de %B %Y', strtotime($data['fecha_ejecucion']));
                                    ?> 
                                    <br>
                                    <strong>FECHA FINALIZACION</strong><br>
                                    <?php 
                                        setlocale(LC_TIME, "spanish");
                                        //echo $data['fecha_ejecucion']
                                        echo strftime('%e de %B %Y', strtotime($data['fecha_final']));
                                    ?>
                                </td>
                                <td><?php echo number_format($data['monto_dolares'],2,'.',',').' $' ?></td>
                                
                                <td><?php echo $data['participa_aso'] ?></td>
                                <td><?php echo $data['n_socio'] ?></td>
                                <td><?php echo $data['profesional_resp'] ?></td>
                                <td>Pag. 123</td>
                                
                                
                            </tr>
                    <?php

                        }
                    }
                    ?>

                    <tr class="exp">
                        <td colspan="5" style="text-align: right; background-color: #F2F2F2; ">  TOTAL FACTURADO EN DÓLARES AMERICANOS (Llenado de uso alternativo)</td>
                        <td colspan="6"style="background-color: white;"> <?php echo number_format($total_us,2,'.',',').' $'?></td>
                    </tr>
                    <tr class="exp">
                        <td colspan="5" style="text-align: right; background-color: #F2F2F2;">TOTAL FACTURADO EN BOLIVIANOS (*****)</td>
                        <td colspan="6" style="background-color:white ;"><?php echo number_format($total,2,'.',',').' Bs'?></td>
                    </tr>
                    <tr class="exp">
                        
                        <td colspan="1" style="background-color: white ; text-align: left;" > <center> * </center></td>
                        <td colspan="10" style="background-color: white ; text-align: left;" > Monto a la fecha de Recepción Final de la Obra. </td>
                    </tr>
                    <tr class="exp">
                        
                        <td colspan="1" style="background-color: white ; text-align: left;" > <center> ** </center></td>
                        <td colspan="10" style="background-color: white ; text-align: left;" > Cuando la empresa cuente con experiencia asociada, solo se debe consignar el monto correspondiente a su participacion.</td>
                    </tr>
                    <tr class="exp">
                        
                        <td colspan="1" style="background-color: white ; text-align: left;" > <center> *** </center></td>
                        <td colspan="10" style="background-color: white ; text-align: left;" > Si el contrato lo ejecuto asociado, indicar en esta casilla del o los socios.</td>
                    </tr>
                    <tr class="exp">
                        
                        <td colspan="1" style="background-color: white ; text-align: left;" > <center> **** </center> </td>
                        <td colspan="10" style="background-color: white ; text-align: left;" > Indicar el nombre del Profesional Responsable, que desempeño el cargo de Superintendente, Residente o Director de Obras o su equivalente. Se puede nombrar a mas de un profesional, si asi correspondiese. </td>
                    </tr>
                    <tr class="exp">
                        
                        <td colspan="1" style="background-color: white ; text-align: left;" > <center> ***** </center> </td>
                        <td colspan="10" style="background-color: white ; text-align: left;" > El monto en bolivianos no necesariamentedebe coincidir con el monto en Dólares Americanos.  </td>
                    </tr>
                    <tr class="exp">
                        
                        
                        <td colspan="11" style="background-color: white ; text-align: left;" > <strong> NOTA.- </strong> Toda la información contenida en este formulario es una declaración jurada. En caso de adjudicación el proponente se compromete a presentar el certificado o acta de recepción definitiva de cada una de las obras detalladas, en original o fotocopia legalizada emitida por la entidad correspondiente. </td>
                    </tr>
                    <!--<tr>
                         <td colspan="10" class="exp2"><img class="im" src="img/sello.jpg" ></td>
                    </tr>-->

                    <tr>
                         <td colspan="11"  ><img style="height: 150px; width:150px; "  src="img/selloc.png" ></td>
                    </tr>
                    <!--<tr>
                         <td colspan="10" class="exp2"><img class="im" src="img/sello.jpg" ></td>
                    </tr>-->


                </table>

                

                <!--<div style="page-break-after:always;">
                            
                </div>-->
                    
                </body>

                </html>
                <?php 
                    $html = ob_get_clean();
                    $dompdf = new Dompdf();
                    $dompdf->loadHtml($html);
                    $dompdf->setPaper('letter','portrait');
                    $dompdf->set_option('dpi', 100);
                    
                    //$dompdf->setPaper('A4', 'landscape');
                    $dompdf->render();
                    $dompdf->stream('Exp_General_Constructora',array('attachment'=>0));
                                       
                ?>


