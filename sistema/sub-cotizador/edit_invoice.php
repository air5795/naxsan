<?php

session_start();
include "../../conexion.php";

include('inc/header.php');
include 'Invoice.php';
$invoice = new Invoice();

if (!empty($_POST['companyName']) && $_POST['companyName'] && !empty($_POST['invoiceId']) && $_POST['invoiceId']) {
	$invoice->updateInvoice($_POST);
	header("Location:index.php");
}
if (!empty($_GET['update_id']) && $_GET['update_id']) {
	$invoiceValues = $invoice->getInvoice($_GET['update_id']);
	$invoiceItems = $invoice->getInvoiceItems($_GET['update_id']);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        
        <link rel="stylesheet" href="css/estilos3.css">
        <link rel="stylesheet" href="css/estilos2.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

        <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css" rel="stylesheet">

        <link rel="shortcut icon" href="img/ICONOGRANDE2.png">
        <title>sis-poncelet</title>
        <script src="js/invoice.js"></script>
        <link href="css/style.css" rel="stylesheet">
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>SIS-PONCELET</title>
        
    </head>
	<body class="sb-nav-fixed">
	<?php include "../menu.php"?>

	<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid ">
                    <div class="container-fluid  ">
                    
                     
                        <br>
                        
<!-- contenido del sistema 2--> 

<!-- Contenedor tabla--> 

<div class="container-fluid  fondo ">    
        <div class="container-fluid fondo">
            <div class="row">
                <div class="col-sm-6">
                    <h5><strong><i class="bi bi-file-earmark-plus"></i>  Editar </strong> Cotizacion de: <strong> <?php echo $invoiceValues['cliente_nombre']; ?></strong></h5>
                        
                    
                </div>

                <div class="col-sm-4">

                </div>

                <div class="col-sm-2">
                        <a class="btn btn-primary" href="index.php"><i class="bi bi-list-check"></i> Lista de Cotizaciones</a>

                </div>
                
<p></p>
                <hr>

<div class="container content-invoice">
	<form action="" id="invoice-form" method="post" class="invoice-form" role="form" novalidate="">
		<div class="load-animate animated fadeInUp">
			<div class="row">
				<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
					<h1 class="title"></h1>
					
				</div>
			</div>
			<input id="currency" type="hidden" value="$">
			

			<div class="row">
				
				<div class="col-md-12 row" >
					<h3><i class="bi bi-person-circle"></i> Clientes</h3>
					<div class="form-group col-md-4">
						<select style="width: 100%;font-size:12px ;" name="nombre" id="nombre" class="form-control  js-example-basic-single "  required onchange="fetchClienteData()" required >
                        <option value="" >Seleccione una opción : </option>
							<?php
								$query = mysqli_query($conexion, "SELECT * from cliente ORDER BY NOMBRE ASC;");
								$result = mysqli_num_rows($query);
								if ($result > 0) {
								while ($data = mysqli_fetch_array($query)) {
									echo '<option value="'.$data['nombre'].'">'.$data['nombre'].'</option>';
									$nombre = $data['nombre'];
								}}
							?>
                        </select>
					</div>
					<div class="form-group col-md-4">
					<input value="<?php echo $invoiceValues['cliente_nombre']; ?>" type="text" class="form-control form-control-sm" name="companyName" id="companyName" placeholder="Quien compra" autocomplete="off">
					</div>
					<br>
					<div class="form-group col-md-4">
						<input value="<?php echo $invoiceValues['cliente_direccion']; ?>" class="form-control form-control-sm" type="text" name="address" id="address" placeholder="Dirección">
					</div>

					<p></p>
		
					<div class="form-group col-md-4">
						<input value="<?php echo $invoiceValues['tiempo_garantia']; ?>" class="form-control form-control-sm" type="text" name="tiempo_garantia" id="tiempo_garantia" placeholder="Tiempo de Garantia">
					</div>
					<div class="form-group col-md-4">
						<input value="<?php echo $invoiceValues['validez_cotizacion']; ?>" class="form-control form-control-sm" type="text" name="validez_cotizacion" id="validez_cotizacion" placeholder="Validez de Cotizacion">
					</div>
					<div class="form-group col-md-4">
						<input value="<?php echo $invoiceValues['tiempo_entrega']; ?>" class="form-control form-control-sm" type="text" name="tiempo_entrega" id="tiempo_entrega" placeholder="Tiempo de Entrega">
					</div>

				</div>
			</div>
			<hr>
			<div class="row">
			<h3><i class="bi bi-box-seam"></i></i> Productos</h3>
				<div class="table-responsive">
					<table class="table table-hover table-striped table-bordered responsive" style="width:100%; text-align:center; " id="invoiceItem">
						<tr>
							<th width="2%"><input id="checkAll" class="formcontrol" type="checkbox"></th>
							<th width="5%">COD </th>
							<th width="30%">Nombre Ítem</th>
							<th width="8%">Marca</th>
							<th width="8%">U/M</th>
							<th width="5%">Cantidad</th>
							<th width="8%" style="background-color: #f2ffde;">Precio Venta</th>
							<th width="8%" style="background-color: #f2ffde;">SubTotal Venta</th>
							<th width="8%" style="background-color: #defff7;">Precio Compra</th>
							<th width="8%" style="background-color: #defff7;">SubTotal Compra</th>
						</tr>
						<?php
						$count = 0;
						foreach ($invoiceItems as $invoiceItem) {
							$count++;
						?>
							<tr>
								<td style="padding: 0;"><input class="itemRow" type="checkbox"></td>
								<td style="padding: 0;"><input type="text" value="<?php echo $invoiceItem["codigo_item"]; ?>" name="productCode[]" id="productCode_<?php echo $count; ?>" class="form-control form-control-sm" autocomplete="off"></td>
								<td style="padding: 0;"><input type="text" value="<?php echo $invoiceItem["nombre_item"]; ?>" name="productName[]" id="productName_<?php echo $count; ?>" class="form-control form-control-sm price" autocomplete="off"></td>

								<td style="padding: 0;"><input type="text" value="<?php echo $invoiceItem["marca_item"]; ?>" name="marca[]" id="marca_<?php echo $count; ?>" class="form-control form-control-sm marca" autocomplete="off"></td>
								<td style="padding: 0;"><input type="text" value="<?php echo $invoiceItem["unidad_item"]; ?>" name="unidad[]" id="unidad_<?php echo $count; ?>" class="form-control form-control-sm unidad" autocomplete="off"></td>

								<td style="padding: 0;"><input type="number" value="<?php echo $invoiceItem["cantidad_item"]; ?>" name="quantity[]" id="quantity_<?php echo $count; ?>" class="form-control form-control-sm quantity" autocomplete="off"></td>
								<td style="padding: 0;"><input type="number" value="<?php echo $invoiceItem["precio_item"]; ?>" name="price[]" id="price_<?php echo $count; ?>" class="form-control form-control-sm price" autocomplete="off"></td>
								<td style="padding: 0;"><input type="number" value="<?php echo $invoiceItem["subtotal_item"]; ?>" name="total[]" id="total_<?php echo $count; ?>" class="form-control form-control-sm total" autocomplete="off"></td>
								<td style="padding: 0;"><input type="number" value="<?php echo $invoiceItem["precio_item_c"]; ?>" name="pricec[]" id="pricec_<?php echo $count; ?>" class="form-control form-control-sm pricec" autocomplete="off"></td>
								<td style="padding: 0;"><input type="number" value="<?php echo $invoiceItem["subtotal_item_c"]; ?>" name="totalc[]" id="totalc_<?php echo $count; ?>" class="form-control form-control-sm totalc" autocomplete="off"></td>
								<input type="hidden" value="<?php echo $invoiceItem['id_items_cotizacion']; ?>" class="form-control" name="itemId[]">
							</tr>
						<?php } ?>
					</table>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
				<button class="btn btn-danger btn-sm delete" id="removeRows" type="button"><i class="bi bi-dash-lg"></i></button>
					<button class="btn btn-success btn-sm" id="addRows" type="button" onclick="addRow()"><i class="bi bi-plus-lg"></i></button>
					<button class="btn btn-success btn-sm" id="addtext" type="button" onclick="addtext()"><i class="bi bi-pencil"></i></button>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<h3>Nota: </h3>
					<div class="form-group">
						<textarea class="form-control txt" rows="5" name="notes" id="notes" placeholder="Nota"><?php echo $invoiceValues['nota']; ?></textarea>
					</div>
					<br>
					<div class="form-group">
						
						<input type="hidden" value="<?php echo $invoiceValues['id_cotizacion']; ?>" class="form-control" name="invoiceId" id="invoiceId">
						<input data-loading-text="Updating Invoice..." type="submit" name="invoice_btn" value="Guardar Cotizacion" class="btn btn-success submit_btn invoice-save-btm">
					</div>

				</div>

				
				<div class="col-md-6 row">


						<div class="col-sm-6">
							<div class="input-group mb-3">
								<span  style="width: 50%;" class="input-group-text" id="basic-addon1">Total Venta (Bs)</span>
								<input style="background-color: #f2ffde;text-align:center;" value="<?php echo $invoiceValues['total_antes_impuestos']; ?>" type="number" class="form-control form-control-sm" name="subTotal" id="subTotal" placeholder="0.00">
							</div>
						</div>

						<div class="col-sm-6">
							<div class="input-group mb-3">
								<span style="width: 50%;" class="input-group-text" id="basic-addon1">Total Compra (Bs)</span>
								<input style="background-color: #defff7; text-align:center;" value="<?php echo $invoiceValues['total_antes_impuestos_c']; ?>" type="number" class="form-control form-control-sm" name="subtotal_c" id="subtotal_c" placeholder="0.00">
							</div>
						</div>

						<div class="col-sm-6">
							<div class="input-group mb-3">
								<span style="width: 50%;" class="input-group-text" id="basic-addon1">% Impuestos</span>
								<input style="text-align:center;" value="<?php echo $invoiceValues['porcentaje']; ?>" type="number" class="form-control form-control-sm" name="taxRate" id="taxRate" placeholder="0.00">
							</div>
						</div>

						<div class="col-sm-6">
							<div class="input-group mb-3">
								<span style="width: 50%;" class="input-group-text" id="basic-addon1">Monto Impuestos</span>
								<input style="text-align:center; width:50%" value="<?php echo $invoiceValues['total_impuestos']; ?>" type="number" class="form-control form-control-sm" name="taxAmount" id="taxAmount" placeholder="0.00">
							</div>
						</div>

						<div class="col-sm-6">
							<div class="input-group mb-3">
								<span style="width: 50%;" class="input-group-text" id="basic-addon1"> 
								<i style="writing-mode: tb;" class="bi bi-truck"></i>  Transporte o Envio </span>
								<input style="text-align:center; width:50%" value="<?php echo $invoiceValues['transporte']; ?>" type="number" class="form-control form-control-sm" name="transporte" id="transporte" placeholder="0.00">
							</div>
						</div>

						<div class="col-sm-6">
							<div class="input-group mb-3">
								<span style="width: 50%;" class="input-group-text" id="basic-addon1"> 
								<i style="writing-mode: tb;" class="bi bi-caret-up-square-fill"></i>  Total Ganancia</span>
								<input style="text-align:center; width:50%;background-color: #d3ffd8" value="<?php echo $invoiceValues['total_ganancia']; ?>" type="number" class="form-control form-control-sm" name="total_ganancia" id="total_ganancia" placeholder="0.00">
							</div>
						</div>

						<div class="col-sm-6">
							<div class="input-group mb-3">
								<span style="width: 50%;" class="input-group-text" id="basic-addon1"> 
								<i style="writing-mode: tb;" class="bi bi-percent"></i> de Ganancia</span>
								<input  style="text-align:center; width:50%;background-color: #d3ffd8;" value="<?php echo $invoiceValues['porcentaje_ganancia']; ?>" type="number" class="form-control form-control-sm" name="porcentaje_ganancia" id="porcentaje_ganancia" placeholder="0.00">
							</div>
						</div>

						<div class="col-sm-6">
							<div class="input-group mb-3">
								<span style="width: 50%;" class="input-group-text" id="basic-addon1"> 
								<i style="writing-mode: tb;" class="bi bi-caret-down-square-fill"></i>  Total Gastos</span>
								<input style="text-align:center; width:50%;background-color: #ffc3c9" value="<?php echo $invoiceValues['total_gastos']; ?>" type="number" class="form-control form-control-sm" name="total_gastos" id="total_gastos" placeholder="0.00">
							</div>
						</div>

						

						
						
						

						

						

					

						

				

						



						
					
						<div class="col-md-4" hidden>
							<label for="">TOTAL nulo</label>
							<input value="<?php echo $invoiceValues['total_despues_impuestos']; ?>" type="hidden" class="form-control form-control-sm" name="totalAftertax" id="totalAftertax" placeholder="Total">
						</div>

						<div class="col-md-4" hidden>
							<label for="">Monto Pagado:</label>
							<input value="<?php echo $invoiceValues['order_amount_paid']; ?>" type="hidden" class="form-control form-control-sm" name="amountPaid" id="amountPaid" placeholder="Monto Pagado">
						</div>

						<div class="col-md-4" hidden>
							<label for="">cambio:</label>
							<input value="<?php echo $invoiceValues['order_total_amount_due']; ?>" type="hidden" class="form-control form-control-sm" name="amountDue" id="amountDue" placeholder="Cambio">
						</div>

					
					
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</form>
</div>
</div>
<?php include('inc/footer.php'); ?>

<script>
  function fetchClienteData() {
    var selectedCliente = document.getElementById("nombre").value;

    // Realizar una solicitud AJAX al servidor
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "get_cliente_data.php?cliente=" + encodeURIComponent(selectedCliente), true);
    xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
        var clienteData = JSON.parse(xhr.responseText);
        if (clienteData) {
          // Rellenar los campos de nombre y nit con los datos del cliente
          document.getElementById("companyName").value = clienteData.nombre;
          document.getElementById("address").value = clienteData.nit;
        } else {
          // Limpiar los campos si no se encuentra ningún dato para el cliente seleccionado
          document.getElementById("companyName").value = "";
          document.getElementById("address").value = "";
        }
      }
    };
    xhr.send();
  }
</script>