<?php

session_start();
include "../conexion.php";

$num = 0;

$query = mysqli_query($conexion, "SELECT * FROM productos");
$result = mysqli_num_rows($query);
if ($result > 0) {
    while ($data = mysqli_fetch_array($query)) {
        $nume = $data['id_producto'];
    }
}

$sql_tfila = mysqli_query($conexion, "SELECT COUNT(id_producto) FROM productos;");
$result_f = mysqli_fetch_array($sql_tfila);
$total2 = $result_f['COUNT(id_producto)'];
$total3 =  $total2 + 1;


if (!empty($_POST)) {


    if (
        empty($_POST['producto'])
        || empty($_POST['marca'])
        || empty($_POST['unidad'])
        || empty($_POST['precio_c'])
        || empty($_POST['precio_v'])
    ) {
        $alert = '<p class="alert alert-danger "> Llenar campos faltantes</p> ';
    } else {
        $Producto       = $_POST['producto'];
        $Marca          = $_POST['marca'];
        $Unidad         = $_POST['unidad'];
        $Precio_c       = $_POST['precio_c'];
        $Precio_v       = $_POST['precio_v'];
        $Tipo           = $_POST['tipo'];
        $Proveedor      = $_POST['proveedor'];

        $foto           = $_FILES['foto'];
        $pdf           = $_FILES['pdf'];
        $num            = $total2 + 1;

        $num2           = $total2;


        //imagen 1

        $nombre_image = $foto['name'];
        $type = $foto['type'];
        $url_temp = $foto['tmp_name'];

        // pdf
        $nombre_pdf = $pdf['name'];
        $type2 = $pdf['type'];
        $url_temp2 = $pdf['tmp_name'];

        $imgProducto = 'nodisponible.png';

        if ($nombre_image != '') {
            $destino = 'img/productos/';
            $img_nombre = 'producto' . $num;
            //$img_nombre = 'acta_'.$ubicacion.'-'.$fecha_ejecucion.date('H:m:s');
            $imgActa = $img_nombre . '.jpg';
            $src = $destino . $imgActa;
        }


        if ($nombre_pdf != '') {
            $destino2 = 'img/fichas_tecnicas/';
            $img_nombre = 'FichaTecnica'.date("Y-m-d H-i-s").'_'.$num;
            //$img_nombre = 'acta_'.$ubicacion.'-'.$fecha_ejecucion.date('H:m:s');
            $ruta_pdf = $img_nombre . '.pdf';
            $src_pdf = $destino2 . $ruta_pdf;
        }




        $query_insert = mysqli_query($conexion, "INSERT INTO productos(
                        p_descripcion,
                        p_marca,
                        p_unidad,
                        p_precioc,
                        p_preciov,
                        p_tipo,
                        p_proveedor,
                        foto,
                        pdf
                    )
                    VALUES(
                        '$Producto',
                        '$Marca',
                        '$Unidad',
                        '$Precio_c',
                        '$Precio_v',
                        '$Tipo',
                        '$Proveedor',
                        '$imgActa',
                        '$ruta_pdf'

                    )");


        if ($query_insert) {
            if ($nombre_image != '') {
                move_uploaded_file($url_temp, $src);
            }
            if ($nombre_pdf != '') {
                move_uploaded_file($url_temp2, $src_pdf);
            }
            $alert = '<p class="alert alert-success"> Guardado Correctamente </p> ';
            header("Location: productos.php");
        } else {
            $alert = '<p class="alert alert-danger "> El registro fallo </p> ';
        }
    }
}




?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <?php include "includes/scripts.php"; ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>SISPONCELET</title>

</head>

<body class="sb-nav-fixed">
    <?php include "includes/header.php"; ?>


    <!-- contenido del sistema-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4 ">
                <div class="container-fluid px-4 ">

                    <h1 class="mt-4 col"><i class="fa-solid fa-truck-ramp-box"></i> <strong>Gestor </strong><span style="color:#fd6f0a;"> Base de datos Productos </span></h1>


                    <hr>






                    <!-- contenido del sistema 2-->
                    <!-- formulario de registro de usuarios-->


                    <div class="row">


                        <div class="">







                            <form action="productos.php" method="post" class="fields was-validated " enctype="multipart/form-data" novalidate>



                                <div class="row" style="background-color: #fff0f0;">



                                    <a class="btn alert alert-dark font-weight-bold  disabled" role="button" aria-disabled="true"> <strong> N° de registro: <?php echo $total3 ?> </strong></a>
                                    <div class="col-md-6">
                                        <div class=" mb-3 mb-md-0">
                                            <span for="inputFirstName">Descripcion Producto </span>
                                            <input class="form-control form-control-sm  bg-opacity-10" name="producto" type="text" value="" required />
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class=" mb-3 mb-md-0">
                                            <span for="inputFirstName">Marca</span>
                                            <input class="form-control form-control-sm  bg-opacity-10" name="marca" type="text" value="" required />
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class=" mb-3 mb-md-0">
                                            <span for="inputFirstName">Precio Compra</span>
                                            <input oninput="calcular_a_bs()" id="precio_c" style="background-color:#c9ffc9;" class="form-control form-control-sm  bg-opacity-10" placeholder="0"  name="precio_c" type="text" value="" required />
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class=" mb-3 mb-md-0">
                                            <span for="inputFirstName">Precio Venta</span>
                                            <input style="background-color:#c9ffc9;" id="precio_v" class="form-control form-control-sm  bg-opacity-10" placeholder="0" name="precio_v"  type="text" value="" required />
                                        </div>
                                    </div>


                                    <div class="col-md-2">
                                        <label for="tipo">Unidad/Medible </label>
                                        <select name="unidad" id="unidad" class="form-control form-control-sm " required>
                                            <option value="">Selecciona una Opcion</option>
                                            <option value="Unidad">Unidad</option>
                                            <option value="Caja">Caja</option>
                                            <option value="Pieza">Pieza</option>
                                            <option value="Equipo">Equipo</option>
                                            <option value="Paquete">Paquete</option>
                                            <option value="Pliegue">Pliegue</option>
                                            <option value="Pliego">Pliego</option>
                                            <option value="Par">Par</option>
                                            <option value="Docena">Docena</option>
                                            <option value="Bidon">Bidon</option>
                                            <option value="Block">Block</option>
                                            <option value="Bolsa">Bolsa</option>
                                            <option value="Bote">Bote</option>
                                        </select>
                                    </div>



                                    <div class="col-md-2">
                                        <label for="tipo">Tipo de Producto</label>
                                        <select name="tipo" id="tipo" class="form-control form-control-sm ">
                                            <option value="">Selecciona una Opcion</option>
                                            <option value="limpieza">Material de Limpieza</option>
                                            <option value="mobiliario">Material Mobiliario</option>
                                            <option value="Musical">Material Musical</option>
                                            <option value="Hospitalario">Material Hospitalario</option>
                                            <option value="Tecnologico">Material Tecnologico</option>
                                            <option value="Cocina">Material de Cocina</option>
                                            <option value="Textil">Material Textil</option>
                                            <option value="Vehiculos">Vehiculos</option>
                                            <option value="Ferreteria">Ferreteria</option>
                                            <option value="industrial">Seguridad Industrial</option>
                                            <option value="alimentos">Alimentos</option>
                                            <option value="escritorio">Material de Escritorio</option>
                                            <option value="policial">Material Policial</option>
                                            <option value="deportivo">Material Deportivo</option>
                                            <option value="belleza">Material de Belleza</option>
                                        </select>
                                    </div>

                                    <div class="col-md-2">
                                        <div class=" mb-3 mb-md-0">
                                            <span for="inputFirstName">Proveedor </span>
                                            <input class="form-control form-control-sm  bg-opacity-10" name="proveedor" type="text" value="" />
                                        </div>
                                    </div>






                                    <div class="col-md-3">
                                        <div class=" mb-3 mb-md-0">
                                            <span for="inputFirstName">Foto</span>
                                            <input type="file" class="form-control form-control-sm" name="foto" id="files">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class=" mb-3 mb-md-0">
                                            <span for="inputFirstName">Ficha tecnica PDF</span>
                                            <input type="file" class="form-control form-control-sm" name="pdf" id="files">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="" role="alert" style=""> <?php echo isset($alert) ? $alert : ''; ?></div>

                                        <input class="btn  btn-primary m-2  " type="submit" value="Registrar Producto" data-dismiss="alert">

                                    </div>




                                </div>











                                <hr>

                                <div class="col-md-12">
                                    <div class="" id="">
                                        <center>

                                            <output id="list" class="form-control "></output>

                                        </center>


                                    </div>
                                </div>






                            </form>

                        </div>

                        <?php

                        $sql_tfilas = mysqli_query($conexion, "SELECT COUNT(*) FROM productos;");
                        $result_fs = mysqli_fetch_array($sql_tfilas);
                        $totales = $result_f['COUNT(id_producto)'];; ?>

                        <div class="">

                            <div class="">

                                <nav class="navbar bg-light">
                                    <div class="container-fluid ">
                                        <a class="navbar-brand text-black"> <i class="fa-solid fa-table-list"></i> Lista de Productos </a>
                                        <form class="d-flex" role="search">





                                            <button style="margin:2px;" class="btn btn-sm btn-secondary" type="submit"> <strong> TOTAL PRODUCTOS : </strong> <?php echo $totales; ?> </button>
                                            <a style="margin:2px;" class="  btn btn-primary btn-sm " href="cotizador/"> <i class="fa-solid fa-sack-dollar"></i> Ir a COTIZADOR</a>
                                            <a href="ssreporte_inventario.php" class="btn btn-danger btn-sm" style="margin:2px;"> <i class="fa-solid fa-print"></i> Imprimir Reporte de Productos</a>
                                        </form>
                                    </div>
                                </nav>



                                <table >
                                    <table id="tablas"  class="table table-bordered table-hover" style="font-size:11px ;">
                                        <thead class="table-secondary">
                                            <tr class="">

                                                <th>CODIGO PRODUCTO</th>
                                                <th width="30%">NOMBRE </th>
                                                <th>MARCA</th>
                                                <th>U/M</th>
                                                <th>PRECIO COMPRA</th>
                                                <th>PRECIO VENTA</th>
                                                <th>TIPO PRODUCTO</th>
                                                <th>PROVEEDOR</th>
                                                <th>FECHA REGISTRO</th>




                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <?php

                                        // rescatar datos DB 
                                        //$query = mysqli_query($conexion, "SELECT * FROM gastos
                                        //ORDER BY id_gasto DESC;");

                                        $query = mysqli_query($conexion, "SELECT * FROM productos order by id_producto DESC;");



                                        $result = mysqli_num_rows($query);
                                        if ($result > 0) {
                                            while ($data = mysqli_fetch_array($query)) {
                                                if ($data['foto'] != 'nodisponible.png') {
                                                    $image = 'img/productos/' . $data['foto'];
                                                } else {
                                                    $image = 'img/' . $data['foto'];
                                                }





                                        ?>

                                                <tr>
                                                    <td><?php echo $data['id_producto'] ?></td>
                                                    <td><?php echo $data['p_descripcion'] ?></td>
                                                    <td><?php echo $data['p_marca'] ?></td>
                                                    <td><?php echo $data['p_unidad'] ?></td>
                                                    <td><?php echo $data['p_precioc'] ?></td>
                                                    <td><?php echo $data['p_preciov'] ?></td>
                                                    <td><?php echo $data['p_tipo'] ?></td>
                                                    <td><?php echo $data['p_proveedor'] ?></td>
                                                    <td><?php echo $data['p_fecha_registro'] ?></td>











                                                    <td class="col-sm-2">

                                                        <div style="min-width: max-content;">

                                                             <?php
                                                             if (!empty($data['foto'])) {
                                                                
                                                             
                                                             ?>
                                                            <a class="btn btn-outline-success btn-sm gallery-item" id="<?php echo $image; ?> ">
                                                                <i class="fa-solid fa-image"></i> Ver Imagen
                                                            </a>

                                                            <?php
                                                             } else{

                                                                
                                                             
                                                             ?>
                                                            <a class="btn btn-outline-secondary btn-sm gallery-item" id="<?php echo $image; ?> ">
                                                            <i class="fa-solid fa-circle-exclamation"></i> Sin Imagen
                                                            </a>
                                                            <?php
                                                             } 
                                                             ?>

                                                            <a href="editar_imgP.php?id=<?php echo $data['id_producto'] ?>" class="btn btn-outline-success btn-sm" data-toggle="tooltip" data-placement="top" title="editar Imagen">
                                                                <i class="fa-solid fa-upload"></i>
                                                            </a>

                                                            <?php
                                                             if (!empty($data['pdf'])) {
                                                                
                                                             
                                                             ?>

                                                            <a style="background-color: #eeee90;color: #505050;border-color: black;" target="_blank" class="btn btn-primary btn-sm" href="img/fichas_tecnicas/<?php echo $data['pdf']; ?>"><i class="fa-solid fa-file-lines"></i> Ficha Tecnica </a>
                                                            <?php
                                                             } else{

                                                                
                                                             
                                                             ?>

                                                            <a target="_blank" class="btn btn-outline-secondary btn-sm" >
                                                            <i class="fa-solid fa-circle-exclamation"></i> Sin Ficha Tec</a>

                                                            <?php
                                                             } 
                                                             ?>


                                                            <a style="background-color: #eeee90;color: #505050;border-color: black;" href="editar_imgPDFP.php?id=<?php echo $data['id_producto'] ?>" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="editar Imagen">
                                                                <i class="fa-solid fa-upload"></i>
                                                            </a>
                                                            <a data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $data['id_producto']; ?> " class="btn btn-warning btn-sm" href=""><i class="fa-regular fa-pen-to-square"></i> </a>
                                                            <a data-bs-toggle="modal" data-bs-target="#exampleModali<?php echo $data['id_producto']; ?> " class="btn btn-danger btn-sm" href=""><i class="fa-solid fa-trash"></i> </a>


                                                        </div>



                                                    </td>
                                                </tr>

                                                <!-- Modal editar  -->
                                                <div class="modal fade" id="exampleModal<?php echo $data['id_producto']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="editar_productos.php" method="post">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Editar a <?php echo $data['p_descripcion'] ?> </h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="card-header">
                                                                        <input type="hidden" name="eid_pro" value="<?php echo $data['id_producto']; ?>">
                                                                        <label for="">Descripcion Producto</label>
                                                                        <input name="eproducto" class="form-control" type="text" value=" <?php echo $data['p_descripcion'] ?>">
                                                                        <label for="">Marca</label>
                                                                        <input name="emarca" class="form-control" type="text" value=" <?php echo $data['p_marca'] ?>">
                                                                        <label for="">Unidad</label>
                                                                        <select name="eunidad" id="eunidad" class="form-control form-control-sm " required>
                                                                            <option value="<?php echo $data['p_unidad'] ?>"><?php echo $data['p_unidad'] ?></option>
                                                                            <option value="Unidad">Unidad</option>
                                                                            <option value="Caja">Caja</option>
                                                                            <option value="Pieza">Pieza</option>
                                                                            <option value="Equipo">Equipo</option>
                                                                            <option value="Paquete">Paquete</option>
                                                                            <option value="Pliegue">Pliegue</option>
                                                                            <option value="Pliego">Pliego</option>
                                                                            <option value="Par">Par</option>
                                                                            <option value="Docena">Docena</option>
                                                                            <option value="Bidon">Bidon</option>
                                                                            <option value="Block">Block</option>
                                                                            <option value="Bolsa">Bolsa</option>
                                                                            <option value="Bote">Bote</option>
                                                                        </select>
                                                                        <label for="">Tipo Producto</label>
                                                                        <select name="etipo" id="etipo" class="form-control form-control-sm ">
                                                                            <option value="<?php echo $data['p_tipo'] ?>"><?php echo $data['p_tipo'] ?></option>
                                                                            <option value="limpieza">Material de Limpieza</option>
                                                                            <option value="mobiliario">Material Mobiliario</option>
                                                                            <option value="Musical">Material Musical</option>
                                                                            <option value="Hospitalario">Material Hospitalario</option>
                                                                            <option value="Tecnologico">Material Tecnologico</option>
                                                                            <option value="Cocina">Material de Cocina</option>
                                                                            <option value="Textil">Material Textil</option>
                                                                            <option value="Vehiculos">Vehiculos</option>
                                                                            <option value="Ferreteria">Ferreteria</option>
                                                                            <option value="industrial">Seguridad Industrial</option>
                                                                            <option value="alimentos">Alimentos</option>
                                                                            <option value="escritorio">Material de Escritorio</option>
                                                                            <option value="policial">Material Policial</option>
                                                                            <option value="deportivo">Material Deportivo</option>
                                                                            <option value="belleza">Material de Belleza</option>
                                                                        </select>

                                                                        <label for="">Proveedor (Referencias )</label>
                                                                        <input name="eproveedor" class="form-control" type="text" value=" <?php echo $data['p_proveedor'] ?>">

                                                                        <div class="">
                                                                            <div class=" mb-3 mb-md-0">
                                                                                <span for="inputFirstName">Precio Compra</span>
                                                                                <input style="background-color:#c9ffc9;" class="form-control form-control-sm  bg-opacity-10" name="eprecio_c" type="text" value="<?php echo $data['p_precioc'] ?>" required />
                                                                            </div>
                                                                        </div>

                                                                        <div class="">
                                                                            <div class=" mb-3 mb-md-0">
                                                                                <span for="inputFirstName">Precio Venta</span>
                                                                                <input style="background-color:#c9ffc9;" class="form-control form-control-sm  bg-opacity-10" name="eprecio_v" type="text" value="<?php echo $data['p_preciov'] ?>" required />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                                    <input type="submit" value="Actualizar Registros">
                                                                </div>

                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Modal eliminar  -->
                                                <div class="modal fade " id="exampleModali<?php echo $data['id_producto']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content  bg-opacity-80">
                                                            <form action="eliminar_productos.php" method="post">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Eliminar registro </h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="card-header text-center " style="padding: 0; margin: 0;">
                                                                        <input type="hidden" name="idPro" value="<?php echo $data['id_producto']; ?>">

                                                                        <input name="ename" class="form-control" style="text-align: center;" type="text" value=" <?php echo $data['p_descripcion'] ?> " disabled>
                                                                        <input name="ename" class="form-control" style="text-align: center;" type="text" value=" <?php echo $data['p_precioc'] . ' Bs' ?> " disabled>

                                                                    </div>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                                    <input class="btn btn-danger" type="submit" value="Eliminar">
                                                                </div>

                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>


                                        <?php

                                            }
                                        }
                                        ?>


                                    </table>


                            </div>
                        </div>







                    </div>




                </div>
                <!-- Modal para  ver imagenes -->
                <div class="modal fade" id="gallery-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered ">
                        <div class="modal-content modal-fullscreen ">
                            <div class="modal-header">
                                <!--<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>-->
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <img src="img/actas/acta_103_1_2021-02-22.jpg" class="modal-img" alt="modal img">
                            </div>

                        </div>
                    </div>
                </div>







            </div>
        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; poncelet.bo@gmail.com @leiglesSoft</div>
                    <div>

                    </div>
                </div>
            </div>
        </footer>
    </div>
    </div>

    <script>
        $(document).ready(function () {
            $('#tablas').DataTable({
                order: [[0, 'desc']],
                pageLength: 5,
                lengthMenu: [
                    [5, 10, 25,50,200, -1],
                    [5, 10, 25,50,200, 'All'],
                ],
                language:{
                    url:'js/Spanish.json'
                }
            });
        });
</script>



    <script>
        document.addEventListener("click", function(e) {
            if (e.target.classList.contains("gallery-item")) {
                const src = e.target.getAttribute("id");
                document.querySelector(".modal-img").src = src;

                const myModal = new bootstrap.Modal(document.getElementById('gallery-modal'));
                myModal.show();
            }
        });
    </script>
    <script>
        function archivo(evt) {
            var files = evt.target.files; // FileList object

            //Obtenemos la imagen del campo "file". 
            for (var i = 0, f; f = files[i]; i++) {
                //Solo admitimos imágenes.
                if (!f.type.match('image.*')) {
                    continue;
                }

                var reader = new FileReader();

                reader.onload = (function(theFile) {
                    return function(e) {
                        // Creamos la imagen.
                        document.getElementById("list").innerHTML = ['<img class="form-control" style="max-width:400px;" src="', e.target.result, '" title="', escape(theFile.name), '"/>'].join('');
                    };
                })(f);

                reader.readAsDataURL(f);
            }
        }

        document.getElementById('files').addEventListener('change', archivo, false);
    </script>
   

<script type="text/javascript">
        

        function calcular_a_bs(){
            try{
                var b = parseFloat(document.getElementById("precio_c").value) || 0;
                decimal = b.toFixed(2);
                proceso = (decimal *(30/100))+b;
                result = proceso.toFixed(2);
                document.getElementById("precio_v").value = result;
            } catch(e){}
        }


        

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
</body>

</html>