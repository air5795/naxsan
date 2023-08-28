<?php

session_start();
include "../conexion.php";

$sql_suma_bs = mysqli_query($conexion, "SELECT SUM(g_montoBs) FROM gastos;");
                            $result_sum = mysqli_fetch_array($sql_suma_bs);
                            $total = $result_sum['SUM(g_montoBs)']; 

                            $sql_suma_bs2 = mysqli_query($conexion, "SELECT SUM(montoBs) FROM ingresos;");
                            $result_sum2 = mysqli_fetch_array($sql_suma_bs2);
                            $total2 = $result_sum2['SUM(montoBs)'];

                            
                            
                            $saldo = $total2 - $total;

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

<?php
$DateAndTime = date('d-m-Y ');  
echo "The current date and time are $DateAndTime.";

?>                          
                                    
                              
                                
                    
                    
                    
                        <tr style="text-align: right; background-color: #5c5c5c; color: white; border:solid white;">
                            <td colspan="1" style="background-color:white;text-align: left; color:#5c5c5c; border:solid white "> <STRONG style="font-size:10px;"> Fecha de Reporte  </STRONG></td>
                            <td colspan="2" style="background-color:white;text-align: left; color:#5c5c5c; border:solid white ">
                                <?php setlocale(LC_TIME, "spanish");
                                echo '<p style="color: coral; font-size:10px;text-align:right;opacity: 0.5;"> @irsoft-SYS-PONCELET</p>';
                                echo strftime("%A, %d de %B de %Y ");?>
                            </td>
                        </tr>                    
                        <tr>
                            <td colspan="5" style="font-size:10px; border-right-color: white; border-left-color: white; border-top-color:white;"> <STRONG style="font-size:13px;"> PONCELET - COMERCIALIZADORA  </STRONG></td>
                        </tr>
                        
                     
                    
                    <tr>
                        <td style=" background-color: rgb(249 134 2 / 20%); color: #5c5c5c; font-size:20px;"  colspan="5" > <STRONG>  REPORTE DE GASTOS DE CAJA CHICA  : Administradora : Lic. Mavel Condori Flores  </STRONG></td> 
                    </tr>
                    <tr style="background-color:#d7d7d7 ;">
                                        <th>N°</th>
                                        <th>Persona</th>
                                        <th>Detalle</th>
                                       
                                        <th>Fecha de Gasto</th> 
                                        <th>Monto(Bs)</th>
                    </tr>

                                    
                    
                    <?php
                    
                                    // rescatar datos DB 
                                    //$query = mysqli_query($conexion, "SELECT * FROM gastos
                                    //ORDER BY id_gasto DESC;");

                                    $query = mysqli_query($conexion, "SELECT
ROW_NUMBER() 
OVER(ORDER BY g_fecha_i ) 
row_num,
id_gasto,
g_persona, 
g_montoBs,
g_montoU,
g_detalle,
g_fecha_i,
g_respaldo
FROM gastos
ORDER BY g_fecha_i ;");

                                

                                    $result = mysqli_num_rows($query);
                                    if ($result > 0) {
                                        while ($data = mysqli_fetch_array($query)) {
                                            
                                            
                                            

                                            

                                    ?>
                            <tr>
                                <td><?php echo $data['row_num'] ?></td>
                                <td><?php echo $data['g_persona'] ?></td>
                                <td><?php echo $data['g_detalle'] ?></td>
                                
                                <td>
                                    <?php 
                                    setlocale(LC_TIME, "spanish");
                                    echo strftime('%e de %B %Y', strtotime($data['g_fecha_i']));
                                    ?>
                                </td>

                               
                                <td class=" bg-success bg-opacity-10"><?php echo number_format($data['g_montoBs'],2,'.',',').' Bs' ?></td>
                               
                                
                                
                                
                                
                                
                                

                                
                            </tr>
                    <?php

                        }
                    }
                    ?>

                    <tr class="">
                        <td colspan="4" style="text-align: right; background-color: rgb(249 134 2 / 20%); color: #5c5c5c;">  TOTAL GASTOS</td>
                        <td colspan="1" style="background-color: orange color:white; font-size:20px;"> <?php echo number_format($total,2,'.',',').' Bs'?></td>
                        
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
                    $dompdf->setPaper('A4','portrait');
                    //$dompdf->setPaper('letter','portrait');
                    //$dompdf->setPaper('A4', 'landscape');
                    $canvas = $dompdf->getCanvas(); 
 

                    $dompdf->render();

                    $dompdf->stream('Gastos CAJA-CHICA',array('attachment'=>0));
                                      
                ?>

