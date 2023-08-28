<?php
    
    session_start();
    include "../conexion.php";

    $query = mysqli_query($conexion, "SELECT * FROM ingresos_c");
    $result = mysqli_num_rows($query);
    if ($result > 0) {
        while ($data = mysqli_fetch_array($query)) {
             $num = $data['id_ingresosC'];
             
        }}

        $sql_tfila = mysqli_query($conexion, "SELECT COUNT(id_ingresosC) FROM ingresos_c;");
        $result_f = mysqli_fetch_array($sql_tfila);
        $total2 = $result_f['COUNT(id_ingresosC)'];
        $total3 =  $total2 + 1;


    if (!empty($_POST)) {


        if (empty($_POST['proyecto'])  
        || empty($_POST['monto_bs']) 
        || empty($_POST['monto_dolares'])
        || empty($_POST['origen'])
        || empty($_POST['fecha'])) {
            $alert = '<p class="alert alert-danger "> Llenar los campos faltantes</p> ';
       } 
       else 
     {
            
            $proyecto = $_POST['proyecto'];
            $Origen = $_POST['origen'];
            $monto_bs = $_POST['monto_bs'];
            $monto_dolares = $_POST['monto_dolares'];
            $fecha = $_POST['fecha'];
            $respaldo = $_FILES['respaldo'];
            $num = $total2 +1;


             //imagen 1
  
             $nombre_image = $respaldo['name'];
             $type = $respaldo['type'];
             $url_temp = $respaldo['tmp_name'];
 
             $imgProducto = 'nodisponible.png';
 
             if ($nombre_image != '') {
                 $destino = 'img/cajaChica_c/';
                 $img_nombre = 'respaldo'.$num.'_1_'.$fecha;
                 //$img_nombre = 'acta_'.$ubicacion.'-'.$fecha_ejecucion.date('H:m:s');
                 $imgActa = $img_nombre.'.jpg';
                 $src= $destino.$imgActa;
             }
            


             

             



                    $query_insert = mysqli_query($conexion, "INSERT INTO ingresos_c(
                        proyecto,
                        origen,
                        montoBs,
                        montoU,
                        fecha_i,
                        respaldo  
                    )
                    VALUES(
                        '$proyecto',
                        '$Origen',
                        '$monto_bs',
                        '$monto_dolares',
                        '$fecha',
                        '$imgActa'
                        
                    )");


            if ($query_insert) {
                if ($nombre_image != '' ) {
                    move_uploaded_file($url_temp,$src);
                    
                    
                
                } 
                $alert = '<p class="alert alert-success"> Guardado Correctamente </p> ';
                header("Location: ingresos_c.php");

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
        <title>SIS-NAXSAN</title>
        
    </head>
    <body class="sb-nav-fixed">
    <?php  include "includes/header.php";?>
    

        <!-- contenido del sistema-->

        <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                    <div class="container-fluid px-4 ">
                
                <h1 class="mt-4 col"><i class="fa-solid fa-cash-register"></i>  <strong>Registro  <span> CAJA CHICA NA<SPAN style="color:red">XS</SPAN>AN </strong>  <span style="color:#9fd591;"> Ingresos  
                <i class="fa-solid fa-square-caret-up"></i></span></h1>
                  
                        
                        <hr>

                        
                                                    
                        

                        
                       <!-- contenido del sistema 2--> 
                        <!-- formulario de registro de usuarios-->


                        <div class="row">
                        
                        
                        <div class="col">
                        
                        





                        <form action="ingresos_c.php" method="post" class="fields was-validated " enctype="multipart/form-data" novalidate >

                        

                        <div class="row " style="background-color: honeydew;">
                            

                        

                            

                            

                            <a class="btn alert alert-dark  disabled" role="button" aria-disabled="true">N° de registro: <?php echo $total3 ?> </a> 

                            <div class="col-md-6">
                                <div class=" mb-3 mb-md-0">
                                <span for="inputFirstName">CAJA CHICA</span> 
                                    <select style="width: 100%;font-size:12px ;" name="proyecto" id="select" class="form-control  select" required >
                                        <option value="" >Seleccione una opción : </option>
                                        <?php
                                            $query = mysqli_query($conexion, "SELECT * from proyectos ORDER BY pro_nombre ASC;");
                                            $result = mysqli_num_rows($query);
                                            if ($result > 0) {
                                            while ($data = mysqli_fetch_array($query)) {
                                                echo '<option value="'.$data['pro_nombre'].'">'.$data['pro_nombre'].'</option>';
                                                $nombre = $data['p_descripcion'];
                                            }}
                                        ?>
                                    </select>
                                    </div>

                            </div>

                            <div class="col-md-6">
                                <div class=" mb-3 mb-md-0">
                                    <span for="inputFirstName">Origen Dinero </span> 
                                    <input class="form-control form-control-sm  " id="origen" name="origen" type="text"  required />
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class=" mb-3 mb-md-0">
                                    <span for="inputFirstName">Monto en Bs.</span> 
                                    <input class="form-control form-control-sm money" id="bs" name="monto_bs" type="number" step='0.001'  placeholder='0.00' oninput="calcular_a_dolar()" required/>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class=" mb-3 mb-md-0">
                                    <span for="inputFirstName">Monto en $u$ </span> 
                                    <input class="form-control form-control-sm money " id="dolar" name="monto_dolares" type="number" step='0.001'  placeholder='0.00' oninput="calcular_a_bs()" required />
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class=" mb-3 mb-md-0">
                                    <span for="inputFirstName">Fecha </span> 
                                    <input class="form-control form-control-sm" name="fecha" type="date" required />
                                </div>
                            </div>

                            

                            <div class="col-md-8">
                                <div class=" mb-3 mb-md-0">
                                <span for="inputFirstName">Respaldo </span> 
                                <input type="file" class="form-control form-control-sm"  name="respaldo" id="files" >
                                </div>
                            </div> 

                            

                            
                        </div>




                            <hr class="w-100">
                            <!-- selector--> 

                            
                            

                            <div class="row">
                                <div class="" role="alert" style=""> <?php echo isset ($alert) ? $alert :''; ?></div>
                                
                                <input type="submit" value="Registrar Ingreso" class="btn btn-success  border-0 " data-dismiss="alert" >
                                
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

                        

                        <div class="col">
                        <?php
                            $sql_suma_bs = mysqli_query($conexion, "SELECT SUM(g_montoBs) FROM gastos_c;");
                            $result_sum = mysqli_fetch_array($sql_suma_bs);
                            $total = $result_sum['SUM(g_montoBs)']; 

                            $sql_suma_bs2 = mysqli_query($conexion, "SELECT SUM(montoBs) FROM ingresos_c;");
                            $result_sum2 = mysqli_fetch_array($sql_suma_bs2);
                            $total2 = $result_sum2['SUM(montoBs)'];

                            
                            
                            $saldo = $total2 - $total;

                            

                        ?>
                            <div class="">

                            
                            
                            <table >
                            <table  id="tablas"  class="table table-bordered table-hover" style="font-size:11px ;"  >
                                <thead class="table-secondary">
                                    <tr class="">
                                        
                                        <th>N°</th>
                                        <th>DETALLE</th>
                                        <th>Origen de Dinero</th>
                                        <th>Monto(Bs)</th>
                                        <th>Fecha de Ingreso</th>
                                        <th>Monto($)</th>
                                        
                                        
                                        <th>Acciones</th>    
                                    </tr>
                                    </thead>
                                    <?php
                    
                                    // rescatar datos DB 
                                    $query = mysqli_query($conexion, "SELECT * FROM ingresos_c
                                    ORDER BY id_ingresosC DESC;");

                                

                                    $result = mysqli_num_rows($query);
                                    if ($result > 0) {
                                        while ($data = mysqli_fetch_array($query)) {
                                            if ($data['respaldo'] != 'nodisponible.png' ) {
                                                $image = 'img/cajaChica_c/'.$data['respaldo'];
                                                

                                            }else {
                                                $image = 'img/'.$data['respaldo'];
                                            }
                                            
                                            

                                            

                                    ?>

<tr>
                                <td><?php echo $data['id_ingresosC'] ?></td>
                                <td><?php echo $data['proyecto'] ?></td>
                                <td><?php echo $data['origen'] ?></td>
                                <td class=" bg-success bg-opacity-10"><?php echo number_format($data['montoBs'],2,'.',',').' Bs' ?></td>
                                
                                <td><?php 
                                    setlocale(LC_TIME, "spanish");
                                    echo strftime('%e de %B %Y', strtotime($data['fecha_i']));
                                    ?>
                                </td>
                                <td class=" bg-success bg-opacity-10"><?php echo number_format($data['montoU'],2,'.',',').' $' ?></td>
                                
                                
                                
                                
                                
                                

                                <td class="col-sm-2">

                                <div style="min-width: max-content;">
                                    
                                    <a class="btn btn-success btn-sm gallery-item" id="<?php echo $image; ?> ">
                                    <i class="fa-solid fa-eye"></i> 
                                    </a>
                                
                                    

                                    
                                    <a data-bs-toggle="modal" data-bs-target="#exampleModali<?php echo $data['id_ingresosC']; ?> " class="btn btn-outline-danger btn-sm" href=""><i class="fa-solid fa-trash"></i> Eliminar </a>

                                    
                                </div>
                                    
                                    
                                    
                                </td>
                            </tr>

                            <!-- Modal eliminar  -->
                            <div class="modal fade " id="exampleModali<?php echo $data['id_ingresosC']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content  bg-opacity-80">
                                            <form action="eliminar_ingresos_c.php" method="post">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Eliminar registro  </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="card-header text-center " style="padding: 0; margin: 0;">
                                            <input type="hidden" name="idIngreso" value="<?php echo $data['id_ingresosC']; ?>" >
                                            
                                            <input name="ename" class="form-control" style="text-align: center;" type="text" value=" <?php echo $data['proyecto'] ?> " disabled>
                                            <input name="ename" class="form-control" style="text-align: center;" type="text" value=" <?php echo $data['montoBs'].' Bs' ?> " disabled>
                                             
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

<script type="text/javascript">
            // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            $('.select').select2({
            placeholder: "Buscar en base de datos (Productos)",
            allowClear: true , 
            theme: "classic",
            minimumInputLength: 1,
            language: "es",
            });
            
            
        });
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