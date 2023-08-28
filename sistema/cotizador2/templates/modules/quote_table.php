<?php if(empty($d->items)) : ?>
                    <div class="text-center">
                        <h3>La cotizacion esta Vacia</h3>
                        <img src="<?php echo IMG.'vacio.png';?>" style="width:150px;" class="img-fluid">
                    </div>
<?php else: ?>

    <form id="mandar">

    
    
                    <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered table-sm">
                        <thead style="font-size:12px ;">
                            <tr style="color:black">
                                <th ><p class="text-right " style="width:max-content; text-align:center;padding:0;margin:0;"><?php echo sprintf('Cotizacion #%s',$d->number) ; ?></p></th>
                                <?php echo '<input type="hidden" name="n_cotizacion" id="" value="'.$d->number.'">' ?>
                                <th style="width:40% ;">Concepto</th>
                                <th>Marca</th>
                                <th>Cantidad</th>
                                <th>Precio Venta</th>
                                <th>Subtotal Venta</th>
                                <th>Precio Compra </th>
                                <th>Subtotal Compra</th>
                                
                            </tr>
                        </thead>
                        <tbody style="font-size:12px ;" >


                        <?php foreach ($d -> items as $item): ?>
                            <tr>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-sm btn-secondary edit_concept"  data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="<?php echo $item->id; ?>"><i class="fa-solid fa-pen-to-square"></i> Editar</button>
                                        <button class="btn btn-sm btn-danger delete_concept" data-id="<?php echo $item->id; ?>"><i class="fa-solid fa-trash-can"></i></button>
                                    </div>
                                </td>
                                <td style="font-size:12px ;">
                                    <?php echo $item->concept; ?>
                                    <?php echo '<input type="hidden" name="concepto" id="" value="'.$item->concept.'">' ?>

                                    <small class="text-muted d-block">
                                        <?php echo $item->type ?>
                                        <?php echo '<input type="hidden" name="tipo" id="" value="'.$item->type.'">' ?>
                                    </small>

                                </td>
                                <td>
                                    <?php echo $item->marca; ?>
                                    <?php echo '<input type="hidden" name="marca" id="" value="'.$item->marca.'">' ?>
                                </td>

                                <td class="text-center">
                                    <?php echo $item->quantity; ?>
                                    <?php echo '<input type="hidden" name="cantidad" id="" value="'.$item->quantity.'">' ?>
                                </td>

                                <td class="text-right">
                                    <?php echo number_format($item->price,2).' Bs'; ?>
                                    <?php echo '<input type="hidden" name="preciov" id="" value="'.number_format($item->price,2).'">' ?>
                                </td>
                                <td class="text-right">
                                    <?php echo number_format($item->total,2).' Bs'; ?>
                                    <?php echo '<input type="hidden" name="totalv" id="" value="'.number_format($item->total,2).'">' ?>
                                </td>
                                <td style="background-color: #edf5ff;" class="text-right">
                                    <?php echo number_format($item->price_c,2).' Bs'; ?>
                                    <?php echo '<input type="hidden" name="precioc" id="" value="'.number_format($item->price_c,2).'">' ?>
                                </td>
                                <td style="background-color: #edf5ff;" class="text-right">
                                    <?php echo number_format($item->total_c,2).' Bs'; ?>
                                    <?php echo '<input type="hidden" name="totalc" id="" value="'.number_format($item->total_c,2).'">' ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>  
                        

                        <tr>
                            <td class="text-right" style="text-align: right;" colspan="5">Sub Total</td>
                            <td class="text-right">
                                <?php echo number_format($d->subtotal,2).' Bs'; ?>
                                <?php echo '<input type="hidden" name="stotalv" id="" value="'.number_format($d->subtotal,2).'">' ?>
                            </td>
                            <td style="background-color: #edf5ff;" class="text-right" >Sub Total Compra</td>
                            <td style="background-color: #edf5ff;" class="text-right">
                                <?php echo number_format($d->subtotal_c,2).' Bs'; ?>
                                <?php echo '<input type="hidden" name="stotalc" id="" value="'.number_format($d->subtotal_c,2).'">' ?>
                            </td>
                            
                        </tr>

                            <tr>
                                <td style="text-align: right;background-color: #dffff4;" colspan="6"> <b>TOTAL VENTA</b> <h5 class="text-success"> 
                                <b> <?php echo number_format($d->subtotal,2).' Bs'; ?></b></h5>
                                
                            </td>
                                <td style="background-color: #c6f6ff; text-align: right;" colspan="2"> <b>TOTAL COMPRA</b> <h5 class="text-success"> 
                                <b> <?php echo number_format($d->total_c,2).' Bs'; ?></b></h5>
                                
                            </td>
                            
                            
                           
                        </tr>
                        <tr>
                            
                            <td class="text-right" colspan="6" style="background-color: #f1f1f1;text-align: right;"><i class="bi bi-cash-coin"></i> Impuestos (IVA 3% + IT 3%)</td>
                            <td class="text-right" colspan="2" style="text-align: center;background-color: #f1f1f1;font-weight: 700;"><?php echo number_format($d->taxes,2).' Bs'; ?></td>
                            <?php echo '<input type="hidden" name="impuestos" id="" value="'.number_format($d->taxes,2).'">' ?>

                        </tr>
                        <tr>
                            <td class="text-right" colspan="6" style="background-color: #f2f2f2;text-align: right;" ><i class="bi bi-truck"></i> Envio Transporte e Imprevistos</td>
                            <td class="text-right" colspan="2" style="text-align: center;background-color: #f2f2f2;font-weight: 700;"><?php echo number_format($item->shipping,2).' Bs'; ?></td>
                            <?php echo '<input type="hidden" name="envio" id="" value="'.number_format($d->shipping,2).'">' ?>

                        </tr>
                        <tr >
                            
                            <td class="text-right" colspan="6" style="background-color: #f1f1f1;font-weight: 600;text-align: right;color:#e54242"><i class="bi bi-dash-circle"></i> TOTAL GASTOS </td>
                            <td class="text-right" style="text-align: center;font-weight: 700; color:#e54242;" colspan="2" ><?php echo number_format($d->total_g,2).' Bs'; ?></td>
                            <?php echo '<input type="hidden" name="total_gastos" id="" value="'.number_format($d->total_g,2).'">' ?>

                        </tr>
                        <tr >
                            <td class="text-right " colspan="6" style="background-color: #f2f2f2;font-weight: 600;text-align: right;color:#66b779;"><i class="bi bi-plus-circle"></i> TOTAL GANANCIA </td>
                            <td class="text-right " style="text-align: center;font-weight: 700;color: #66b779;"colspan="2"><?php echo number_format(($d->subtotal) - ($d->total_g),2).' Bs'; ?></td>
                            <?php echo '<input type="hidden" name="total_ingresos" id="" value="'.number_format(($d->subtotal) - ($d->total_g),2).'">' ?>
                        </tr>
                        <tr >
                            <td class="text-right " colspan="6" style="background-color: #f1f1f1;font-weight: 600;text-align: right;color:#66b779;"><i class="bi bi-percent"></i> de GANANCIA </td>
                            <td class="text-right " style="text-align: center;font-weight: 700;color: #66b779;" colspan="2" >
                                <?php 

                                    $GANANCIA = 0;
                                    $GANANCIA = round(($d->subtotal) - ($d->total_g),2);
                                    echo number_format((($GANANCIA) * 100 ) / ($d->subtotal),2).' %'; ?>
                            </td>
                            <?php echo '<input type="hidden" name="porcentaje" id="" value="'.number_format((($GANANCIA) * 100 ) / ($d->subtotal),2).'">' ?>
                        </tr>
 
                        </tbody>

                    </table>

                    </div>

            </form>      

                <?php endif ; ?>
            
            
            