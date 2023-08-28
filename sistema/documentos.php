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
        <title>NAXSAN</title>

       
        
    </head>
    <body class="sb-nav-fixed">
    <?php include "includes/header.php";?>
    

        <!-- contenido del sistema-->

        <div id="layoutSidenav_content">
                <main>
                <div class="container-fluid px-4 row">
                
                
                <h1 class="mt-4 col"><i class="fa-solid fa-folder-open"></i> Lista de Documentos de la Empresa</h1>   
                        
                        <hr>
                       <!-- contenido del sistema 2--> 

                        <div class="card">

                        
                       <div class="container text-center">
                            <div class="row">
                                <div class="col">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h3 style="color: #ff5301; padding: 10px; text-align: left;">Cargar Documentos</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="col">
                                            <form style="text-align: left;" method="POST" action="documentos_CargarFicheros.php" enctype="multipart/form-data">
                                                <div style="text-align: left;" class="form-group btn btn-danger p-2">
                                                    <label class="btn btn-primary" for="my-file-selector">Carga tu Archivo aqui<br><br>
                                                    <input required="" type="file" name="file" id="exampleInputFile"> 
                                                    </label>
                                                </div> <br><br>
                                                <button  class="btn btn-primary " type="submit">Subir archivo al sistema --></button>
                                            </form>
                                        </div>
                                    </div>          
                                </div>



                                </div>
                                <div class="col">
                                     <!--tabla-->
                            <div class="card navbar col align-self-end" style="font-size: 12px;">
                                 <div class="card-body">
                                    <table class="table table-bordered ">
                                        <thead class="table-light">
                                            <tr>
                                            <th width="10%">#</th>
                                            <th width="40%">Nombre del Archivo</th>
                                            <th width="40%">Fecha de subida </th>
                                            <th width="5%">Descargar</th>
                                            
                                            <th width="5%">Eliminar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $archivos = scandir("subidas");
                                        $num=0;
                                        for ($i=2; $i<count($archivos); $i++)
                                        {$num++;


                        
                                        ?>
                                            <th scope="row"><?php echo $num;?></th>
                                            <td><?php echo $archivos[$i]; ?></td>
                                            <td style="color:#ff5301">
                                                <?php 
                                                
                                                //'subidas/'.$archivos[$i]
                                               
                                                //echo "Last change: ".date("F d Y H:i:s.",filectime('subidas/'.$archivos[$i]));
                                                $nombre_archivo = ('subidas/'.$archivos[$i]);
                                                if (file_exists($nombre_archivo)) {
                                                    echo  date("d-M-Y ", filectime($nombre_archivo));
                                                }
                                                

                                
                                                 ?>

                                            </td>
                                            <td><a title="Descargar Archivo" href="subidas/<?php echo $archivos[$i]; ?>" download="<?php echo $archivos[$i]; ?>" class="btn btn-primary" style="font-size:14px;"> <i class="fa-solid fa-download"></i> Descargar </a></td>
                                            <td><a title="Eliminar Archivo" href="documentos_Eliminar.php?name=subidas/<?php echo $archivos[$i]; ?>" class="btn btn-danger" style="font-size:14px;" onclick="return confirm('Esta seguro de eliminar el archivo?');"> <i class="fa-solid fa-trash"></i> Eliminar </a></td>
                                            </tr>
                                        <?php }?> 

                                        </tbody>
                                        </table>
                                </div>
                            </div>
                        <!-- Fin tabla--> 

                        </div>




                                </div>
                                
                            </div>
                        </div>


                       

                                


                       
                        
                        
                       



                    
                        

                        
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy;axsanempresa@gmail.com @airsoft</div>
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
        <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
    </body>
</html>