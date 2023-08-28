<?php

session_start();
include "../../conexion.php";

$fecha_inicio = $_POST['fecha_inicio'];
$fecha_final = $_POST['fecha_final'];
$personal = $_POST['personal'];




                   

require_once '../pdf/vendor/autoload.php';
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

<table style="width:97% ; border-collapse: collapse; text-align:center" border="1px" >

<?php
$DateAndTime = date('d-m-Y ');  


?>       


                                    

                        <tr style="text-align: right; background-color: #5c5c5c; color: white; border:solid white;">
                            <td colspan="3" style="background-color:white;text-align: left; color:#5c5c5c; border:solid white "> <STRONG style="font-size:13px;"> INFORME DE PROYECTOS Y COTIZACIONES </STRONG></td>
                            <td colspan="8" style="background-color:white;text-align: right; color:#5c5c5c; border:solid white ; font-size:12px"> 
                                <?php setlocale(LC_TIME, "spanish");
                                
                                echo 'Fecha de Reporte: '.strftime("%A, %d de %B de %Y ");?>
                            </td>
                            
                        </tr>                    
                        
                        <tr>
                            <td colspan="11" style="background-color:white;text-align: right; color:#5c5c5c; border:solid white ">
                            <?php setlocale(LC_TIME, "spanish");
                                echo '<p style="color: coral; font-size:10px;text-align:right;opacity: 0.5;"> @irsoft-SYS-PONCELET</p>';
                                ?>
                            </td>
                        </tr>
                        
                     
                    
                    <tr>
                        <td style="font-size:15px; border-right-color: white; border-left-color: white; border-top-color:white; text-align:left"  colspan="5" > 
                        <STRONG>  INFORME DE : 
                            <?php
                                
                            
                                if ($personal == 'jazmin') {
                                    $p = 'Jazmin Velasco Diaz';
                                } else if ($personal == 'mavel') {
                                    $p = 'Mavel Condori Flores';
                                } else if ($personal == 'nicol') {
                                    $p = 'Mariana Nicol Erquicia Camacho';
                                }  else if ($personal == 'ale') {
                                    $p = 'Alejandro Iglesias Raldes ';
                                }  else if ($personal == 'edwin') {
                                    $p = 'Edwin Pinto Ramirez';
                                }
                                 

                                echo $p; 
                            ?> 
                        </STRONG></td> 
                    </tr>
                    <tr style="background-color:#d7d7d7 ;font-size:10px;">
                                        <th>ID Proyecto</th>
                                        <th widht="15%">Nombre</th>
                                        <th>Tipo</th>
                                        <th>Ubicacion</th>
                                        <th>Identificaciones</th>
                                        
                                        <th>Monto Referencial</th>
                                        <th>Monto Ofertado</th>
                                        <th>Posicion</th>
                                        <th>Fecha</th>
                                        <th>Estado</th>
                                        <th widht="15%">Participación</th>
                    </tr>

                                    
                    
                    <?php







                                    
                    
                                    // rescatar datos DB 
                                    //$query = mysqli_query($conexion, "SELECT * FROM gastos
                                    //ORDER BY id_gasto DESC;");

                                    $query = mysqli_query($conexion, "SELECT * FROM proyectos_comer 
                                                                      WHERE DATE(fecha) BETWEEN '{$fecha_inicio}' AND '{$fecha_final}' AND $personal IS NOT NULL AND $personal != ''");
                                                                    

                                                                  
                                

                                    $result = mysqli_num_rows($query);
                                    if ($result > 0) {
                                        while ($data = mysqli_fetch_array($query)) {
                                            
                                            if ($data['num_tramite'] == '') {
                                                $tramite =  '';
                                            }else {
                                                $tramite =  '<strong > N° de Tramite </strong>'.'<br/>'.$data["num_tramite"].'<br/>';
                                            }
                                            
                                            if ($data['num_comprobante'] == '') {
                                                $comprobante =  '';
                                            }else {
                                                $comprobante =  '<strong > N° de Comprobante </strong>'.'<br/>'.$data["num_comprobante"].'<br/>';
                                            }
                                            
                                            if ($data['cuce'] == '') {
                                                $cuce =  '';
                                            }else {
                                                $cuce =  '<strong> CUCE </strong>'.'<br/>'.$data["cuce"].'<br/>';
                                            }              
                                            
                                            setlocale(LC_TIME, "spanish");
                                            $fecha =  strftime('%e de %B %Y', strtotime($data['fecha']));
                                     
                            
                                            

                                            

                                    ?>
                            <tr style="font-size:10px;">



                                <td><?php echo $data['id_pro'] ?></td>

                                <td><?php echo $data['nombre'] ?></td>
                                
                                <td><?php echo $data['tipo'] ?></td>
                                <td><?php echo $data['ubicacion'] ?></td>

                                <td><?php echo $tramite.$comprobante.$cuce ?></td>
                                
                                <td><?php echo $data['monto'].' Bs' ?></td>
                                <td><?php echo $data['monto_ofertado'].' Bs' ?></td>
                                <td><?php echo $data['posicion'] ?></td>
                                <td><?php echo $fecha; ?></td>
                                <td>
                                    <?php
                                        
                                        if ($data['estado'] == 'pagado') {
                                            echo $estado =  '<span style="color:#0DC143">PAGADO</span>';
                                        }elseif ($data['estado'] == 'no') {
                                            echo $estado =  '<span style="color:red">NO ADJUDICADO</span>';
                                        }elseif ($data['estado'] == 'adjudicado') {
                                            echo $estado =  '<span style="color:green"> ADJUDICADO</span>';
                                        }else if ($data['estado'] == 'proceso') {
                                            echo $estado =  '<span style="color:#B26234"> EN PROCESO</span>';
                                        }else {
                                            echo $estado =  '';
                                        }

                                        
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                        if ($data[$personal] == '') {
                                            $p =  '';
                                        }else {
                                            $p =  '<span style="font-size:12px;background-color:#fff5ca;text-align: left;" class="btn btn-info btn-sm w-100"></span>'.'<br/>'.$data[$personal].'<br/>';
                                            echo $p;
                                        }
                                
                                    ?>
                                    </td>
                                
                                
                                
                        
                               
                                
                                
                                
                                
                                
                                

                                
                            </tr>
                    <?php

                        }
                    }
                    ?>

                    

                    
                    
                    

                    
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
                    //$dompdf->setPaper('A4','portrait');
                    //$dompdf->setPaper('letter','portrait');
                    $dompdf->setPaper('A4', 'landscape');
                    $canvas = $dompdf->getCanvas(); 
 

                    $dompdf->render();

                    $dompdf->stream('INFORME '.$personal,array('attachment'=>0));
                                      
                ?>

