<?php
    // conexion a bases de datos
    $host = 'localhost:3316';
    $user = 'root';
    $password = '';
    $db = 'cotizacion';

    $conexion = @mysqli_connect($host,$user,$password,$db);

    

    if (!$conexion) {
        echo "Error en la conexion";
    } 


    if (isset($_POST['nombre'])) {
        // ...
        // Código existente para obtener información del cliente y los productos cotizados
    
        // Guarda la cotización en la tabla de cotizaciones
        $cotizacionQuery = "INSERT INTO cotizaciones (cliente_id, fecha, total) VALUES ('$cotizacion[cliente_id]', '$cotizacion[fecha]', '$cotizacion[total]')";
        mysqli_query($conexion, $cotizacionQuery);
    
        // Obtén el ID de la cotización recién insertada
        $cotizacion_id = mysqli_insert_id($conexion);
    
        // Guarda los productos cotizados en la tabla de productos_cotizados
        foreach ($_POST['productos'] as $producto_id) {
            $productoQuery = "INSERT INTO productos_cotizados (cotizacion_id, id_producto) VALUES ('$cotizacion_id', '$producto_id')";
            mysqli_query($conexion, $productoQuery);
        }
    
        // ...
    
        // Redirecciona a la página de la cotización generada
        redirect("pdf.php?number=$cotizacion_id");
    }
    
    // Agrega el siguiente código para permitir la edición de una cotización existente
    if (isset($_POST['editar_cotizacion'])) {
        $cotizacion_id = $_POST['cotizacion_id'];
    
        // Elimina los productos cotizados existentes de la tabla productos_cotizados
        $deleteProductosQuery = "DELETE FROM productos_cotizados WHERE cotizacion_id='$cotizacion_id'";
        mysqli_query($conexion, $deleteProductosQuery);
    
        // Obtén la información actualizada del cliente y los productos cotizados
        // ...
    
        // Actualiza los datos de la cotización en la tabla cotizaciones
        $updateCotizacionQuery = "UPDATE cotizaciones SET cliente_id='$cotizacion[cliente_id]', total='$cotizacion[total]' WHERE id='$cotizacion_id'";
        mysqli_query($conexion, $updateCotizacionQuery);
    
        // Guarda los productos cotizados actualizados en la tabla productos_cotizados
        foreach ($_POST['productos'] as $producto_id) {
            $productoQuery = "INSERT INTO productos_cotizados (cotizacion_id, id_producto) VALUES ('$cotizacion_id', '$producto_id')";
            mysqli_query($conexion, $productoQuery);
        }
    
        // Redirecciona a la página de la cotización actualizada
        redirect("pdf.php?number=$cotizacion_id");
    }


?>