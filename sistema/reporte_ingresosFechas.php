<?php

session_start();
include "../conexion.php";

$fecha_inicio = $_POST['fecha_inicio'];
$fecha_final = $_POST['fecha_final'];



                            $sql_suma_bs = mysqli_query($conexion, "SELECT
                                                                        SUM(g_montoBs)
                                                                    FROM
                                                                        gastos
                                                                    WHERE
                                                                        DATE(g_fecha_i) BETWEEN '{$fecha_inicio}' AND '{$fecha_final}';");
                            $result_sum = mysqli_fetch_array($sql_suma_bs);
                            $total = $result_sum['SUM(g_montoBs)']; 

                            $sql_suma_bs2 = mysqli_query($conexion, "SELECT
                                                                        SUM(montoBs)
                                                                    FROM
                                                                        ingresos
                                                                    WHERE
                                                                        DATE(fecha_i) BETWEEN '{$fecha_inicio}' AND '{$fecha_final}';");
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
                            <td colspan="2" style="font-size:10px; border-right-color: white; border-left-color: white; border-top-color:white;"> <STRONG style="font-size:13px;"> REPORTE DE INGRESOS CAJA CHICA   </STRONG></td>
                        </tr>
    <tr>
        <th colspan="2" style="width:100% ; border-left-color: white; border-right-color: white; text-align:left ;" >Informe : Lic. Mavel Condori FLores</th>
    </tr>


    <tr >
        
        <th style="text-align:right ;">DESDE: </th>
        <th style="background-color: white ;" >
        <?php 
                                    setlocale(LC_TIME, "spanish");
                                    echo strftime('%e de %B %Y', strtotime($fecha_inicio));
                                    ?></th>
    </tr>
    <tr>
        
        <th style="text-align:right ;">HASTA: </th>
        <th style="background-color:white ;" >
        <?php 
                                    setlocale(LC_TIME, "spanish");
                                    echo strftime('%e de %B %Y', strtotime($fecha_final));
                                    ?></th>
    </tr>
    <tr>
        
        <th style="text-align:right ;">INGRESOS TOTAL</th>
        <th style="background-color: green ;font-size:15px; color:white" ><?php echo $total2.' Bs';?></th>
    </tr>
    

    
</table>

<br><br><br><hr>













<table style="width:97% ;">

<?php
$DateAndTime = date('d-m-Y ');  
echo "The current date and time are $DateAndTime.";

?>                          
                                    
                              
                                
                    
                    
                    
                                           
                        <tr>
                            <td colspan="4" style="font-size:10px; border-right-color: white; border-left-color: white; border-top-color:white;"> <STRONG style="font-size:13px;"> DETALLE GASTOS CAJA CHICA   </STRONG></td>
                        </tr>
                        
                     
                    
                    
                    <tr style="background-color:#d7d7d7 ;">
                                        <th>N°</th>
                                        
                                        <th>Detalle</th>
                                       
                                        <th>Fecha de iNGRESO</th> 
                                        <th>Monto(Bs)</th>
                    </tr>

                                    
                    
                    <?php
                    
                                    // rescatar datos DB 
                                    //$query = mysqli_query($conexion, "SELECT * FROM gastos
                                    //ORDER BY id_gasto DESC;");



                                    //$query = mysqli_query($conexion, "SELECT * FROM gastos WHERE
                                    //DATE(g_fecha_i) BETWEEN '{$fecha_inicio}' AND '{$fecha_final}';");

                                    $query = mysqli_query($conexion, "SELECT
                                    ROW_NUMBER() 
                                    OVER(ORDER BY fecha_i ) 
                                    row_num,
                                    id_ingreso,
                                    persona, 
                                    montoBs,
                                    montoU,
                                    fecha_i,
                                    respaldo
                                    FROM ingresos WHERE DATE(fecha_i) BETWEEN '{$fecha_inicio}' AND '{$fecha_final}' 
                                    ORDER BY fecha_i ;");

                                    $result = mysqli_num_rows($query);
                                    if ($result > 0) {
                                        while ($data = mysqli_fetch_array($query)) {
                                            
                                    ?>
                            <tr>
                                <td><?php echo $data['row_num'] ?></td>
                                <td style="text-transform: uppercase;"><?php echo $data['persona'] ?></td>
                                
                                
                                <td>
                                    <?php 
                                    setlocale(LC_TIME, "spanish");
                                    echo strftime('%e de %B %Y', strtotime($data['fecha_i']));
                                    ?>
                                </td>

                               
                                <td class=" bg-success bg-opacity-10"><?php echo number_format($data['montoBs'],2,'.',',').' Bs' ?></td>
                               
                                
                                
                                
                                
                                
                                

                                
                            </tr>
                    <?php

                        }
                    }
                    ?>

                    <tr class="">
                        <td colspan="3" style="text-align: right; background-color: rgb(249 134 2 / 20%); color: #5c5c5c;"> TOTAL INGRESOS</td>
                        <td colspan="1" style="background-color: orange color:white; font-size:20px;"> <?php echo number_format($total2,2,'.',',').' Bs'?></td>
                        
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
                    $dompdf->loadHtml($html, 'UTF-8');
                    $dompdf->setPaper('A4','portrait');
                    //$dompdf->setPaper('letter','portrait');
                    //$dompdf->setPaper('A4', 'landscape');
                    $canvas = $dompdf->getCanvas(); 
 

                    $dompdf->render();

                    $dompdf->stream('Gastos CAJA-CHICA',array('attachment'=>0));
                                      
                ?>

