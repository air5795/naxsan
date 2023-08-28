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
                    <h1 class="mt-4">Crear Cotizacion</h1>
                        
                        <ol class="breadcrumb mb-2 ">
                            <li class="breadcrumb-item active">Poncelet / Crear Cotizacion </li> 
                        </ol>
                    
                        
                    </div>   
                        
                        <hr>
                       <!-- contenido del sistema 2--> 
                        <!-- formulario de registro de usuarios-->


                        <div class="container-fluid py-1">
      <div class="row">
        <div class="col-lg-8 col-sm-12">
            <div class="card mb-3">
              <div class="card-header">Informacion del Cliente</div>
              <div class="card-body">
                <form action="">
                  <div class="form-group row">
                    <div class="col-sm-5">
                      <label for="">Nombre</label>
                      <input type="text" class="form-control" id="nombre" name="nombre" placeholder="GOBIERNO AUTONOMO MUNICIPAL DE COLCHA 'K' "  required>
                    </div>
                    <div class="col-sm-3">
                      <label for="">Nit</label>
                      <input type="text" class="form-control" id="nit" name="nit" placeholder="650123025" required  >
                    </div>
                    <div class="col-sm-4">
                      <label for="">Direccion</label>
                      <input type="text" class="form-control" id="direccion" name="direccion" placeholder="GAM COLCHA 'k'" required  >
                    </div>
                  </div>  
                </form>
              </div>
            </div>
            <div class="card mb-3">
              <div class="card-header">Nuevo Concepto</div>
              <div class="card-body">
                <form action="">
                  <div class="form-group row">
                    <div class="col-sm-9">
                      <label for="">Buscar Producto</label>
                      <input type="text" class="form-control" id="concepto" name="concepto" placeholder="PARLANTES JBL EON 715 " required  > <br>
                      <a class="btn btn-dark">Agregar a concepto</a>
                      <hr>
                    </div>
                    
                    
                    <div class="col-sm-9">
                      <label for="">Concepto (descripción)</label>
                      <input type="text" class="form-control" id="concepto" name="concepto" placeholder="PARLANTES JBL EON 715 " required  >
                    </div>
                    <div class="col-sm-3">
                      <label for="">Marca</label>
                      <input type="text" class="form-control" id="marca" name="marca" placeholder=" JBL  " required>
                    </div>
                    <div class="col-sm-2">
                      <label for="">Cantidad</label>
                      <input type="number" class="form-control" id="cantidad" name="cantidad" min="1" max="99999" value="1" required  >
                    </div>

                    <div class="col-sm-3">
                      <label for="">Unidad / Medible</label>
                      <input type="text" class="form-control" id="unidad" name="unidad"  required  >
                    </div>

                    <div class="col-sm-3">
                      <label for="precio_unitario">Precio Unitario de (Compra)</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-warning">$</span>
                        </div>
                        <input type="text" class="form-control" id="precio_unitario_c" name="precio_unitario_c" placeholder="0.00" required>
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <label for="precio_unitario">Precio Unitario de (Venta)</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-primary">$</span>
                        </div>
                        <input type="text" class="form-control" id="precio_unitario_v" name="precio_unitario_v" placeholder="0.00" required>
                      </div>
                    </div>
                  </div>
                  <br>
                  <button class="btn btn-success" type="submit" >Agregar Concepto</button>
                  <button class="btn btn-danger" type="reset" >Cancelar</button>
                </form>
              </div>
            </div>
        </div>



















        <div class="col-lg-4 col-sm-12">
          <div class="card">
            <div class="card-header">Resumen de Cotización</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Concepto</th>
                      <th>Cantidad</th>
                      <th>Precio</th>
                      <th>SubTotal</th>
                    </tr>
                  </thead>
                  <tbody>

                    <tr>
                      <td>Guitarra Electrica Ibañez</td>
                      <td>1</td>
                      <td  style="text-align: right;">185 bs</td>
                      <td  style="text-align: right;">185 bs</td>
                    </tr>

                    <tr>
                      <td  style="text-align: right;" colspan="3">Sub TOTAL</td>
                      <td  style="text-align: right;">185 bs</td>
                    </tr>
                    <tr>
                      <td  style="text-align: right;" colspan="3">Impuestos</td>
                      <td  style="text-align: right;">185 bs</td>
                    </tr>
                    <tr>
                      <td style="text-align: right;" colspan="3">Transporte</td>
                      <td style="text-align: right;">70 bs</td>
                    </tr>
                    <tr>
                      <td style="text-align: right;" colspan="4"> <b>Total:</b> <h3 class="text-success"><b> 242 bs</b></h3></td>
                      
                    </tr>
                  </tbody>

                  

                </table>
              </div>
              <div class="card-footer">
                  <button class="btn btn-primary" type="submit" >Descargar PDF</button>
                  <button class="btn btn-success" type="reset" >Enviar por CORREO</button>
              </div>
            </div>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>