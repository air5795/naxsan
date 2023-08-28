
  <?php require_once INCLUDES.'head.php' ?>
        



    
    <div class="container-fluid py-5">
      <div class="row">
        <div class="col-12 wrapper_notifications">

        </div>
      </div>
      <div class="row">
        <div class="col-lg-6 col-12">
            <div class="card mb-3">
              <div class="card-header">Informacion del Cliente</div>
              <div class="card-body">
                <form >
                  <div class="form-group row">
                    <div class="col-sm-12">
                      <label for="">Nombre</label>
                      <input type="text" class="form-control" id="nombre" name="nombre" placeholder="GOBIERNO AUTONOMO MUNICIPAL DE COLCHA 'K' "  required>
                    </div>
                    
                    <div class="col-sm-6">
                      <label for="">Nit</label>
                      <input type="text" class="form-control" id="nit" name="nit" placeholder="650123025" required  >
                    </div>
                    <div class="col-sm-6">
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
                <form id="add_to_quote" method="POST">
                  <div class="form-group row">
                    <div class="col-sm-12">
                      <label for="">Concepto</label>
                      <input type="text" class="form-control" id="concepto" name="concepto" placeholder="PARALANTES JBL EON 715 " require  >
                    </div>
                    <div class="col-sm-3">
                      <label for="">Marca</label>
                      <input type="text" class="form-control" id="marca" name="marca" placeholder=" JBL EON  " require  >
                    </div>
                    <div class="col-sm-3">
                      <label for="">Unidad / Medible</label>
                      <select name="unidad" id="unidad"  class="form-control">
                        <option value="unidad">Unidad</option>
                        <option value="caja">Caja</option>
                        <option value="pieza">Pieza</option>
                        <option value="equipo">Equipo</option>
                        <option value="Paquete">Paquete</option>
                        <option value="pliegue">Pliegue</option>
                        <option value="pliego">Pliego</option>
                        <option value="par">Par</option>
                        <option value="docena">Docena</option>
                        <option value="bidon">Bidon</option>
                        <option value="block">Block</option>
                        <option value="bolsa">Bolsa</option>
                        <option value="bote">Bote</option>
                      </select>
                    </div>
                    <div class="col-sm-2">
                      <label for="">Cantidad</label>
                      <input type="number" class="form-control" id="cantidad" name="cantidad" min="1" max="99999" value="1" required  >
                    </div>

                    <div class="col-sm-5">
                      <label for="precio_unitario">Precio U. de (Compra)</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">Bs</span>
                        </div>
                        <input type="number" class="form-control" id="precio_unitario_c" name="precio_unitario_c" placeholder="0.00" required>
                      </div>
                    </div>

                    <div class="col-5">
                      <label for="precio_unitario">Precio Unitario de (venta)</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">Bs</span>
                        </div>
                        <input type="number" class="form-control" id="precio_unitario_v" name="precio_unitario_v" placeholder="0.00" required>
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


















        <div class="col-lg-6 col-12">
          <div class="card">
            <div class="card-header">Resumen de Cotización</div>
            <div class="card-body wrapper_quote">
              <div class="table-responsive">
                
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>


  

    <?php require_once INCLUDES.'footer.php' ?>


































