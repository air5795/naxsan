<?php
/* include 'conexion.php';
include 'invoice.php';

$invoice = new Invoice(); // Crea una instancia de la clase Invoice

if (!empty($_POST['action']) && $_POST['action'] == 'loadItemsList') {	
	$invoice->loadItemsList();
}

if (!empty($_POST['action']) && $_POST['action'] == 'loadItems') {	
	$invoice->loadItems();
}

// Verificar si se ha enviado una solicitud AJAX
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
	// Crear una instancia de la clase Invoice
	$invoice = new Invoice();
  
	// Verificar la acción solicitada
	if (isset($_POST['action'])) {
	  switch ($_POST['action']) {
		case 'loadInvoiceData':
		  // Obtener los registros de la base de datos
		  $invoiceData = $invoice->getInvoiceList();
  
		  // Formatear los datos en el formato requerido por DataTables
		  $data = array();
		  foreach ($invoiceData as $invoiceDetails) {
			$invoiceDate = date("d/M/Y, H:i:s", strtotime($invoiceDetails["fecha_cotizacion"]));
			$printLink = '<a class="btn btn-outline-danger" href="print_invoice.php?invoice_id=' . $invoiceDetails["id_cotizacion"] . '" title="Imprimir Factura"><span <i class="bi bi-printer-fill"></i></a>';
			$editLink = '<a class="btn btn-warning" href="edit_invoice.php?update_id=' . $invoiceDetails["id_cotizacion"] . '"  title="Editar Factura"><i class="bi bi-pencil-square"></i></a>';
			$deleteLink = '<a class="btn btn-danger" href="#" id="' . $invoiceDetails["id_cotizacion"] . '" class="deleteInvoice"  title="Eliminar Factura"><i class="bi bi-trash-fill"></i></a>';
  
			$data[] = array(
			  'id_cotizacion' => $invoiceDetails["id_cotizacion"],
			  'fecha_cotizacion' => $invoiceDate,
			  'cliente_nombre' => $invoiceDetails["cliente_nombre"],
			  'total_despues_impuestos' => $invoiceDetails["total_despues_impuestos"] . ' Bs',
			  'print_link' => $printLink,
			  'edit_link' => $editLink,
			  'delete_link' => $deleteLink
			);
		  }
  
		  // Enviar la respuesta en formato JSON
		  echo json_encode(array('data' => $data));
		  break;
  
		// Agregar más casos según las acciones adicionales que necesites manejar
	  }
	}
  } */



  
  include 'conexion.php';
  include 'invoice.php';
  
  $invoice = new Invoice();
  
  if (!empty($_POST['action']) && $_POST['action'] == 'loadItemsList') {
	  $invoice->loadItemsList();
  }
  
  if (!empty($_POST['action']) && $_POST['action'] == 'loadItems') {
	  $invoice->loadItems();
  }
  
  if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
	  $invoice = new Invoice();
  
	  if (isset($_POST['action'])) {
		  switch ($_POST['action']) {
			  case 'loadInvoiceData':
				  $start = $_POST['start'];
				  $length = $_POST['length'];
				  $searchValue = $_POST['search']['value'];
  
				  $invoiceData = $invoice->getInvoiceList($length, $start, $searchValue);
				  $totalRecords = $invoice->getTotalRecords($searchValue);
  
				  $data = array();
				  foreach ($invoiceData as $invoiceDetails) {
					  $invoiceDate = date("d/M/Y, H:i:s", strtotime($invoiceDetails["fecha_cotizacion"]));
					  $printLink = '<a class="btn btn-sm btn-outline-danger w-100" target="_blank" href="print_invoice.php?invoice_id=' . $invoiceDetails["id_cotizacion"] . '" title="Imprimir Cotizacion" ><span <i class="bi bi-file-earmark-pdf"></i> PDF</a>';
					  $editLink = '<a style="background-color:beige; color:#646464" class="btn btn-sm btn-warning w-100" href="edit_invoice.php?update_id=' . $invoiceDetails["id_cotizacion"] . '"  title="Editar Cotizacion"><i class="bi bi-pencil-square"></i> </a>';
					  $deleteLink = '<a class="btn btn-sm btn-danger w-100 deleteInvoice" href="#" id="' . $invoiceDetails["id_cotizacion"] . '" class="deleteInvoice"  title="Eliminar Cotizacion"><i class="bi bi-trash-fill"></i> </a>';
  
					  $data[] = array(
						  'id_cotizacion' => $invoiceDetails["id_cotizacion"],
						  'fecha_cotizacion' => $invoiceDate,
						  'cliente_nombre' => $invoiceDetails["cliente_nombre"],
						  'nota' => $invoiceDetails["nota"],
						  'total_antes_impuestos' => number_format($invoiceDetails["total_antes_impuestos"], 2, '.', ',') . ' Bs',
						  'id_usuario' => $invoiceDetails["id_usuario"],
						  'print_link' => $printLink,
						  'edit_link' => $editLink,
						  'delete_link' => $deleteLink
					  );
				  }
  
				
					// Ordenar los datos por la columna 'fecha_cotizacion' en orden ascendente
					usort($data, function ($a, $b) {
						$dateA = strtotime($a['fecha_cotizacion']);
						$dateB = strtotime($b['fecha_cotizacion']);
						return $dateA - $dateB;
					});

  
				  $response = array(
					  'draw' => intval($_POST['draw']),
					  'recordsTotal' => intval($totalRecords),
					  'recordsFiltered' => intval($totalRecords),
					  'data' => $data
				  );
  
				  echo json_encode($response);
				  break;
		  }
	  }
  }
  ?>
  
  
  