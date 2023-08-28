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
                            <td colspan="3" style="background-color:white;text-align: left; color:#5c5c5c; border:solid white ">
                                <?php setlocale(LC_TIME, "spanish");
                                echo '<p style="color: coral; font-size:10px;text-align:right;opacity: 0.5;"> @irsoft-SYS-PONCELET</p>';
                                echo strftime("%A, %d de %B de %Y ");?>
                            </td>
                        </tr>                    
                        
                        
                     
                    
                    <tr>
                        <td style="font-size:10px; border-right-color: white; border-left-color: white; border-top-color:white;"  colspan="4" > <STRONG>  REPORTE DE INVENTARIO EN ALMACEN PONCELET  </STRONG></td> 
                    </tr>
                    <tr style="background-color:#d7d7d7 ;">
                                        <th>CODIGO UNICO</th>
                                        <th>Nombre de articulo </th>
                                        
                                        <th>Stock (Existencia)</th>
                                        <th>Fecha de Entrada</th>
                    </tr>

                                    
                    
                    <?php
                    
                                    // rescatar datos DB 
                                    //$query = mysqli_query($conexion, "SELECT * FROM gastos
                                    //ORDER BY id_gasto DESC;");

                                    $query = mysqli_query($conexion, "SELECT inventario.id_inv, 
                                    inventario.articulo,
                                    inventario.stock,
                                    inventario.categoria_id,
                                    inventario.foto,
                                    inventario.fecha_add,
                                    categoria_i.nombre_categoria
                            FROM inventario
                            JOIN categoria_i ON inventario.categoria_id = categoria_i.id_categoria order by inventario.fecha_add ASC;");



                                    $result = mysqli_num_rows($query);
                                    if ($result > 0) {
                                    while ($data = mysqli_fetch_array($query)) {
                                        
                                                                                
                                            
                                            

                                            

                                    ?>
                            <tr>
                                <td><?php echo 'COD-'.$data['id_inv'] ?></td>
                                <td><?php echo $data['articulo'] ?></td>
                                
                                <td><?php echo $data['stock'] ?></td>
                                <td><?php 
                                        setlocale(LC_TIME, "spanish");
                                        //echo $data['fecha_ejecucion']

                                        echo strftime('%e / %B / %Y', strtotime($data['fecha_add']));
                                ?></td>

                                
                               
                                
                                
                                
                                
                                
                                

                                
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
                    $dompdf->loadHtml($html);
                    $dompdf->setPaper('A4','portrait');
                    //$dompdf->setPaper('letter','portrait');
                    //$dompdf->setPaper('A4', 'landscape');
                    $canvas = $dompdf->getCanvas(); 
 

                    $dompdf->render();

                    $dompdf->stream('Inventario',array('attachment'=>0));
                                      
                ?>

