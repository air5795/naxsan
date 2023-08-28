<?php
    
    session_start();
    
    include "../conexion.php";
    

    if (!empty($_POST)) {
        $alert = '';
        if (empty($_POST['nombre_contratante']) 
        || empty($_POST['obj_contrato']) 
        || empty($_POST['ubicacion']) 
        || empty($_POST['monto_bs']) 
        || empty($_POST['monto_dolares']) 
        || empty($_POST['fecha_ejecucion'])  
        || empty($_POST['profesional_resp'])) {
            $alert = '<p class="alert alert-danger w-50"> Todos los Campos Son Obligatorios </p> ';
        } else {
            
            $idExp = $_POST['id_exp'];
            $nombre_contratante = $_POST['nombre_contratante'];
            $obj_contrato = $_POST['obj_contrato'];
            $ubicacion = $_POST['ubicacion'];
            $monto_bs = $_POST['monto_bs'];
            $monto_dolares = $_POST['monto_dolares'];
            $fecha_ejecucion = $_POST['fecha_ejecucion'];
            $participa_aso = $_POST['participa_aso'];
            $n_socio = $_POST['n_socio'];
            $profesional_resp = $_POST['profesional_resp'];
            

            
            $query = mysqli_query($conexion,"SELECT * FROM exp_general 
                                                      WHERE (id_exp = $idExp)");
            $resul = mysqli_fetch_array($query);

            if ($resul = 0) {
                $alert  = $alert = '<p class="alert alert-danger w-50"> No esta disponible </p> ';
            }else {

            $sql_update = mysqli_query($conexion, "UPDATE
                                                    exp_general_c
                                                    SET
                                                        nombre_contratante = '$nombre_contratante',
                                                        obj_contrato = '$obj_contrato ',
                                                        ubicacion = '$ubicacion',
                                                        monto_bs = $monto_bs,
                                                        monto_dolares = $monto_dolares,
                                                        fecha_ejecucion = '$fecha_ejecucion',
                                                        participa_aso = '$participa_aso',
                                                        n_socio = '$n_socio',
                                                        profesional_resp = '$profesional_resp'
                                                    WHERE
                                                        id_exp = $idExp");    
                }

                if ($sql_update) {
                    $alert = '<p class="alert alert-success"> SE ACTUALIZO CORRECTAMENTE </p> ';
                    header('Location: lista_exp_c.php');
                }
                else{
                    $alert = '<p class="alert alert-danger w-50"> LA ACTUALIZACION FALLO </p> ';
                    

                }
            }
        }


    //mostrar datos

    if (empty($_GET['id'])) 
    {
        header('Location: lista_exp_c.php');
    }


    $id_exp = $_GET['id'];
    $sql= mysqli_query($conexion,"SELECT id_exp, nombre_contratante, obj_contrato, ubicacion, monto_bs, monto_dolares, fecha_ejecucion, participa_aso, n_socio, profesional_resp,image,image2,image3
                                FROM exp_general_c 
                                WHERE id_exp = $id_exp"); // colocar la variable rescatada de GET 

    $result_sql = mysqli_num_rows($sql);

    if ($result_sql == 0) {
        header('Location: lista_exp.php');
    }else {

        while ($data = mysqli_fetch_array($sql)) {
            $id_exp = $data['id_exp'];
            $n_c = $data['nombre_contratante'];
            $obj_c = $data['obj_contrato'];
            $ubi = $data['ubicacion'];
            $m_bs = $data['monto_bs'];
            $m_dolores = $data['monto_dolares'];
            $f_ejecucion = $data['fecha_ejecucion'];
            $p_aso = $data['participa_aso'];
            $n_scio = $data['n_socio'];
            $p_resp = $data['profesional_resp'];

            if ($data['image'] != 'nodisponible.png' ) {
                $image = 'img/actas_c/'.$data['image'];
                

            }else {
                $image = 'img/'.$data['image'];
            }
            
            $image2 = 'img/actas_c/'.$data['image2'];
            $image3= 'img/actas_c/'.$data['image3'];
            
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
                
                <div class="container-fluid px-4 ">
                <div class="container-fluid px-4 row">
                
                
                    <h1 class="mt-4 col"><i class="fa-solid fa-triangle-exclamation"></i> Editar Experiencia <a class="btn btn-warning btn-sm disabled"> Que Corresponde a : <strong> <?php echo $n_c;?> </strong></a></h1> 
                            
                    </div>   
                        
                        <hr>
                       <!-- contenido del sistema 2--> 
                        <!-- formulario de registro de usuarios-->



                    <div class="form_register  container px-4 ">

                    <div class=" container-register2 row ">
                        
                        
                        <form action="" method="post">

                            <input type="hidden" name="id_exp" value="<?php echo $id_exp;?>">

                            <div class=" mb-3 caja">
                                    <span for="inputFirstName">Nombre del Contratante / Persona y Dirección de Contacto</span>
                                    <input  class="form-control form-control-sm " name="nombre_contratante" type="text" value="<?php echo $n_c;?>" />
                            </div>

                            <div class=" mb-3 caja">
                                    <span for="inputFirstName">Objeto del Contrato (Obra similar)</span> 
                                    <input class="form-control form-control-sm" name="obj_contrato" type="text"  value="<?php echo $obj_c;?>"/>
                            </div>

                             <hr>
                            <div class="row">
                                    <div class="col-md-6">
                                        <div class=" mb-3 mb-md-0">
                                            <span for="inputFirstName">Ubicación</span> 
                                            <input class="form-control form-control-sm" name="ubicacion" type="text" value="<?php echo $ubi;?>"  />
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class=" mb-3 mb-md-0">
                                            <span for="inputFirstName">Monto en Bs.</span> 
                                            <input class="form-control form-control-sm money" id="bs" name="monto_bs" type="number" step='0.001'  placeholder='0.00' oninput="calcular_a_dolar()" value="<?php echo $m_bs;?>" />
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class=" mb-3 mb-md-0">
                                            <span for="inputFirstName">Monto en $u$ </span> 
                                            <input class="form-control form-control-sm money " id="dolar" name="monto_dolares" type="number" step='0.001'  placeholder='0.00' oninput="calcular_a_bs()" value="<?php echo $m_dolores;?>" />
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class=" mb-3 mb-md-0">
                                            <span for="inputFirstName">Período de ejecución </span> 
                                            <input class="form-control form-control-sm" name="fecha_ejecucion" type="date" value="<?php echo $f_ejecucion;?>" />
                                        </div>
                                    </div>

                                    

                                    <div class="col-md-6">
                                        <div class=" mb-3 mb-md-0">
                                            <span for="inputFirstName">% participación en Asociación (**)</span> 
                                            <input class="form-control form-control-sm" name="participa_aso" type="text" value="<?php echo $p_aso;?>" />
                                        </div>
                                    </div> 

                                    <div class="col-md-6">
                                        <div class=" mb-3 mb-md-0">
                                            <span for="inputFirstName">Nombre Ll del Socio(s) (***)</span> 
                                            <input class="form-control form-control-sm" name="n_socio" type="text" value="<?php echo $p_aso;?>" />
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class=" mb-3 mb-md-0">
                                            <span for="inputFirstName">Profesional Responsable (****)</span> 
                                            <input class="form-control form-control-sm warning" name="profesional_resp" type="text" value="<?php echo $p_resp;?>"/>
                                        </div>
                                    </div>

                                    <div class=" col-md-6"> <hr>

                                        <td>
                                            <img style= "width:200px; heigth:200px;" src="<?php echo $image ?>" alt="" class="gallery-item"> 
                                        </td>
                                        <td>
                                            <img style= "width:200px; heigth:200px;" src="<?php echo $image2 ?>" alt="" class="gallery-item"> 
                                        </td>
                                        <td>
                                            <img style= "width:200px; heigth:200px;" src="<?php echo $image3 ?>" alt="" class="gallery-item"> 
                                        </td>

                                        </div>
                                        </div>
                            
                                    <hr class="w-100">     
                                    <center><input type="submit" value="Actualizar Experiencia " class="btn btn-success  border-0 w-50   " data-dismiss="alert" ></center>
                                    <div class=" form-text text-center " role="alert" style=""> <?php echo isset ($alert) ? $alert :''; ?></div>
                            
                       </form>

                       
                    </div>
                        
                    </div>

                                    <div class="modal fade" id="gallery-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-xl" >
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
        <script>
    document.addEventListener("click",function(e){
        if(e.target.classList.contains("gallery-item")){
            const src = e.target.getAttribute("src");
            document.querySelector(".modal-img").src = src;

            const myModal = new bootstrap.Modal(document.getElementById('gallery-modal'));
            myModal.show();
        }
    });
</script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>