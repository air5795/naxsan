<?php

session_start();
include "../conexion.php";

$fecha_inicio_i = $_POST['fecha_inicio_i'];
$fecha_final_i = $_POST['fecha_final_i'];
$fecha_inicio_g = $_POST['fecha_inicio_g'];
$fecha_final_g = $_POST['fecha_final_g'];



                            $sql_suma_bs = mysqli_query($conexion, "SELECT
                                                                        SUM(g_montoBs)
                                                                    FROM
                                                                        gastos
                                                                    WHERE
                                                                        DATE(g_fecha_i) BETWEEN '{$fecha_inicio_g}' AND '{$fecha_final_g}';");
                            $result_sum = mysqli_fetch_array($sql_suma_bs);
                            $total = $result_sum['SUM(g_montoBs)']; 

                            $sql_suma_bs2 = mysqli_query($conexion, "SELECT
                                                                        SUM(montoBs)
                                                                    FROM
                                                                        ingresos
                                                                    WHERE
                                                                        DATE(fecha_i) BETWEEN '{$fecha_inicio_i}' AND '{$fecha_final_i}';");
                            $result_sum2 = mysqli_fetch_array($sql_suma_bs2);
                            $total2 = $result_sum2['SUM(montoBs)'];

                            
                            

                            $saldo = $total2 - $total;

                            $sql_suma_bs3 = mysqli_query($conexion, "SELECT SUM(montoBs) FROM ingresos;");
                            $result_sum3 = mysqli_fetch_array($sql_suma_bs3);
                            $total3 = $result_sum3['SUM(montoBs)'];

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
    <meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
    <link href="css/style3.css" rel="stylesheet" />



    <title>SISPONCELET</title>

    <style>
            /** Define the margins of your page **/
            @page {
                margin: 100px 25px;
            }
            

            header {
                position: fixed;
                top: -60px;
                left: 0px;
                right: 0px;
                height: 50px;
                font-size: 20px !important;

                /** Extra personal styles **/
                background-color: #008B8B;
                color: white;
                text-align: center;
                line-height: 35px;
            }

            footer {
                position: fixed; 
                bottom: -60px; 
                left: 0px; 
                right: 0px;
                height: 50px; 
                font-size: 20px !important;

                /** Extra personal styles **/
                background-color: #008B8B;
                color: white;
                text-align: center;
                line-height: 35px;
            }
        </style>

        <style></style>

</head>


<body  >

        <header>
                                    <div id="watermark" >
                                        <img src="img/FONDITO.png" height="100%" width="100%" />
                                    </div>
        </header>

        <footer>
                                    <div id="watermark" >
                                        <img src="img/FONDITO3.png" height="100%" width="100%" />
                                    </div>
        </footer>




<table style="width:97% ;">

            <tr>
                <td colspan="2" style=" border:solid white; text-align:right ;">
                <?php setlocale(LC_TIME, "spanish");
                                echo '<p style="color: coral; font-size:10px;text-align:right;opacity: 0.5;"> @irsoft-SYS-PONCELET</p>';
                                echo utf8_decode (strftime("%a, %d de %b de %Y  "));?>
                </td>
                 
            </tr>
            <tr>
                            <td colspan="2" style="font-size:10px; border-right-color: white; border-left-color: white; border-top-color:white;"> <STRONG style="font-size:13px;"> REPORTE GENERAL DE CAJA CHICA   </STRONG></td>
                        </tr>
    <tr>
        <th colspan="2" style="width:100% ; border-left-color: white; border-right-color: white; text-align:left ;" >Informe : Lic. Mavel Condori FLores</th>
    </tr>
    <tr>
        <th colspan="2" style="width:100% ; border-left-color: white; border-right-color: white; text-align:left ;" >INGRESOS</th>
    </tr>


    <tr >
        
        <th style="text-align:right ;">DESDE: </th>
        <th style="background-color: white ;" >
        <?php 
                                    setlocale(LC_TIME, "spanish");
                                    echo strftime('%e de %B %Y', strtotime($fecha_inicio_i));
                                    ?></th>
    </tr>
    <tr>
        
        <th style="text-align:right ;">HASTA: </th>
        <th style="background-color:white ;" >
        <?php 
                                    setlocale(LC_TIME, "spanish");
                                    echo strftime('%e de %B %Y', strtotime($fecha_final_i));
                                    ?></th>
    </tr>
    <tr>
        
        <th style="text-align:right ;">INGRESOS TOTAL</th>
        <th style="background-color: green ;font-size:15px; color:white" ><?php echo $total2.' Bs';?></th>
    </tr>


    <tr>
        <th colspan="2" style="width:100% ; border-left-color: white; border-right-color: white; text-align:left ;" >GASTOS</th>
    </tr>


    <tr >
        
        <th style="text-align:right ;">DESDE: </th>
        <th style="background-color: white ;" >
        <?php 
                                    setlocale(LC_TIME, "spanish");
                                    echo strftime('%e de %B %Y', strtotime($fecha_inicio_g));
                                    ?></th>
    </tr>
    <tr>
        
        <th style="text-align:right ;">HASTA: </th>
        <th style="background-color:white ;" >
        <?php 
                                    setlocale(LC_TIME, "spanish");
                                    echo strftime('%e de %B %Y', strtotime($fecha_final_g));
                                    ?></th>
    </tr>
    <tr>
        
        <th style="text-align:right ;">GASTOS TOTAL</th>
        <th style="background-color: #e45353 ;font-size:15px; color:white" ><?php echo $total.' Bs';?></th>
    </tr>

    <tr>
        <th colspan="2" style="width:100% ; border-left-color: white; border-right-color: white; text-align:left ;" >SALDO</th>
    </tr>

    <tr>
        
        <th style="text-align:right ;">Saldo TOTAL</th>
        <th style="background-color: #e5f58a ;font-size:15px; color:black" ><?php echo $saldo.' Bs';?></th>
    </tr>

    <tr>
        <th colspan="2" style="width:100% ; border-left-color: white; border-right-color: white; text-align:left ;" >FIRMA ADMINISTRADORA PONCELET</th>
    </tr>

    <tr>     
        <th style="text-align:right ;">Lic. MAVEL CONDORI FLORES</th>
        <th style="background-color: #FFFFFF ;font-size:15px; color:black" ></th>
    </tr>

    <tr>
        <th colspan="2" style="width:100% ; border-left-color: white; border-right-color: white; text-align:left ;" >FIRMA GERENTE GENERAL PONCELET</th>
    </tr>

    <tr>     
        <th style="text-align:right ;">ING. ALBERTO ARISPE PONCE</th>
        <th style="background-color: #FFFFFF ;font-size:15px; color:black" ></th>
    </tr>


    

    
</table>





                    
                    
                        

                

                <!--<div style="page-break-after:always;">
                            
                </div>-->
                    
                </body>

                </html>
                <?php 
                    $html = ob_get_clean();
                    $dompdf = new Dompdf();
                    $dompdf->loadHtml($html, 'UTF-8');
                    $dompdf->setPaper('A4','portrait');
                    //$dompdf->setPaper('letter','portrait');
                    //$dompdf->setPaper('A4', 'landscape');
                    $canvas = $dompdf->getCanvas(); 
 

                    $dompdf->render();

                    $dompdf->stream('Gastos CAJA-CHICA',array('attachment'=>0));
                                      
                ?>

