            <?php if(empty($d->items)) : ?>
                    <div class="text-center">
                        <h3>La cotizacion esta Vacia</h3>
                        <img src="<?php echo IMG.'vacio.png';?>" style="width:150px;" class="img-fluid">
                    </div>
                <?php else: ?>

                    <table class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Concepto</th>
                                <th>Marca</th>
                                <th>U/M</th>
                                <th>Cantidad</th>
                                
                                <th>Precio Venta</th>
                                <th>Total Venta</th>
                                <th></th>
                                <th>Precio Compra</th>
                                <th>Total Compra</th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($d -> items as $item): ?>
                            <tr>
                            <td><?php echo $item->concepto; ?></td>
                            <td><?php echo $item->marca; ?></td>
                            <td><?php echo $item->unidad; ?></td>
                            <td class="text-right"><?php echo $item->cantidad; ?></td>
                            
                            <td class="text-right"  style="background-color: #fff3e5"><?php echo 'Bs '.number_format($item->precio_v); ?></td>
                            <td class="text-right"  style="background-color: #fff3e5"><?php echo 'Bs '.number_format($item->subtotal_v); ?></td>
                            <td></td>
                            <td class="text-right " style="background-color: #e5ffeb"><?php echo 'Bs '.number_format($item->precio_c); ?></td>
                            <td class="text-right " style="background-color: #e5ffeb"><?php echo 'Bs '.number_format($item->subtotal_c); ?></td>
                            
                        <?php endforeach; ?>  
                        

                        <tr>
                            <td class="text-right" colspan="5">Sub Total</td>
                            <td class="text-right"><?php echo 'Bs '.number_format($d->total_c); ?></td>
                            
                        </tr>
                       

                        <tr>
                            <td class="text-right" colspan="5">Impuestos</td>
                            <td class="text-right"><?php echo 'Bs '.number_format($d->taxes); ?></td>
                            
                            
                        </tr>
                        <tr>
                            <td class="text-right" colspan="5">Envio Transporte u otros</td>
                            <td class="text-right"><?php echo 'Bs '.number_format($d->shipping); ?></td>
                            
                            
                        </tr>

                        <tr>
                            <td class="text-right" colspan="6"> <b>TOTAL VENTA</b> <h3 class="text-success"> <b> <?php echo 'Bs '.number_format($d->total_neto_v); ?></b></h3></td>
                            <td class="text-right" colspan="6"> <b>TOTAL COMPRA</b> <h3 class="text-success"> <b> <?php echo 'Bs '.number_format($d->total_neto_c); ?></b></h3></td>
                           
                        </tr>

                        
                        </tbody>

                        

                    </table>

                    <div class="card-footer">
                  <button class="btn btn-primary" type="submit" >Descargar PDF</button>
                  <button class="btn btn-success" type="reset" >Enviar por CORREO</button>
              </div>

                <?php endif ; ?>
            
            
            