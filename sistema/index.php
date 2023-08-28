
<?php
    session_start();
    include "includes/scripts.php";
    include "includes/header.php";
    include "../conexion.php"; 

    $sql_suma_bs = mysqli_query($conexion, "SELECT SUM(monto_bs) FROM exp_general;");
                            $result_sum = mysqli_fetch_array($sql_suma_bs);
                            $total = $result_sum['SUM(monto_bs)']; 

                            $sql_tfila = mysqli_query($conexion, "SELECT COUNT(id_exp) FROM exp_general;");
                            $result_f = mysqli_fetch_array($sql_tfila);
                            $total2 = $result_f['COUNT(id_exp)']; 

                            $sql_suma_bs = mysqli_query($conexion, "SELECT SUM(monto_bs) FROM exp_general_c;");
                            $result_sum = mysqli_fetch_array($sql_suma_bs);
                            $total3 = $result_sum['SUM(monto_bs)']; 

                            $sql_tfila = mysqli_query($conexion, "SELECT COUNT(id_exp) FROM exp_general_c;");
                            $result_f = mysqli_fetch_array($sql_tfila);
                            $total4 = $result_f['COUNT(id_exp)'];

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <title>NAXSAN</title>
        
    </head>
    <body class="sb-nav-fixed">
    

        <!-- contenido del sistema-->

        <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4 p-2">
                        <div class="alert alert-warning alert-dismissible fade show " role="alert" style="background-color: #ebebeb;border:none;"> 
                             <?php echo $_SESSION['nombre']  ?>  <strong> Bienvenido al Sistema ! <br></strong> En este sistema encontraras una serie de herramientas para la automatizacion del manejo de la informacion en NAXSAN.
                            <button type="button" class=" btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>

                        <hr>

                        

                        <!--Home Content-->

                        <?php
                            $query = mysqli_query($conexion, "SELECT monto_ofertado,fecha,nombre  FROM proyectos_comer  order by fecha DESC limit 10");
                            foreach ($query as $data) {
                                $monto[]    = $data['monto_ofertado'];
                                //$fecha[]    = $data['fecha'];
                                $nombre[]   = $data['nombre'].' FECHA: '.$data['fecha'];

                            }

                        ?>

                        



                        <div class="home-content">
                            <div class="overview-boxes">

                                <div class="box">
                                    <div class="left-side">
                                        <div class="box_topic">N° de Proyectos Comercializadora</div>
                                        <div class="number"><?php echo $total2 ?></div>
                                        <div class="indicator">
                                            <i class="kk"></i>
                                            <span class="text">Comercializadora/NAXSAN</span>
                                        </div>
                                    </div>

                                    <i class="fa-solid fa-cart-shopping cart"></i>
                                </div>

                                <div class="box">
                                    <div class="left-side">
                                        <div class="box_topic">Experiencia Total en (bs) Comercializadora</div>
                                        <div class="number"><?php echo ''.number_format($total,2,'.',','). ' Bs' ?></div>
                                        <div class="indicator">
                                            <i class="kk"></i>
                                            <span class="text">Comercializadora/NAXSAN</span>
                                        </div>
                                    </div>

                                    <i class="fa-solid fa-cart-shopping cart"></i>
                                </div>


                                <div class="box">
                                    <div class="left-side">
                                        <div class="box_topic">N° de Proyectos Constructora</div>
                                        <div class="number"><?php echo $total4 ?></div>
                                        <div class="indicator">
                                            <i class="k"></i>
                                            <span class="text">Constructora/NAXSAN</span>
                                        </div>
                                    </div>

                                    <i class="fa-solid fa-person-digging cons"></i>
                                </div>


                                <div class="box">
                                    <div class="left-side">
                                        <div class="box_topic">Experiencia Total en (bs) Constructora</div>
                                        <div class="number"><?php echo ''.number_format($total3,2,'.',','). ' Bs' ?></div>
                                        <div class="indicator">
                                            <i class="k"></i>
                                            <span class="text">Constructora/NAXSAN</span>
                                        </div>
                                    </div>

                                    <i class="fa-solid fa-person-digging cons"></i>
                                </div>

                                
                            </div>
                        </div>

                        <hr>

                        <?php 
                                

                                $sql_pro = mysqli_query($conexion, "SELECT COUNT(*) FROM proyectos_comer WHERE  estado = 'adjudicado';");
                                $res = mysqli_fetch_array($sql_pro);
                                $r = $res['COUNT(*)']; 

                                ?>


                            
                                
                                <div class="card mb-4">
                                    <div class="card-header alert alert-warning" style="background-color: #ebebeb;border:none;">     
                                        <strong class="alert alert-warning  " style="background-color: #ebebeb;border:none;"> <i class="fas fa-chart-area me-1"></i> Proyectos Pendientes de Pago Comercializadora :  <?PHP echo $r; ?> </strong>
                                    </div>
                                    <div class="card-body"><canvas id="myChart" width="150%" height="20%"></canvas></div>
                                    <div class="card-footer small text-muted">Actualizacion <?php echo date('d/m/y');?></div>
                                </div>
                                
                                
                            
                        
                        
                                            


                        
                                               

                        


                            
                            

                            

                                                
                                        
                                    



                        


                        
                        
                        

                        
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; axsanempresa@gmail.com @airsoft</div>
                            <div>
                                
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

        <script>

    
var data = {
  labels: <?php echo json_encode($nombre) ?> ,
  
  datasets: [
      {
      stack:1,
      label: "Monto Ofertado (Bs) :",
      backgroundColor: [
      'rgba(255, 99, 132, 0.2)',
      'rgba(255, 159, 64, 0.2)',
      'rgba(255, 205, 86, 0.2)',
      'rgba(75, 192, 192, 0.2)',
      'rgba(54, 162, 235, 0.2)',
      'rgba(201, 203, 207, 0.2)'
    ],
    borderColor: [
      'rgb(255, 99, 132)',
      'rgb(255, 159, 64)',
      'rgb(255, 205, 86)',
      'rgb(75, 192, 192)',
      'rgb(54, 162, 235)',
      'rgb(201, 203, 207)'
    ],
      borderWidth: 1,
      data: <?php echo json_encode($monto)?>,
      yAxisID:1
    },
    
    
  ],
   
};

var options = {
  indexAxis: "y",

}

Chart.defaults.font.size = 10;
var ctx = document.getElementById("myChart").getContext("2d");
var myBarChart = new Chart(ctx, {
  type: 'bar',
  data: data,
  options: options
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
