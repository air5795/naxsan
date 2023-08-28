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

if (isset($_POST['uno'])) {
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

                <!----------------------------------------------------------------------------------------------------------------------->
                <!--REPORTE 1 potosi------------------------------------------------------------------------------------------------------------>
                <!----------------------------------------------------------------------------------------------------------------------->
            <table>
                
                        <tr>
                            <td colspan="10" class="exp5"> <STRONG style="font-size:12px;"> FORMULARIO </STRONG></td>
                        </tr>
                        <tr>
                            <td colspan="10" class="exp4"> <STRONG style="font-size:13px;"> EXPERIENCIA ESPECIFICA DE LA EMPRESA </STRONG></td>
                        </tr>
                        
                     
                    
                    <tr>
                        <td colspan="10" class="emp"> <STRONG>  EMPRESA CONSTRUCTORA PONCELET </STRONG></td> 
                    </tr>
                    <tr class="emp" >
                        <th>N°</th>
                        <th >Nombre del contratante / Persona y Direccion de contacto</th>
                        <th >Objeto del Contrato (Obra similar)</th>
                        <th>Ubicacion de la obra</th>
                        <th>Monto final del contrato en Bs</th>
                        <th>Periodo de ejecucion (Fecha de inicio y finalizacion)</th>
                        <th>Monto en $u$ (Llenado de uso alternativo)</th>
                        <th>% de Participacion en Asociacion(*)</th>
                        <th>Nombre del Socio(s) (**)</th>
                        <th>Profesional Responsable(***)</th> 
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
                                                                                                        fecha_final,
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
                                                                                                        ubicacion
                                                                                                        FROM
                                                                                                            exp_general_c
                                                                                                        WHERE
                                                                                                            $sql
                                                                                                        ORDER BY
                                                                                                            fecha_ejecucion;");



                    

                    $result = mysqli_num_rows($query);

                    // crear directorio o carpeta Exp especifica
                    //$nombre_directorio = "Exp_especifica";
                    //$resultado = mkdir("../sistema/img/"."/$nombre_directorio");
                    
                    
                    

                    

                    $files = glob('../sistema/img/Exp_especifica_c/*'); //obtenemos todos los nombres de los ficheros
                    foreach($files as $file){
                        if(is_file($file))
                        unlink($file); //elimino el fichero
                    }

                    
                    
                    

                    

                    if ($result > 0) {
                        while ($data = mysqli_fetch_array($query)) {
                            if ($data['image'] != 'nodisponible.png' ) {
                                $ru = $data['image'];
                                $image = 'img/actas_c/'.$data['image'];
                                

                            }else {
                                $image = 'img/'.$data['image'];
                            }
                            
                            $image2 = 'img/actas_c/'.$data['image2'];
                            $ru2 = $data['image2'];
                            $image3= 'img/actas_c/'.$data['image3'];
                            $ru3 = $data['image3'];
                            
                            

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
                            </tr>
                    <?php

                    

                    // copiar actas especificas

                    

                    
                    
                    if ($ru !=0 )  {
                        $origen = "../sistema"."/$image";
                        $destino = "../sistema/img/Exp_especifica_c"."/$ru";
                        $resultado = copy($origen, $destino);
                        echo $destino;
                    }
                    if ($ru2 !=0) {
                        $origen2 = "../sistema/".$image2;
                        $destino2 = "../sistema/img/Exp_especifica_c"."/$ru2";
                        $resultado2 = copy($origen2, $destino2);
                    }
                    if ($ru3 !=0) {
                        $origen3 = "../sistema"."/$image3";
                        $destino3 = "../sistema/img/Exp_especifica_c"."/$ru3";
                        $resultado3 = copy($origen3, $destino3);
                        
                    }


                        }
                    }

                    //shell_exec('start C:/xampp/htdocs/poncelet-sis/sistema/img/Exp_especifica');
                    //shell_exec('start .');

                    $sql_suma_bs = mysqli_query($conexion, "SELECT SUM(monto_bs) FROM exp_general_c where $sql ;");
                            $result_sum = mysqli_fetch_array($sql_suma_bs);
                            $total = $result_sum['SUM(monto_bs)']; 
                    ?>
                    <tr class="exp">
                        <td colspan="5" style="text-align: right;"> <strong> TOTAL FACTURADO EN DÓLARES AMERICANOS </strong> <br> (Llenado de uso alternativo)</td>
                        <td colspan="5" style="background-color: white;"> <?php echo number_format($total_us,2,'.',',').'$'?></td>
                        
                    </tr>
                    <tr class="exp">
                        <td colspan="5" style="text-align: right;"> <strong> TOTAL FACTURADO EN BOLIVIANOS (****)</strong></td>
                        
                        <td colspan="5" style="background-color: white;"><?php echo number_format($total,2,'.',',').' Bs'?></td>
                    </tr>
                    <tr class="exp">
                        
                        
                        <td colspan="10" style="background-color: white ; text-align: left;" > <p>

                        *       Monto a la fecha de Recepcion Final de la Obra <br>
                        ** 	    Cuando la empresa cuente con experiencia asociada, solo se debe consignar el monto correspondiente a su participación. <br>
                        *** 	Si el contrato lo ejecutó asociado, indicar en esta casilla el nombre del o los socios. <br>
                        ****	Indicar el nombre del Profesional Responsable, que desempeñó el cargo de Superintendente/ Residente o Director de Obras o su equivalente. Se puede nombrar a más de un profesional, si así correspondiese. <br>
                        *****	El monto en bolivianos no necesariamente debe coincidir con el monto en Dólares Americanos. <br>
                        
                        
                        </td>

                        <tr>
                        <td colspan="10" style="background-color: white ; text-align: left;">
                         <strong> NOTA.- </strong> Toda la información contenida en este formulario es una declaración jurada. En caso de adjudicación el proponente se compromete a presentar el certificado, Acta de Recepción Definitiva u otro documento que acredite su experiencia en cada una de las obras detalladas, en original o fotocopia legalizada emitida por el contratante. <br>
                        </td>    
                        </tr>
                        
                        
                    </tr>

                    <tr>
                         <td colspan="10"  ><img style="height: 150px; width:150px; "  src="img/selloc.jpg" ></td>
                    </tr>


                </table>

                

                <!--<div style="page-break-after:always;">
                            
                </div>-->
                    
                </body>

                </html>






































































                <?php
                }
                if (isset($_POST['dos'])) { 
                ?>

                <!----------------------------------------------------------------------------------------------------------------------->
                <!--REPORTE 2------------------------------------------------------------------------------------------------------------>
                <!----------------------------------------------------------------------------------------------------------------------->
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
                        <td colspan="9" class="exp5"> <STRONG style="font-size:12px;"> FORMULARIO 5 </STRONG></td>
                        </tr>
                        <tr>
                            <td colspan="9" class="exp4"> <STRONG style="font-size:13px;"> EXPERIENCIA ESPECIFICA DE LA EMPRESA </STRONG></td>
                        </tr>
                    
                    <tr>
                        <td colspan="9" style="background-color: #deeaf6 ;">EMPRESA CONSTRUCTORA PONCELET</td>
                    </tr>
                    <tr style="background-color: #deeaf6 ;">
                        <th>N°</th>
                        <th>Nombre del contratante / Persona y Direccion de contacto</th>
                        <th>Objeto del Contrato</th>
                        <th>Ubicacion</th>
                        <th>Periodo de ejecucion (Fecha de inicio y finalizacion)</th>
                        <th>% de Participacion en Asociacion</th>
                        <th>Nombre LI del Socio(s)</th>
                        <th>Profesional Responsable</th>
                        <th>Monto final del contrato en (Bs)</th>
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
                                                                                                fecha_final,
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
                                                                                                ubicacion
                                                                                                FROM
                                                                                                    exp_general_c
                                                                                                WHERE
                                                                                                    $sql
                                                                                                ORDER BY
                                                                                                    fecha_ejecucion;");



            

            $result = mysqli_num_rows($query);

            // crear directorio o carpeta Exp especifica
            //$nombre_directorio = "Exp_especifica";
            //$resultado = mkdir("../sistema/img/"."/$nombre_directorio");
            
            
            

            

            $files = glob('../sistema/img/Exp_especifica_c/*'); //obtenemos todos los nombres de los ficheros
            foreach($files as $file){
                if(is_file($file))
                unlink($file); //elimino el fichero
            }

            
            
            

            

            if ($result > 0) {
                while ($data = mysqli_fetch_array($query)) {
                    if ($data['image'] != 'nodisponible.png' ) {
                        $ru = $data['image'];
                        $image = 'img/actas_c/'.$data['image'];
                        

                    }else {
                        $image = 'img/'.$data['image'];
                    }
                    
                    $image2 = 'img/actas_c/'.$data['image2'];
                    $ru2 = $data['image2'];
                    $image3= 'img/actas_c/'.$data['image3'];
                    $ru3 = $data['image3'];
                    
                    

            ?>
                    <tr>
                                <td><?php echo $data['row_num']?></td>
                                <td><?php echo $data['nombre_contratante'] ?></td>
                                <td><?php echo $data['obj_contrato'] ?></td>
                                <td><?php echo $data['ubicacion'] ?></td>
                               
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
                               
                                <td><?php echo $data['participa_aso'] ?></td>
                                <td><?php echo $data['n_socio'] ?></td>
                                <td><?php echo $data['profesional_resp'] ?></td>
                                <td><?php echo number_format($data['monto_bs'],2,'.',',').' Bs' ?></td>
                            </tr>
            <?php

            

            // copiar actas especificas

            

            
            
            if ($ru !=0 )  {
                $origen = "../sistema"."/$image";
                $destino = "../sistema/img/Exp_especifica_c"."/$ru";
                $resultado = copy($origen, $destino);
                echo $destino;
            }
            if ($ru2 !=0) {
                $origen2 = "../sistema/".$image2;
                $destino2 = "../sistema/img/Exp_especifica_c"."/$ru2";
                $resultado2 = copy($origen2, $destino2);
            }
            if ($ru3 !=0) {
                $origen3 = "../sistema"."/$image3";
                $destino3 = "../sistema/img/Exp_especifica_c"."/$ru3";
                $resultado3 = copy($origen3, $destino3);
                
            }


                }
            }

            //shell_exec('start C:/xampp/htdocs/poncelet-sis/sistema/img/Exp_especifica');
            //shell_exec('start .');

            $sql_suma_bs = mysqli_query($conexion, "SELECT SUM(monto_bs) FROM exp_general_c where $sql ;");
                    $result_sum = mysqli_fetch_array($sql_suma_bs);
                    $total = $result_sum['SUM(monto_bs)']; 
            ?>
             <tr class="exp">
                        <td colspan="7" style="text-align: right; background-color: #deeaf6 ;">  TOTAL FACTURADO EN DÓLARES AMERICANOS (Llenado de uso alternativo)</td>
                        <td colspan="2" style="background-color: white;"> <?php echo number_format($total_us,2,'.',',').'$'?></td>
                        
                    </tr>
                    <tr class="exp">
                        <td colspan="7" style="text-align: right; background-color: #deeaf6 ;">TOTAL FACTURADO EN BOLIVIANOS (****)</td>
                        <td colspan="2" style="background-color: white;"><?php echo number_format($total,2,'.',',').' Bs'?></td>
                    </tr>

                    <tr class="exp">
                        
                        <td colspan="1" style="background-color: white ; text-align: left;" > <center> * </center></td>
                        <td colspan="8" style="background-color: white ; text-align: left;" > Cuando la empresa cuente con experiencia asociada, solo se debe consignar el monto correspondiente a su participación. </td>
                    </tr>
                    <tr class="exp">
                        
                        <td colspan="1" style="background-color: white ; text-align: left;" > <center> ** </center></td>
                        <td colspan="8" style="background-color: white ; text-align: left;" > Si el contrato lo ejecutó asociado, indicar en esta casilla el nombre del o los socios. </td>
                    </tr>
                    <tr class="exp">
                        
                        <td colspan="1" style="background-color: white ; text-align: left;" > <center> *** </center> </td>
                        <td colspan="8" style="background-color: white ; text-align: left;" > Indicar el nombre del Profesional Responsable, que desempeñó el cargo de Superintendente/ Residente o Director de Obras o su equivalente. Se puede nombrar a más de un profesional, si así correspondiese. </td>
                    </tr>
                    <tr class="exp">
                        
                        
                        <td colspan="9" style="background-color: white ; text-align: left;" > <strong> NOTA.- </strong> Toda la información contenida en este formulario es una declaración jurada. En caso de adjudicación el proponente se compromete a presentar el certificado, Acta de Recepción Definitiva u otro documento que acredite su experiencia en cada una de las obras detalladas, en original o fotocopia legalizada emitida por el contratante. </td>
                    </tr>
                    <!--<tr>
                         <td colspan="10" class="exp2"><img class="im" src="img/sello.jpg" ></td>
                    </tr>-->

                    <tr>
                         <td colspan="9"  ><img style="height: 150px; width:150px; "  src="img/selloc.jpg" ></td>
                    </tr>


                </table>


                
                    
                </body>

                </html>


                





                <?php
                }
                
                ?>

                <?php
                
                if (isset($_POST['tres'])) { 
                ?>

                <!----------------------------------------------------------------------------------------------------------------------->
                <!--REPORTE 3------------------------------------------------------------------------------------------------------------>
                <!----------------------------------------------------------------------------------------------------------------------->
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
                            <td colspan="10" class="exp5"> <STRONG style="font-size:12px;"> FORMULARIO A-4 </STRONG></td>
                        </tr>
                        <tr>
                            <td colspan="10" class="exp4"> <STRONG style="font-size:13px;"> EXPERIENCIA ESPECIFICA DE LA EMPRESA </STRONG></td>
                        </tr>
                        
                     
                    
                    <tr>
                        <td colspan="10" class="emp" style="background-color: #213b5a; color:white"> <STRONG>  EMPRESA CONSTRUCTORA PONCELET </STRONG></td> 
                    </tr>
                    <tr  style="background-color: #213b5a; color:white">
                        <th>N°</th>
                        <th >Nombre del contratante / Persona y Direccion de contacto</th>
                        <th >Objeto del Contrato</th>
                        <th>Ubicacion</th>
                        <th>Monto final del contrato en (Bs) (*)</th>
                        <th>Periodo de ejecucion (Fecha de inicio y finalizacion)</th>
                        <th>Monto en $u$ (Llenado de uso alternativo)</th>
                        <th>% de Participacion en Asociacion(**)</th>
                        <th>Nombre del Socio(s)(***)</th>
                        <th>Profesional Responsable(****)</th> 
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
                                                                                                fecha_final,
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
                                                                                                ubicacion
                                                                                                FROM
                                                                                                    exp_general_c
                                                                                                WHERE
                                                                                                    $sql
                                                                                                ORDER BY
                                                                                                    fecha_ejecucion;");



            

            $result = mysqli_num_rows($query);

            // crear directorio o carpeta Exp especifica
            //$nombre_directorio = "Exp_especifica";
            //$resultado = mkdir("../sistema/img/"."/$nombre_directorio");
            
            
            

            

            $files = glob('../sistema/img/Exp_especifica_c/*'); //obtenemos todos los nombres de los ficheros
            foreach($files as $file){
                if(is_file($file))
                unlink($file); //elimino el fichero
            }

            
            
            

            

            if ($result > 0) {
                while ($data = mysqli_fetch_array($query)) {
                    if ($data['image'] != 'nodisponible.png' ) {
                        $ru = $data['image'];
                        $image = 'img/actas_c/'.$data['image'];
                        

                    }else {
                        $image = 'img/'.$data['image'];
                    }
                    
                    $image2 = 'img/actas_c/'.$data['image2'];
                    $ru2 = $data['image2'];
                    $image3= 'img/actas_c/'.$data['image3'];
                    $ru3 = $data['image3'];
                    
                    

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
                            </tr>
            <?php

            

            // copiar actas especificas

            

            
            
            if ($ru !=0 )  {
                $origen = "../sistema"."/$image";
                $destino = "../sistema/img/Exp_especifica_c"."/$ru";
                $resultado = copy($origen, $destino);
                echo $destino;
            }
            if ($ru2 !=0) {
                $origen2 = "../sistema/".$image2;
                $destino2 = "../sistema/img/Exp_especifica_c"."/$ru2";
                $resultado2 = copy($origen2, $destino2);
            }
            if ($ru3 !=0) {
                $origen3 = "../sistema"."/$image3";
                $destino3 = "../sistema/img/Exp_especifica_c"."/$ru3";
                $resultado3 = copy($origen3, $destino3);
                
            }


                }
            }

            //shell_exec('start C:/xampp/htdocs/poncelet-sis/sistema/img/Exp_especifica');
            //shell_exec('start .');

            $sql_suma_bs = mysqli_query($conexion, "SELECT SUM(monto_bs) FROM exp_general_c where $sql ;");
                    $result_sum = mysqli_fetch_array($sql_suma_bs);
                    $total = $result_sum['SUM(monto_bs)']; 
            ?>
             <tr class="exp">
                        <td colspan="8" style="text-align: right; background-color: #213b5a; color:white">  TOTAL FACTURADO EN DÓLARES AMERICANOS (Llenado de uso alternativo)</td>
                        <td colspan="2" style="background-color: white;"> <?php echo number_format($total_us,2,'.',',').'$'?></td>
                        
                    </tr>
                    <tr class="exp">
                        <td colspan="8" style="text-align: right; background-color: #213b5a; color:white">TOTAL FACTURADO EN BOLIVIANOS (*****)</td>
                        
                        <td colspan="2" style="background-color: white;"><?php echo number_format($total,2,'.',',').' Bs'?></td>
                    </tr>
                    <tr class="exp">
                        
                        <td colspan="10" style="background-color: white ; text-align: left;" >

                        * Monto a la fecha de Recepcion Final de la Obra. <br>
                        **	Cuando la empresa cuente con experiencia asociada, solo se debe consignar el monto correspondiente a su participación. <br>
                        ***	Si el contrato lo ejecutó asociado, indicar en esta casilla el nombre del o los socios. <br>
                        ****	Indicar el nombre del Profesional Responsable, que desempeñó el cargo de Superintendente/ Residente o Director de Obras o su equivalente. Se puede nombrar a más de un profesional, si así correspondiese. <br>
                        *****	El monto en bolivianos no necesariamente debe coincidir con el monto en Dólares Americanos. <br>
                        NOTA.- Toda la información contenida en este formulario es una declaración jurada. En caso de adjudicación el proponente se compromete a presentar el certificado, Acta de Recepción Definitiva u otro documento que acredite su experiencia en cada una de las obras detalladas, en original o fotocopia legalizada emitida por el contratante. <br>
                
                        </td>
                        
                    </tr>

                    <tr>
                         <td colspan="10"  ><img style="height: 150px; width:150px; "  src="img/selloc.png" ></td>
                    </tr>
                    <!--<tr>
                         <td colspan="10" class="exp2"><img class="im" src="img/sello.jpg" ></td>
                    </tr>-->


                </table>


                
                    
                </body>

                </html>


                





                <?php
                }
                
                ?>




<?php
                
                if (isset($_POST['cuatro'])) { 
                ?>

                <!----------------------------------------------------------------------------------------------------------------------->
                <!--REPORTE 4------------------------------------------------------------------------------------------------------------>
                <!----------------------------------------------------------------------------------------------------------------------->
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
                            <td colspan="10" class="exp5"> <STRONG style="font-size:12px;"> FORMULARIO A-4 </STRONG></td>
                        </tr>
                        <tr>
                            <td colspan="10" class="exp4"> <STRONG style="font-size:13px;"> EXPERIENCIA ESPECIFICA DE LA EMPRESA </STRONG></td>
                        </tr>
                        
                     
                    
                    <tr>
                        <td colspan="10" class="emp" style="background-color: #DBE5F1;"> <STRONG>  EMPRESA CONSTRUCTORA PONCELET </STRONG></td> 
                    </tr>
                    <tr  style="background-color: #DBE5F1; ">
                        <td>N°</td>
                        <td >Nombre del contratante / Persona y Direccion de contacto</td>
                        <td >Objeto del Contrato(Obra similar)</td>
                        <td>Ubicación</td>
                        <td>Periodo de ejecucion (Fecha de inicio y finalizacion)</td>
                        <td>% de Participacion en Asociacion(**)</td>
                        <td>Nombre del Socio(s)(***)</td>
                        <td>Profesional Responsable(****)</td>
                        <td>Monto en $u$ (Llenado de uso alternativo)</td>
                        <td>Monto final del contrato en Bs. (*)</td>
                         
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
                                                                                                fecha_final,
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
                                                                                                ubicacion
                                                                                                FROM
                                                                                                    exp_general_c
                                                                                                WHERE
                                                                                                    $sql
                                                                                                ORDER BY
                                                                                                    fecha_ejecucion;");



            

            $result = mysqli_num_rows($query);

            // crear directorio o carpeta Exp especifica
            //$nombre_directorio = "Exp_especifica";
            //$resultado = mkdir("../sistema/img/"."/$nombre_directorio");
            
            
            

            

            $files = glob('../sistema/img/Exp_especifica_c/*'); //obtenemos todos los nombres de los ficheros
            foreach($files as $file){
                if(is_file($file))
                unlink($file); //elimino el fichero
            }

            
            
            

            

            if ($result > 0) {
                while ($data = mysqli_fetch_array($query)) {
                    if ($data['image'] != 'nodisponible.png' ) {
                        $ru = $data['image'];
                        $image = 'img/actas_c/'.$data['image'];
                        

                    }else {
                        $image = 'img/'.$data['image'];
                    }
                    
                    $image2 = 'img/actas_c/'.$data['image2'];
                    $ru2 = $data['image2'];
                    $image3= 'img/actas_c/'.$data['image3'];
                    $ru3 = $data['image3'];
                    
                    

            ?>
                    <tr>
                                <td><?php echo $data['row_num']?></td>
                                <td><?php echo $data['nombre_contratante'] ?></td>
                                <td><?php echo $data['obj_contrato'] ?></td>
                                <td><?php echo $data['ubicacion'] ?></td>
                                
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
                                
                                <td><?php echo $data['participa_aso'] ?></td>
                                <td><?php echo $data['n_socio'] ?></td>
                                <td><?php echo $data['profesional_resp'] ?></td>
                                <td><?php echo number_format($data['monto_dolares'],2,'.',',').' $' ?></td>
                                <td><?php echo number_format($data['monto_bs'],2,'.',',').' Bs' ?></td>
                            </tr>
            <?php

            

            // copiar actas especificas

            

            
            
            if ($ru !=0 )  {
                $origen = "../sistema"."/$image";
                $destino = "../sistema/img/Exp_especifica_c"."/$ru";
                $resultado = copy($origen, $destino);
                echo $destino;
            }
            if ($ru2 !=0) {
                $origen2 = "../sistema/".$image2;
                $destino2 = "../sistema/img/Exp_especifica_c"."/$ru2";
                $resultado2 = copy($origen2, $destino2);
            }
            if ($ru3 !=0) {
                $origen3 = "../sistema"."/$image3";
                $destino3 = "../sistema/img/Exp_especifica_c"."/$ru3";
                $resultado3 = copy($origen3, $destino3);
                
            }


                }
            }

            //shell_exec('start C:/xampp/htdocs/poncelet-sis/sistema/img/Exp_especifica');
            //shell_exec('start .');

            $sql_suma_bs = mysqli_query($conexion, "SELECT SUM(monto_bs) FROM exp_general_c where $sql ;");
                    $result_sum = mysqli_fetch_array($sql_suma_bs);
                    $total = $result_sum['SUM(monto_bs)']; 
            ?>
             <tr class="exp">
                        <td colspan="8" style="text-align: right; background-color: #DBE5F1; ">  TOTAL FACTURADO EN DÓLARES AMERICANOS (Llenado de uso alternativo)</td>
                        <td style="background-color: white;"> <?php echo number_format($total_us,2,'.',',').'$'?></td>
                        <td style="background-color:white ;"></td>
                    </tr>
                    <tr class="exp">
                        <td colspan="8" style="text-align: right; background-color: #DBE5F1;">TOTAL FACTURADO EN BOLIVIANOS (*****)</td>
                        <td style="background-color:white ;"></td>
                        <td  style="background-color: white;"><?php echo number_format($total,2,'.',',').' Bs'?></td>
                    </tr>
                    <tr class="exp">
                        
                        <td colspan="10" style="background-color: white ; text-align: left;" >

                        *	    Monto a la fecha de Recepción Final de la Obra. <br>
                        **	    Cuando la empresa cuente con experiencia asociada, solo se debe consignar el monto correspondiente a su participación. <br>
                        ***	    Si el contrato lo ejecutó asociado, indicar en esta casilla el nombre del o los socios. <br>
                        ****	Indicar el nombre del Profesional Responsable, que desempeñó el cargo de Superintendente/ Residente o Director de Obras o su equivalente. Se puede nombrar a más de un profesional, si así correspondiese. <br>
                        *****	El monto en bolivianos no necesariamente debe coincidir con el monto en Dólares Americanos. <br>
                        <strong> NOTA.- </strong> Toda la información contenida en este formulario es una declaración jurada. En caso de adjudicación el proponente se compromete a presentar el certificado, Acta de Recepción Definitiva u otro documento que acredite su experiencia en cada una de las obras detalladas, en original o fotocopia legalizada emitida por el contratante.
                
                        </td>
                        
                    </tr>

                    <tr>
                         <td colspan="10"  ><img style="height: 150px; width:150px; "  src="img/selloc.png" ></td>
                    </tr>
                    <!--<tr>
                         <td colspan="10" class="exp2"><img class="im" src="img/sello.jpg" ></td>
                    </tr>-->


                </table>


                
                    
                </body>

                </html>


                





                <?php
                }
                
                ?>

























                <?php
                
                if (isset($_POST['cinco'])) { 
                ?>

                <!----------------------------------------------------------------------------------------------------------------------->
                <!--REPORTE 5------------------------------------------------------------------------------------------------------------>
                <!----------------------------------------------------------------------------------------------------------------------->
                <html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
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
                                                                                                fecha_final,
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
                                                                                                ubicacion
                                                                                                FROM
                                                                                                    exp_general_c
                                                                                                WHERE
                                                                                                    $sql
                                                                                                ORDER BY
                                                                                                    fecha_ejecucion;");



            

            $result = mysqli_num_rows($query);

            // crear directorio o carpeta Exp especifica
            //$nombre_directorio = "Exp_especifica";
            //$resultado = mkdir("../sistema/img/"."/$nombre_directorio");
            
            
            

            

            $files = glob('../sistema/img/Exp_especifica_c/*'); //obtenemos todos los nombres de los ficheros
            foreach($files as $file){
                if(is_file($file))
                unlink($file); //elimino el fichero
            }

            
            
            

            

            if ($result > 0) {
                while ($data = mysqli_fetch_array($query)) {
                    if ($data['image'] != 'nodisponible.png' ) {
                        $ru = $data['image'];
                        $image = 'img/actas_c/'.$data['image'];
                        

                    }else {
                        $image = 'img/'.$data['image'];
                    }
                    
                    $image2 = 'img/actas_c/'.$data['image2'];
                    $ru2 = $data['image2'];
                    $image3= 'img/actas_c/'.$data['image3'];
                    $ru3 = $data['image3'];
                    
                    

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

            

            // copiar actas especificas

            

            
            
            if ($ru !=0 )  {
                $origen = "../sistema"."/$image";
                $destino = "../sistema/img/Exp_especifica_c"."/$ru";
                $resultado = copy($origen, $destino);
                echo $destino;
            }
            if ($ru2 !=0) {
                $origen2 = "../sistema/".$image2;
                $destino2 = "../sistema/img/Exp_especifica_c"."/$ru2";
                $resultado2 = copy($origen2, $destino2);
            }
            if ($ru3 !=0) {
                $origen3 = "../sistema"."/$image3";
                $destino3 = "../sistema/img/Exp_especifica_c"."/$ru3";
                $resultado3 = copy($origen3, $destino3);
                
            }


                }
            }

            //shell_exec('start C:/xampp/htdocs/poncelet-sis/sistema/img/Exp_especifica');
            //shell_exec('start .');

            $sql_suma_bs = mysqli_query($conexion, "SELECT SUM(monto_bs) FROM exp_general_c where $sql ;");
                    $result_sum = mysqli_fetch_array($sql_suma_bs);
                    $total = $result_sum['SUM(monto_bs)']; 
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


                </table>


                
                    
                </body>

                </html>
                

                <?php
                }
                ?>




                <?php
                
                if (isset($_POST['seis'])) { 
                ?>

                <!----------------------------------------------------------------------------------------------------------------------->
                <!--REPORTE 6 puna------------------------------------------------------------------------------------------------------------>
                <!----------------------------------------------------------------------------------------------------------------------->
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
                    <td colspan="10" class="exp5"> <STRONG style="font-size:12px;font-family: verdana;"> FORMULARIO A-4 </STRONG></td>
                </tr>
                <tr>
                    <td colspan="10" class="exp4"> <STRONG style="font-size:12px;font-family: verdana;"> EXPERIENCIA ESPECIFICA DE LA EMPRESA </STRONG></td>
                </tr>
                
             
            
            <tr>
                <td colspan="10" class="emp"> <STRONG>  EMPRESA CONSTRUCTORA PONCELET </STRONG></td> 
            </tr>
            <tr class="emp" >
                <th>N°</th>
                <th >Nombre del contratante / Persona y Direccion de contacto</th>
                <th >Objeto del Contrato (Obra similar)</th>
                <th>Ubicacion de la obra</th>
                
                <th>Periodo de ejecucion (Fecha de inicio y finalizacion)</th>
                
                <th>% de Participacion en Asociacion(**)</th>
                <th>Nombre del Socio(s) (***)</th>
                <th>Profesional Responsable(****)</th> 
                <th>Monto en $u$ (Llenado de uso alternativo)</th>
                <th>Monto final del contrato en Bs (*)</th>
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
                                                                                                fecha_final,
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
                                                                                                ubicacion
                                                                                                FROM
                                                                                                    exp_general_c
                                                                                                WHERE
                                                                                                    $sql
                                                                                                ORDER BY
                                                                                                    fecha_ejecucion;");



            

            $result = mysqli_num_rows($query);

            // crear directorio o carpeta Exp especifica
            //$nombre_directorio = "Exp_especifica";
            //$resultado = mkdir("../sistema/img/"."/$nombre_directorio");
            
            
            

            

            $files = glob('../sistema/img/Exp_especifica_c/*'); //obtenemos todos los nombres de los ficheros
            foreach($files as $file){
                if(is_file($file))
                unlink($file); //elimino el fichero
            }

            
            
            

            

            if ($result > 0) {
                while ($data = mysqli_fetch_array($query)) {
                    if ($data['image'] != 'nodisponible.png' ) {
                        $ru = $data['image'];
                        $image = 'img/actas_c/'.$data['image'];
                        

                    }else {
                        $image = 'img/'.$data['image'];
                    }
                    
                    $image2 = 'img/actas_c/'.$data['image2'];
                    $ru2 = $data['image2'];
                    $image3= 'img/actas_c/'.$data['image3'];
                    $ru3 = $data['image3'];
                    
                    

            ?>
                    <tr>
                        <td><?php echo $data['row_num']?></td>
                        <td><?php echo $data['nombre_contratante'] ?></td>
                        <td><?php echo $data['obj_contrato'] ?></td>
                        <td><?php echo $data['ubicacion'] ?></td>
                        
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
                        
                        <td><?php echo $data['participa_aso'] ?></td>
                        <td><?php echo $data['n_socio'] ?></td>
                        <td><?php echo $data['profesional_resp'] ?></td>
                        <td><?php echo number_format($data['monto_dolares'],2,'.',',').' $' ?></td>
                        <td><?php echo number_format($data['monto_bs'],2,'.',',').' Bs' ?></td>
                    </tr>
            <?php

            

            // copiar actas especificas

            

            
            
            if ($ru !=0 )  {
                $origen = "../sistema"."/$image";
                $destino = "../sistema/img/Exp_especifica_c"."/$ru";
                $resultado = copy($origen, $destino);
                echo $destino;
            }
            if ($ru2 !=0) {
                $origen2 = "../sistema/".$image2;
                $destino2 = "../sistema/img/Exp_especifica_c"."/$ru2";
                $resultado2 = copy($origen2, $destino2);
            }
            if ($ru3 !=0) {
                $origen3 = "../sistema"."/$image3";
                $destino3 = "../sistema/img/Exp_especifica_c"."/$ru3";
                $resultado3 = copy($origen3, $destino3);
                
            }


                }
            }

            //shell_exec('start C:/xampp/htdocs/poncelet-sis/sistema/img/Exp_especifica');
            //shell_exec('start .');

            $sql_suma_bs = mysqli_query($conexion, "SELECT SUM(monto_bs) FROM exp_general_c where $sql ;");
                    $result_sum = mysqli_fetch_array($sql_suma_bs);
                    $total = $result_sum['SUM(monto_bs)']; 
            ?>
            <tr class="exp">
                        <td colspan="8" style="text-align: right;background-color: #DBE5F1;">  TOTAL FACTURADO EN DÓLARES AMERICANOS (Llenado de uso alternativo)</td>
                        <td colspan="1" style="background-color: white;"> <?php echo number_format($total_us,2,'.',',').' $'?></td>
                        <td colspan="1" style="background-color: white;"></td>
                    </tr>
                    <tr class="exp">
                        <td colspan="8" style="text-align: right;background-color: #DBE5F1;">TOTAL FACTURADO EN BOLIVIANOS (*****)</td>
                        <td colspan="1" style="background-color: white;" ></td>
                        <td colspan="1" style="background-color: white;"><?php echo number_format($total,2,'.',',').' Bs'?></td>
                    </tr>
                    <tr class="exp">
                        
                        <td colspan="10" style="background-color: white ; text-align: left;" >

                        *	Monto a la fecha de Recepción Final de la Obra. <br>
                        **	Cuando la empresa cuente con experiencia asociada, solo se debe consignar el monto correspondiente a su participación. <br>
                        ***	Si el contrato lo ejecutó asociado, indicar en esta casilla el nombre del o los socios. <br>
                        ****	Indicar el nombre del Profesional Responsable, que desempeñó el cargo de Superintendente/ Residente o Director de Obras o su equivalente. Se puede nombrar a más de un profesional, si así correspondiese. <br>
                        *****	El monto en bolivianos no necesariamente debe coincidir con el monto en Dólares Americanos. <br>
                        NOTA.- Toda la información contenida en este formulario es una declaración jurada. En caso de adjudicación el proponente se compromete a presentar el certificado, Acta de Recepción Definitiva u otro documento que acredite su experiencia en cada una de las obras detalladas, en original o fotocopia legalizada emitida por el contratante. <br>

                        </td>
                        
                    </tr>

                    <tr>
                         <td colspan="10"  ><img style="height: 150px; width:150px; "  src="img/selloc.png" ></td>
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
                
                }
                ?>






































                <?php
                
                if (isset($_POST['betanzos'])) { 
                ?>

                <!----------------------------------------------------------------------------------------------------------------------->
                <!--REPORTE betanzos------------------------------------------------------------------------------------------------------------>
                <!----------------------------------------------------------------------------------------------------------------------->
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
                            <td colspan="10" class="exp5"> <STRONG style="font-size:13px;">  FORMULARIO A-4  </STRONG></td>
                        </tr>
                        <tr>
                            <td colspan="10" class="exp4"> <STRONG style="font-size:14px;">  EXPERIENCIA ESPECÍFICA DE LA EMPRESA  </STRONG></td>
                        </tr>
                        
                     
                    
                    <tr>
                        <td colspan="10" class="emp" style="background-color: #DEEAF6;"> <STRONG> EMPRESA CONSTRUCTORA PONCELET </STRONG></td> 
                    </tr>
                    <tr  style="background-color: #DEEAF6; ">
                        <td>N°</td>
                        <td>Nombre del contratante / Persona y Direccion de contacto</td>
                        <td>Objeto del Contrato(Obras similar)</td>
                        <td>Ubicación </td>
                        <td>Monto final del contrato en Bs. (*)</td>
                        <td>Periodo de ejecucion (Fecha de inicio y finalizacion)</td>
                        <td>Monto en $u$ (Llenado de uso alternativo)</td>
                        <td>% de Participacion en Asociacion(**)</td>
                        <td>Nombre del Socio(s)(***)</td>
                        <td >Profesional Responsable(****)</td>
    
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
                                                                                                fecha_final,
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
                                                                                                ubicacion
                                                                                                FROM
                                                                                                    exp_general_c
                                                                                                WHERE
                                                                                                    $sql
                                                                                                ORDER BY
                                                                                                    fecha_ejecucion;");



            

            $result = mysqli_num_rows($query);

            // crear directorio o carpeta Exp especifica
            //$nombre_directorio = "Exp_especifica";
            //$resultado = mkdir("../sistema/img/"."/$nombre_directorio");
            
            
            

            

            $files = glob('../sistema/img/Exp_especifica_c/*'); //obtenemos todos los nombres de los ficheros
            foreach($files as $file){
                if(is_file($file))
                unlink($file); //elimino el fichero
            }

            
            
            

            

            if ($result > 0) {
                while ($data = mysqli_fetch_array($query)) {
                    if ($data['image'] != 'nodisponible.png' ) {
                        $ru = $data['image'];
                        $image = 'img/actas_c/'.$data['image'];
                        

                    }else {
                        $image = 'img/'.$data['image'];
                    }
                    
                    $image2 = 'img/actas_c/'.$data['image2'];
                    $ru2 = $data['image2'];
                    $image3= 'img/actas_c/'.$data['image3'];
                    $ru3 = $data['image3'];
                    
                    

            ?>
                    <tr >
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
                                
                                
                                
                            </tr>
            <?php

            

            // copiar actas especificas

            

            
            
            if ($ru !=0 )  {
                $origen = "../sistema"."/$image";
                $destino = "../sistema/img/Exp_especifica_c"."/$ru";
                $resultado = copy($origen, $destino);
                echo $destino;
            }
            if ($ru2 !=0) {
                $origen2 = "../sistema/".$image2;
                $destino2 = "../sistema/img/Exp_especifica_c"."/$ru2";
                $resultado2 = copy($origen2, $destino2);
            }
            if ($ru3 !=0) {
                $origen3 = "../sistema"."/$image3";
                $destino3 = "../sistema/img/Exp_especifica_c"."/$ru3";
                $resultado3 = copy($origen3, $destino3);
                
            }


                }
            }

            //shell_exec('start C:/xampp/htdocs/poncelet-sis/sistema/img/Exp_especifica');
            //shell_exec('start .');

            $sql_suma_bs = mysqli_query($conexion, "SELECT SUM(monto_bs) FROM exp_general_c where $sql ;");
                    $result_sum = mysqli_fetch_array($sql_suma_bs);
                    $total = $result_sum['SUM(monto_bs)']; 
            ?>
             <tr class="exp">
                        <td colspan="5" style="text-align: right; background-color: #DEEAF6; ">  TOTAL FACTURADO EN DÓLARES AMERICANOS (Llenado de uso alternativo)</td>
                        <td colspan="5"style="background-color: white;"> <?php echo number_format($total_us,2,'.',',').' $'?></td>
                    </tr>
                    <tr class="exp">
                        <td colspan="5" style="text-align: right; background-color: #DEEAF6;">TOTAL FACTURADO EN BOLIVIANOS (****)</td>
                        <td colspan="5" style="background-color:white ;"><?php echo number_format($total,2,'.',',').' Bs'?></td>
                    </tr>
                    <tr class="exp-betanzos">
                        
                        <td colspan="1" style="background-color: white ; text-align: left;border-bottom: 1px solid white;border-right: 1px solid white ;" > <center> * </center></td>
                        <td colspan="9" style="background-color: white ; text-align: left;border-bottom: 1px solid white;" > Monto a la fecha de Recepción Final de la Obra. </td>
                    </tr>
                    <tr class="exp-betanzos">
                        
                        <td colspan="1" style="background-color: white ; text-align: left;border-bottom: 1px solid white;border-right: 1px solid white ;" > <center> ** </center></td>
                        <td colspan="9" style="background-color: white ; text-align: left;border-bottom: 1px solid white;" > Cuando la empresa cuente con experiencia asociada, solo se debe consignar el monto correspondiente a su participacion.</td>
                    </tr>
                    <tr class="exp-betanzos">
                        
                        <td colspan="1" style="background-color: white ; text-align: left;border-bottom: 1px solid white;border-right: 1px solid white ;" > <center> *** </center></td>
                        <td colspan="9" style="background-color: white ; text-align: left;border-bottom: 1px solid white;" > Si el contrato lo ejecuto asociado, indicar en esta casilla del o los socios.</td>
                    </tr>
                    <tr class="exp-betanzos">
                        
                        <td colspan="1" style="background-color: white ; text-align: left;border-bottom: 1px solid white;border-right: 1px solid white ;" > <center> **** </center> </td>
                        <td colspan="9" style="background-color: white ; text-align: left;border-bottom: 1px solid white;" > Indicar el nombre del Profesional Responsable, que desempeño el cargo de Superintendente, Residente o Director de Obras o su equivalente. Se puede nombrar a mas de un profesional, si asi correspondiese. </td>
                    </tr>

                    <tr class="exp-betanzos">
                        
                        <td colspan="1" style="background-color: white ; text-align: left;border-bottom: 1px solid white;border-right: 1px solid white ;" > <center> ***** </center> </td>
                        <td colspan="9" style="background-color: white ; text-align: left;border-bottom: 1px solid white;" > El monto en bolivianos no necesariamentedebe coincidir con el monto en Dólares Americanos.  </td>
                    </tr>
                    
                    <tr class="exp-betanzos">
                        
                        
                        <td colspan="10" style="background-color: white ; text-align: left;border-bottom: 1px solid white;border-bottom: 1px solid white;" > <strong> NOTA.- </strong> Toda la información contenida en este formulario es una declaración jurada. En caso de adjudicación el proponente se compromete a presentar el certificado, Acta de Recepción Definitiva u otro documento que acredite su experiencia en cada una de las obras detalladas, en original o fotocopia legalizada emitida por el contratante. </td>
                    </tr>
                    <!--<tr>
                         <td colspan="10" class="exp2"><img class="im" src="img/sello.jpg" ></td>
                    </tr>-->

                    <tr>
                         <td colspan="10"  ><img style="height: 150px; width:150px; "  src="img/selloc.png" ></td>
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
                }
                
                ?>














































































































                <?php
                    $html = ob_get_clean();
                    $dompdf = new Dompdf();
                    $dompdf->loadHtml($html);
                    $dompdf->setPaper('letter','portrait');
                    //$dompdf->setPaper('A4', 'landscape');
                    $dompdf->set_option('dpi', 100);
                    $dompdf->render();
                    $dompdf->stream('Experiencia_Especifica',array('attachment'=>0));       
                ?>

