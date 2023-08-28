<?php
    session_start();
    include "../conexion.php";
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
                    <div>
                    <h1 class="mt-4"><i class="fa-solid fa-calculator"></i> Calculadora de Experiencia Comercializadora </h1>    
                        <ol class="breadcrumb mb-2 ">
                            <li class="breadcrumb-item active">Poncelet / Calcular Experiencia</li> 
                        </ol>
                    </div>   
                        
                        <hr>
                       <!-- calculadora 1--> 
                        
                       <form action="calComer.php" method="post">
                       <div class="row mb-3">
                            

                            <div class="col-md-3">

                             <div class=" mb-3 mb-md-0">
                                    <span for="inputFirstName">Fecha Inicial</span> 
                                    <input class="form-control form-control-sm money" name="FechaI" type="date"  required />
                                 </div>
                             </div>

                             <div class="col-md-3">
                                 <div class=" mb-3 mb-md-0">
                                    <span for="inputFirstName">Fecha Final.</span> 
                                    <input class="form-control form-control-sm money" name="FechaF" type="date"   required/>
                                 </div>
                             </div>

                             <?php

                             if (!empty($_POST['FechaI']) || !empty($_POST['FechaF'])) {
                                
                             

                             
                             
                             $a = $_POST['FechaI'];
                             $b = $_POST['FechaF'];

                            $date1 = new DateTime("$a");
                            $date2 = new DateTime("$b");
                            $result = date_diff($date1,$date2);

                            $tiempo = array();

                            foreach ($result as $valor) {
                                $tiempo[]=$valor;
                            }
                            // will output 2 days
                            //echo $diff->days . ' dias ';



                            ?>
                             
                             

                             <div class="col-md-3">
                                 <div class=" mb-3 mb-md-0">
                                    <span for="inputFirstName">Resultado</span> 
                                    <input class="form-control form-control-sm warning" id="bs" name="resultado" type="text" 
                                    value="<?php
                                            echo $tiempo[0]." Años - ". $tiempo[1]." meses - ". $tiempo[2]." dias || " . $tiempo[11]." dias";
                                            ?>" />

                                            
                                 </div>
                             </div>

                             <p class="alert alert-info"></p>

                             <?php
                             
                            
                        } else {
                            echo "<p class='alert alert-danger col-md-3 '> LLenar los Datos </p> ";
                        }
                             
                             ?>
                             </p>

                        </div>


                        

                            <div class="col-md-3">
                                 <div class=" mb-3 mb-md-0">
                                    <input type="submit" value="Calcular la Experiencia">
                                 </div>
                             </div>


                        </form>
                        <hr>


                            

                        

                    
                        

                        
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>



