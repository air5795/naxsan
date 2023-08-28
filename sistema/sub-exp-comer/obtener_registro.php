<?php

include("conexion.php");
include("funciones.php");

if (isset($_POST["id_exp"])) {
    $salida = array();
    $stmt = $conexion->prepare("SELECT * FROM exp_general WHERE id_exp = '".$_POST["id_exp"]."' LIMIT 1");
    $stmt->execute();
    $resultado = $stmt->fetchAll();
    foreach($resultado as $fila){
        $salida["nombre_contratante"] = $fila["nombre_contratante"];
        $salida["obj_contrato"] = $fila["obj_contrato"];
        $salida["ubicacion"] = $fila["ubicacion"];
        $salida["monto_bs"] = $fila["monto_bs"];
        $salida["monto_dolares"] = $fila["monto_dolares"];
        $salida["fecha_ejecucion"] = $fila["fecha_ejecucion"];
        $salida["participa_aso"] = $fila["participa_aso"];
        $salida["n_socio"] = $fila["n_socio"];
        $salida["profesional_resp"] = $fila["profesional_resp"];
        $salida["detalle"] = $fila["detalle"];

        /* imagen1 */ 
        if ($fila["image"] != "") {
            $salida["image"] = '<p style="margin: 0;background-color: #ffe1d0;font-size: 12px;text-align: center;font-weight: 700;border-radius: 8px;color: #565656;">Acta N° 1</p> '.'<img src="actas/' . $fila["image"] . '"  class="img-thumbnail" width="150" height="150" />
            <input type="hidden" name="img_o" value="'.$fila["image"].'" />';
        }

        /* image2 */ 
        if ($fila["image2"] != "") {
            $salida["image2"] =  '<p style="margin: 0;background-color: #ffe1d0;font-size: 12px;text-align: center;font-weight: 700;border-radius: 8px;color: #565656;">Acta N° 2</p> '.'<img src="actas/' . $fila["image2"] . '"  class="img-thumbnail" width="150" height="150" />
            <input type="hidden" name="img_o2" value="'.$fila["image2"].'" />';
        }

        /* image3 */
        if ($fila["image3"] != "") {
            $salida["image3"] = '<p style="margin: 0;background-color: #ffe1d0;font-size: 12px;text-align: center;font-weight: 700;border-radius: 8px;color: #565656;">Acta N° 3</p> '.'<img src="actas/' . $fila["image3"] . '"  class="img-thumbnail" width="150" height="150" />
            <input type="hidden" name="img_o3" value="'.$fila["image3"].'" />';
        }

        /* image4 */
        if ($fila["image4"] != "") {
            $salida["image4"] = '<p style="margin: 0;background-color: #ffe1d0;font-size: 12px;text-align: center;font-weight: 700;border-radius: 8px;color: #565656;">Acta N° 4</p> '.'<img src="actas/' . $fila["image4"] . '"  class="img-thumbnail" width="150" height="150" />
            <input type="hidden" name="img_o4" value="'.$fila["image4"].'" />';
        }

        /* image5 */
        if ($fila["image5"] != "") {
            $salida["image5"] = '<p style="margin: 0;background-color: #ffe1d0;font-size: 12px;text-align: center;font-weight: 700;border-radius: 8px;color: #565656;">Acta N° 5</p> '.'<img src="actas/' . $fila["image5"] . '"  class="img-thumbnail" width="150" height="150" />
            <input type="hidden" name="img_o5" value="'.$fila["image5"].'" />';
        }

        /* image6 */
        if ($fila["image6"] != "") {
            $salida["image6"] = '<p style="margin: 0;background-color: #ffe1d0;font-size: 12px;text-align: center;font-weight: 700;border-radius: 8px;color: #565656;">Acta N° 6</p> '.'<img src="actas/' . $fila["image6"] . '"  class="img-thumbnail" width="150" height="150" />
            <input type="hidden" name="img_o6" value="'.$fila["image6"].'" />';
        }

        /* image7 */
        if ($fila["image7"] != "") {
            $salida["image7"] = '<p style="margin: 0;background-color: #ffe1d0;font-size: 12px;text-align: center;font-weight: 700;border-radius: 8px;color: #565656;">Acta N° 7</p> '.'<img src="actas/' . $fila["image7"] . '"  class="img-thumbnail" width="150" height="150" />
            <input type="hidden" name="img_o7" value="'.$fila["image7"].'" />';
        }

        /* image8 */
        if ($fila["image8"] != "") {
            $salida["image8"] = '<p style="margin: 0;background-color: #ffe1d0;font-size: 12px;text-align: center;font-weight: 700;border-radius: 8px;color: #565656;">Acta N° 8</p> '.'<img src="actas/' . $fila["image8"] . '"  class="img-thumbnail" width="150" height="150" />
            <input type="hidden" name="img_o8" value="'.$fila["image8"].'" />';
        }

        /* image9 */
        if ($fila["image9"] != "") {
            $salida["image9"] = '<p style="margin: 0;background-color: #ffe1d0;font-size: 12px;text-align: center;font-weight: 700;border-radius: 8px;color: #565656;">Acta N° 9</p> '.'<img src="actas/' . $fila["image9"] . '"  class="img-thumbnail" width="150" height="150" />
            <input type="hidden" name="img_o9" value="'.$fila["image9"].'" />';
        }

        /* image10 */
        if ($fila["image10"] != "") {
            $salida["image10"] = '<p style="margin: 0;background-color: #ffe1d0;font-size: 12px;text-align: center;font-weight: 700;border-radius: 8px;color: #565656;">Acta N° 10</p> '.'<img src="actas/' . $fila["image10"] . '"  class="img-thumbnail" width="150" height="150" />
            <input type="hidden" name="img_o10" value="'.$fila["image10"].'" />';
        }

        /* image11 */
        if ($fila["image11"] != "") {
            $salida["image11"] = '<p style="margin: 0;background-color: #ffe1d0;font-size: 12px;text-align: center;font-weight: 700;border-radius: 8px;color: #565656;">Acta N° 11</p> '.'<img src="actas/' . $fila["image11"] . '"  class="img-thumbnail" width="150" height="150" />
            <input type="hidden" name="img_o11" value="'.$fila["image11"].'" />';
        }

        /* image12 */
        if ($fila["image12"] != "") {
            $salida["image12"] = '<p style="margin: 0;background-color: #ffe1d0;font-size: 12px;text-align: center;font-weight: 700;border-radius: 8px;color: #565656;">Acta N° 12</p> '.'<img src="actas/' . $fila["image12"] . '"  class="img-thumbnail" width="150" height="150" />
            <input type="hidden" name="img_o12" value="'.$fila["image12"].'" />';
        }

        /* image13 */
        if ($fila["image13"] != "") {
            $salida["image13"] = '<p style="margin: 0;background-color: #ffe1d0;font-size: 12px;text-align: center;font-weight: 700;border-radius: 8px;color: #565656;">Acta N° 13</p> '.'<img src="actas/' . $fila["image13"] . '"  class="img-thumbnail" width="150" height="150" />
            <input type="hidden" name="img_o13" value="'.$fila["image13"].'" />';
        }

        /* image14 */
        if ($fila["image14"] != "") {
            $salida["image14"] = '<p style="margin: 0;background-color: #ffe1d0;font-size: 12px;text-align: center;font-weight: 700;border-radius: 8px;color: #565656;">Acta N° 14</p> '.'<img src="actas/' . $fila["image14"] . '"  class="img-thumbnail" width="150" height="150" />
            <input type="hidden" name="img_o14" value="'.$fila["image14"].'" />';
        }

        /* image15 */
        if ($fila["image15"] != "") {
            $salida["image15"] = '<p style="margin: 0;background-color: #ffe1d0;font-size: 12px;text-align: center;font-weight: 700;border-radius: 8px;color: #565656;">Acta N° 15</p> '.'<img src="actas/' . $fila["image15"] . '"  class="img-thumbnail" width="150" height="150" />
            <input type="hidden" name="img_o15" value="'.$fila["image15"].'" />';
        }






        
        
    }

    echo json_encode($salida);
}