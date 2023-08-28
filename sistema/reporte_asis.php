<?php
header('Content-Type: text/html; charset=utf-8');
session_start();
include "../conexion.php";

$fecha_inicio = $_POST['fecha_inicio'];
$fecha_final = $_POST['fecha_final'];
$personal = $_POST['personal'];
echo $personal;




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

        body {
            font-family: 'DejaVu Sans', Arial, sans-serif;
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


<body>

    <header>
        <div id="watermark">
            <img src="img/FONDITO.png" height="100%" width="100%" />
        </div>
    </header>

    <footer>
        <div id="watermark">
            <img src="img/FONDITO3.png" height="100%" width="100%" />

        </div>
    </footer>

    <table style="width:97% ;">

        <?php
        $DateAndTime = date('d-m-Y ');
        echo "The current date and time are $DateAndTime.";

        ?>


        <tr style="text-align: right; background-color: #5c5c5c; color: white; border:solid white;">
            <td colspan="1" style="background-color:white;text-align: left; color:#5c5c5c; border:solid white "> <STRONG style="font-size:10px;"> Fecha de Reporte </STRONG></td>
            <td colspan="6" style="background-color:white;text-align: left; color:#5c5c5c; border:solid white ">
                <?php setlocale(LC_TIME, "spanish");
                echo '<p style="color: coral; font-size:10px;text-align:right;opacity: 0.5;"> @irsoft-SYS-PONCELET</p>';
                echo utf8_encode(strftime("%A, %d de %B de %Y"));

                ?>
            </td>
        </tr>

        <?php

        ?>



        <tr>
            <td style="font-size:10px; border-right-color: white; border-left-color: white; border-top-color:white;" colspan="7"> <STRONG> REPORTE DE ENTRADAS Y SALIDAS </STRONG></td>
        </tr>
        <tr style="background-color:#d7d7d7 ;">
            <th>#</th>
            <th>TRABAJADOR</th>
            <th>FECHA DE REGISTRO</th>
            <th>TURNO</th>
            <th>INGRESO</th>
            <th>SALIDA</th>

            <th>OBSERVACIONES</th>
        </tr>



        <?php



        // rescatar datos DB 
        //$query = mysqli_query($conexion, "SELECT * FROM gastos
        //ORDER BY id_gasto DESC;");

        $query = mysqli_query($conexion, "SELECT * FROM asis WHERE fecha_registro BETWEEN '{$fecha_inicio}' AND '{$fecha_final}' AND usuario_id = '$personal'
                                                                    order by fecha_registro ASC;");





        $result = mysqli_num_rows($query);
        $contador = 1;
        if ($result > 0) {
            while ($data = mysqli_fetch_array($query)) {
                // turno

                if ($data['turno'] == 'dia') {
                    $turno = '<span> Mañana  </span>' . '<br/>';
                } else {
                    $turno = '<span> Tarde  </span>' . '<br/>';
                }



                // SALIDA

                if ($data['salida'] == '0000-00-00 00:00:00') {
                    $salida = '<span> NO REGISTRO </span>' . '<br/>';
                } else {
                    $salidas =  strftime('%H:%M:%S', strtotime($data['salida']));
                    $salida = '<span style="color:red"> ' . $salidas . '</span>' . '<br/>';
                }
                //INGRESO
                $ingresos =  strftime('%H:%M:%S', strtotime($data['ingreso']));
                $ingreso = '<span style="color:green"> ' . $ingresos . '</span>' . '<br/>';

                //FECHA REGISTRO
                setlocale(LC_TIME, "spanish");
                $fecha =  strftime('%e de %B %Y', strtotime($data['fecha_registro']));

                // encargado

                if ($data['usuario_id'] == 'levam') {
                    $encargado1 = '<span> Mavel Condori Flores  </span>' . '<br/>';
                } else {
                    $encargado1 = '';
                }

                if ($data['usuario_id'] == 'admin') {
                    $encargado2 = '<span > Alejandro Iglesias Raldes </span>' . '<br/>';
                } else {
                    $encargado2 = '';
                }

                if ($data['usuario_id'] == 'Nicol10') {
                    $encargado3 = '<span> Mariana Nicol Erquicia Camacho  </span>' . '<br/>';
                } else {
                    $encargado3 = '';
                }


                if ($data['usuario_id'] == 'Jazmin Velasco') {
                    $encargado4 = '<span > Jazmin Velasco Diaz  </span>' . '<br/>';
                } else {
                    $encargado4 = '';
                }


                if ($data['usuario_id'] == 'edwin') {
                    $encargado5 = '<span> Edwin Pinto </span>' . '<br/>';
                } else {
                    $encargado5 = '';
                }






        ?>
                <tr>




                    <td><?php echo $contador; ?></td>
                    <td><?php echo $encargado1 . $encargado2 . $encargado3 . $encargado4 . $encargado5 ?></td>
                    <td><?php echo $fecha ?></td>
                    <td><?php echo $turno ?></td>
                    <td><?php echo $ingreso ?></td>
                    <td><?php echo $salida ?></td>
                    <td><?php echo $data['observacion'] ?></td>


                </tr>
        <?php
                $contador++;
            }
        }
        ?>

        <tr>
            <td colspan="7"><img style="height: 150px; width:200px; " src="img/ales.png"></td>
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
$dompdf->set_option('defaultCharset', 'utf-8');

//$dompdf->setPaper('A4','portrait');
//$dompdf->setPaper('letter','portrait');
$dompdf->setPaper('A4', 'landscape');
$canvas = $dompdf->getCanvas();


$dompdf->render();

$dompdf->stream('REPORTE-ASISTENCIA', array('attachment' => 0));

?>