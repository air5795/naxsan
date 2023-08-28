
<?php 

session_start();

    include "../conexion.php";


    

if (!empty($_POST)) {
    
    $alert = '';
    if (empty($_POST['eproducto']) || empty($_POST['emarca'])|| empty($_POST['eunidad'])|| empty($_POST['eprecio_v'])|| empty($_POST['eprecio_c'])) {
        $alert = '<p class="alert alert-danger w-50"> Todos los Campos Son Obligatorios  </p> ';
    } else {
        
        
        $idPRO = trim($_POST['eid_pro']);
        $producto = trim($_POST['eproducto']);
        $marca = trim($_POST['emarca']);
        $unidad = trim($_POST['eunidad']);
        $tipo = trim($_POST['etipo']);
        $proveedor = trim($_POST['eproveedor']);
        $precioc = trim($_POST['eprecio_c']);
        $preciov = trim($_POST['eprecio_v']);

        


        
        
            $query = mysqli_query($conexion,"SELECT * FROM productos_s");  
                                                  
            $resul = mysqli_fetch_array($query);
          
            $sql_update = mysqli_query($conexion,"UPDATE productos_s
                                                  SET s_descripcion = '$producto', 
                                                      s_marca = '$marca', 
                                                      s_unidad = '$unidad', 
                                                      s_precioc = '$precioc', 
                                                      s_preciov = '$preciov', 
                                                      s_tipo = '$tipo', 
                                                      s_proveedor = '$proveedor' 
                                                  WHERE id_producto_s = $idPRO");

                                            
            if ($sql_update ) {
                
                $alert = '<p class="alert alert-success"> Guardado Correctamente </p> ';
                
                //header("Location: inventario_i.php");
                header("Location: productos_old.php");
                

                 
            } else {
                $alert = '<p class="alert alert-danger "> El registro fallo </p> ';
            }
        }

    }

?>