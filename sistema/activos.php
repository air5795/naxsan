<?php
    
    session_start();
    include "../conexion.php";

    $num =0;

    $query = mysqli_query($conexion, "SELECT * FROM activo_fijo");
    $result = mysqli_num_rows($query);
    if ($result > 0) {
        while ($data = mysqli_fetch_array($query)) {
             $num = $data['id_activoFijo'];
             
        }}

        $sql_tfila = mysqli_query($conexion, "SELECT COUNT(id_activoFijo) FROM activo_fijo;");
        $result_f = mysqli_fetch_array($sql_tfila);
        $total2 = $result_f['COUNT(id_activoFijo)'];
        $total3 =  $total2 + 1;


    if (!empty($_POST)) {


        if (empty($_POST['articulo'])  
        || empty($_POST['categoria']) 
        || empty($_POST['stock'])) {
            $alert = '<p class="alert alert-danger "> Llenar campos faltantes</p> ';
       } 
       else 
     {
            
            $Articulo = $_POST['articulo'];
            $Categoria = $_POST['categoria'];
            $Stock = $_POST['stock'];
            $foto = $_FILES['foto'];
            $num = $total2 +1;


             //imagen 1
  
             $nombre_image = $foto['name'];
             $type = $foto['type'];
             $url_temp = $foto['tmp_name'];
 
             $imgProducto = 'nodisponible.png';
 
             if ($nombre_image != '') {
                 $destino = 'img/activos/';
                 $img_nombre = 'articulo'.$num;
                 //$img_nombre = 'acta_'.$ubicacion.'-'.$fecha_ejecucion.date('H:m:s');
                 $imgActa = $img_nombre.'.jpg';
                 $src= $destino.$imgActa;
             }
            

                    $query_insert = mysqli_query($conexion, "INSERT INTO activo_fijo(
                        f_articulo,
                        f_stock,
                        f_foto,
                        f_activoCategoria
                    )
                    VALUES(
                        '$Articulo',
                        '$Stock',
                        '$imgActa',
                        '$Categoria'

                    )");


            if ($query_insert) {
                if ($nombre_image != '' ) {
                    move_uploaded_file($url_temp,$src);
                    
                
                } 
                $alert = '<p class="alert alert-success"> Guardado Correctamente </p> ';
                header("Location: activos.php");

            }else{
                $alert = '<p class="alert alert-danger "> El registro fallo </p> ';
            }
            
        
}

}




?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <?php include "includes/scripts.php";?>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>SISPONCELET</title>
        
    </head>
    <body class="sb-nav-fixed">
    <?php include "includes/header.php";?>
    

        <!-- contenido del sistema-->

        <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                    <div class="container-fluid px-4 ">
                
                <h1 class="mt-4 col"><i class="fa-solid fa-box-open"></i>  <strong>Gestor </strong><span style="color:#fd6f0a;"> Activos Fijos de la Empresa  </span></h1>
                  
                        
                        <hr>

                        
                                                    
                        

                        
                       <!-- contenido del sistema 2--> 
                        <!-- formulario de registro de usuarios-->


                        <div class="row">
                        
                        
                        <div class="col-md-4">
                        
                        





                        <form action="activos.php" method="post" class="fields was-validated " enctype="multipart/form-data" novalidate >

                        

                        <div class="row" style="background-color: #fff0f0;">
                            

                        

                            

                           

                            

                             
                            <a class="btn alert alert-dark font-weight-bold  disabled" role="button" aria-disabled="true"> <strong> N° de registro:  <?php echo $total3 ?> </strong></a>
                            <div class="col-md-12">
                                <div class=" mb-3 mb-md-0">
                                    <span for="inputFirstName">Detalle Articulo </span> 
                                    <input  class="form-control form-control-sm  bg-opacity-10" name="articulo" type="text" value="" required  />
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class=" mb-3 mb-md-0">
                                    <span for="inputFirstName">Categoria </span> 
                                    <select name="categoria" class="form-select form-select-sm" required >
                                        <option value="" >Seleccione una opción : </option>
                                        <?php
                                            $query = mysqli_query($conexion, "SELECT * from activos;");
                                            $result = mysqli_num_rows($query);
                                            if ($result > 0) {
                                            while ($data = mysqli_fetch_array($query)) {
                                                echo '<option value="'.$data['id_activo'].'">'.$data['nombre_activo'].'</option>';
                                            }}
                                        ?>
                                    </select>
                                   
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class=" mb-3 mb-md-0">
                                    <span for="inputFirstName">Stock (Existencias)</span> 
                                    <input class="form-control form-control-sm money" id="bs" name="stock" type="number" step='1'  placeholder='1'  required/>
                                </div>
                            </div>

                            

                            

                            <div class="col-md-12">
                                <div class=" mb-3 mb-md-0">
                                <span for="inputFirstName">Foto</span> 
                                <input type="file" class="form-control form-control-sm"  name="foto" id="files" >
                                </div>
                            </div> 

                            

                            
                        </div>




                            <hr class="w-100">
                            <!-- selector--> 

                            
                            

                            <div class="row">
                                <div class="" role="alert" style=""> <?php echo isset ($alert) ? $alert :''; ?></div>
                                
                                <input type="submit" value="Registrar" class="btn btn-primary  border-0 " data-dismiss="alert" >
                                
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

                            $sql_tfilas = mysqli_query($conexion, "SELECT COUNT(*) FROM activo_fijo;");
                            $result_fs = mysqli_fetch_array($sql_tfilas);
                            $totales = $result_f['COUNT(id_activoFijo)'];

                        ?>

                        <div class="col">
                        
                            <div class="">

                            <nav class="navbar bg-light">
                                <div class="container-fluid ">
                                    <a class="navbar-brand text-black"> <i class="fa-solid fa-table-list"></i>  Lista de activos fijos </a>
                                    <form class="d-flex" role="search">

                                    
                                    

                                   
                                    <button style="border: groove;" disabled class="btn btn-sm btn-secondary" type="submit"> <strong> TOTAL ARTICULOS REGISTRADOS  : </strong> <?php echo $totales ;?> </button>
                                    <a href="ssreporte_inventario.php" class="btn btn-danger" style="margin:2px;"> <i class="fa-solid fa-print"></i> Imprimir Reporte de Inventario</a> 
                                    </form>
                                </div>
                                </nav>

                                
                            
                            <table>
                            <table id="tablas"  class="table table-bordered table-hover" style="font-size:11px ;"  >
                                <thead class="table-secondary">
                                    <tr class="">
                                        
                                        <th>CODIGO</th>
                                        <th>Nombre de articulo </th>
                                        <th>Categoria</th>
                                        <th>Stock (Existencia)</th>
                                        
                                        
                                        
                                        
                                        <th>Acciones</th>    
                                    </tr>
                                    </thead>
                                    <?php
                    
                                    // rescatar datos DB 
                                    //$query = mysqli_query($conexion, "SELECT * FROM gastos
                                    //ORDER BY id_gasto DESC;");

                                    $query = mysqli_query($conexion, "SELECT activo_fijo.id_activoFijo, 
                                                                            activo_fijo.f_articulo,
                                                                            activo_fijo.f_stock,
                                                                            activo_fijo.f_activoCategoria,
                                                                            activo_fijo.f_foto,
                                                                            activos.nombre_activo
                                                                    FROM activo_fijo
                                                                    JOIN activos ON activo_fijo.f_activoCategoria = activos.id_activo;");

                                

                                    $result = mysqli_num_rows($query);
                                    if ($result > 0) {
                                        while ($data = mysqli_fetch_array($query)) {
                                            if ($data['f_foto'] != 'nodisponible.png' ) {
                                                $image = 'img/activos/'.$data['f_foto'];
                                                

                                            }else {
                                                $image = 'img/'.$data['f_foto'];
                                            }
                                            
                                            

                                            

                                    ?>

                            <tr>
                                <td><?php echo 'ACT-'.$data['id_activoFijo'] ?></td>
                                <td><?php echo $data['f_articulo'] ?></td>
                                <td><?php echo $data['nombre_activo'] ?></td>
                                <td><?php echo $data['f_stock'] ?></td>
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                

                                <td class="col-sm-2">

                                <div style="min-width: max-content;">
                                    
                                    <a class="btn btn-outline-success btn-sm gallery-item" id="<?php echo $image; ?> ">
                                    <i class="fa-solid fa-eye"></i> 
                                    </a>
                                
                                    

                                    
                                    <a data-bs-toggle="modal" data-bs-target="#exampleModali<?php echo $data['id_activoFijo']; ?> " class="btn btn-outline-danger btn-sm" href=""><i class="fa-solid fa-trash"></i> </a>
                                    <a data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $data['id_activoFijo']; ?> " class="btn btn-outline-warning btn-sm" href=""><i class="fa-solid fa-pencil"></i> </a>
                                    
                                </div>
                                    
                                    
                                    
                                </td>
                            </tr>

                            <!-- Modal editar  -->
                            <div class="modal fade" id="exampleModal<?php echo $data['id_inv']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="editar_inventario.php" method="post">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Editar a <?php echo $data['articulo'] ?> </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="card-header text-center " style="padding: 0; margin: 0;">
                                            <input type="hidden" name="eid_inv" value="<?php echo $data['id_inv']; ?>" >
                                            <label for="">Articulo detalle</label>
                                            <input name="earticulo" class="form-control" style="text-align: center;" type="text" value=" <?php echo $data['articulo'] ?>">
                                             
                                            </div>
                                                <div class="card-body " style="padding: 0;margin: 0;">

                                                    

                                                    <div class="alert alert-warning alert-dismissible fade show" role="alert"> 
                                                    <i class="fa-solid fa-user-lock"></i><strong> Stock </strong> <input class="form-control form-control-sm" style="text-align: center;" type="text"  id="dos" name="estock" value="<?php echo $data['stock'] ?>" >
                                                        
                                                    </div>

                                                    

                                                    <div>
                                                        <img style= "width:200px; heigth:200px;" src="<?php echo $image ?>" alt="" class="gallery-item"> 
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
                            <div class="modal fade " id="exampleModali<?php echo $data['id_activoFijo']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content  bg-opacity-80">
                                            <form action="eliminar_activoFijo.php" method="post">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Eliminar registro  </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="card-header text-center " style="padding: 0; margin: 0;">
                                            <input type="hidden" name="idAct" value="<?php echo $data['id_activoFijo']; ?>" >
                                            
                                            <input name="ename" class="form-control" style="text-align: center;" type="text" value=" <?php echo $data['f_articulo'] ?> " disabled>
                                            <input name="ename" class="form-control" style="text-align: center;" type="text" value=" <?php echo $data['f_stock'].' Bs' ?> " disabled>
                                             
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
                <div class="modal-dialog modal-dialog-centered " > 
                    <div class="modal-content modal-fullscreen ">
                    <div class="modal-header">
                        <!--<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>-->
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" >
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

        

        <script>$(document).ready(function () {
    $('#tablas').DataTable({
        pageLength: 5,
        lengthMenu: [
            [5, 10, 25,50,200, -1],
            [5, 10, 25,50,00, 'All'],
        ],
        language:{
            url:'js/Spanish.json'
        }
    });
});</script>


<script>
    document.addEventListener("click",function(e){
        if(e.target.classList.contains("gallery-item")){
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
                                document.getElementById("list").innerHTML = ['<img class="form-control" style="max-width:400px;" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
                        };
                    })(f);
            
                    reader.readAsDataURL(f);
                }
            }
                        
                document.getElementById('files').addEventListener('change', archivo, false);
        </script>
        <script type="text/javascript">
        function calcular_a_dolar(){
            try{
                var a = parseFloat(document.getElementById("bs").value) || 0;
                decimal = a.toFixed(2);
                proceso = decimal/6.96;
                result = proceso.toFixed(2);
                document.getElementById("dolar").value = result;
            } catch(e){}
        }

        function calcular_a_bs(){
            try{
                var b = parseFloat(document.getElementById("dolar").value) || 0;
                decimal = b.toFixed(2);
                proceso = decimal*6.96;
                result = proceso.toFixed(2);
                document.getElementById("bs").value = result;
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