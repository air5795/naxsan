<?php

session_start();
include "../conexion.php";

$sql_suma_bs = mysqli_query($conexion, "SELECT SUM(monto_bs) FROM exp_general;");
                            $result_sum = mysqli_fetch_array($sql_suma_bs);
                            $total = $result_sum['SUM(monto_bs)']; 

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
                        <td colspan="10" class="comer">EXPERIENCIA GENERAL</td>
                    </tr> 
                    <tr>
                        <td colspan="10" class="comer2">Empresa Comercializadora PONCELET</td>
                    </tr>
                    <tr class="comer3">
                        <th>N°</th>
                        <th >Nombre del contratante / Persona y Direccion de contacto</th>
                        <th >Objeto del Contrato</th>
                        <th>Ubicacion</th>
                        <th>Monto final del contrato en (Bs)</th>
                        <th>Periodo de ejecucion (Fecha de inicio y finalizacion)</th>
                        <th>Monto en $u$ (Llenado de uso alternativo)</th>
                        <th>% de Participacion en Asociacion</th>
                        <th>Nombre LI del Socio(s)</th>
                        <th>Profesional Responsable</th> 
                    </tr>
                    
                    <?php
                    // rescatar datos DB 
                    $query = mysqli_query($conexion, "SELECT
                                                            ROW_NUMBER() OVER(
                                                        ORDER BY
                                                            fecha_ejecucion
                                                        ) row_num,
                                                        fecha_ejecucion,
                                                        monto_bs,
                                                        monto_dolares,
                                                        nombre_contratante,
                                                        n_socio,
                                                        obj_contrato,
                                                        participa_aso,
                                                        profesional_resp,
                                                        ubicacion
                                                        FROM
                                                            exp_general
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
                                    <?php 
                                        setlocale(LC_TIME, "spanish");
                                        //echo $data['fecha_ejecucion']
                                        echo strftime('%e/%B/%Y', strtotime($data['fecha_ejecucion']));
                                    ?>
                                </td>
                                <td><?php echo number_format($data['monto_dolares'],2,'.',',').' $' ?></td>
                                <td><?php echo $data['participa_aso'] ?></td>
                                <td><?php echo $data['n_socio'] ?></td>
                                <td><?php echo $data['profesional_resp'] ?></td>
                            </tr>
                    <?php

                        }
                    }
                    ?>

                    <tr>
                        <td colspan="6" class="comer2">TOTAL FACTURADO EN BOLIVIANOS (****)</td>
                        <td colspan="4" class="comer"><?php echo number_format($total,2,'.',',').' Bs'?></td>
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
                    $dompdf->stream('Experiencia_General',array('attachment'=>0));
                           
                ?>

