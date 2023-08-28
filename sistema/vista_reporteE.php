<?php

session_start();
include "../conexion.php";

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACTAS ESPECIFICAS</title>
    <style type="text/css">
        .aimg{
            width: 750px;
        }
    </style>
</head>

<body>

<?php
    $directory="img/Exp_especifica/";
    $dirint = dir($directory);

    while (($archivo = $dirint->read()) != false)
    {
        if (strpos($archivo,'jpg') || strpos($archivo,'jpeg')){
            $archivos[] = $archivo;
            $image = $directory. $archivo;
            

            
            //echo '<pre>';
            //print_r($archivos)."\n";
            //echo '</pre>';
            //echo'<img style="width:700px" src='.$image.'>';
        }
    }
    $dirint->close();

    natsort($archivos);
    foreach($archivos as $archivo) {
    //echo $archivo;
    echo'<img style="width:760px" src=img/Exp_especifica/'.$archivo.'>';
    }
    
?>
                
            
    
</body>
</html>