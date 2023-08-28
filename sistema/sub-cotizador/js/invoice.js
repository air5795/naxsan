/*  $(document).ready(function(){
	$(document).on('click', '#checkAll', function() {          	
		$(".itemRow").prop("checked", this.checked);
	});	
	$(document).on('click', '.itemRow', function() {  	
		if ($('.itemRow:checked').length == $('.itemRow').length) {
			$('#checkAll').prop('checked', true);
		} else {
			$('#checkAll').prop('checked', false);
		}
	});  
	var count = $(".itemRow").length;
	$(document).on('click', '#addRows', function() { 
		count++;
		var htmlRows = '';
		htmlRows += '<tr>';
		htmlRows += '<td><input class="itemRow" type="checkbox"></td>';          
		htmlRows += '<td><input type="text" name="productCode[]" id="productCode_'+count+'" class="form-control" autocomplete="off"></td>';
		
		htmlRows += '<td><input type="text" name="productName[]" id="productName_'+count+'" class="form-control" autocomplete="off"></td>';	

		htmlRows += '<td><input type="number" name="quantity[]" id="quantity_'+count+'" class="form-control quantity" autocomplete="off"></td>';   		
		htmlRows += '<td><input type="number" name="price[]" id="price_'+count+'" class="form-control price" autocomplete="off"></td>';		 
		htmlRows += '<td><input type="number" name="total[]" id="total_'+count+'" class="form-control total" autocomplete="off"></td>';          
		htmlRows += '</tr>';
		$('#invoiceItem').append(htmlRows);
	}); 

	function loadItems(id) {	
		$.ajax({
			url:"invoice_action.php",
			method:"POST",
			data:{action:'loadItemsList'},
			success:function(data) {
				$('#items_'+id).html(data);
			}
		});
	}
	
	$(document).on('click', '#removeRows', function(){
		$(".itemRow:checked").each(function() {
			$(this).closest('tr').remove();
		});
		$('#checkAll').prop('checked', false);
		calculateTotal();
	});		
	$(document).on('blur', "[id^=quantity_]", function(){
		calculateTotal();
	});	
	$(document).on('blur', "[id^=price_]", function(){
		calculateTotal();
	});	
	$(document).on('blur', "#taxRate", function(){		
		calculateTotal();
	});	
	$(document).on('blur', "#amountPaid", function(){
		var amountPaid = $(this).val();
		var totalAftertax = $('#totalAftertax').val();	
		if(amountPaid && totalAftertax) {
			totalAftertax = totalAftertax-amountPaid;			
			$('#amountDue').val(totalAftertax);
		} else {
			$('#amountDue').val(totalAftertax);
		}	
	});	
	$(document).on('click', '.deleteInvoice', function(){
		var id = $(this).attr("id");
		if(confirm("¿Deseas eliminar este registro?")){
			$.ajax({
				url:"action.php",
				method:"POST",
				dataType: "json",
				data:{id:id, action:'delete_invoice'},				
				success:function(response) {
					if(response.status == 1) {
						$('#'+id).closest("tr").remove();
					}
				}
			});
		} else {
			return false;
		}
	});
});	
function calculateTotal(){
	var totalAmount = 0; 
	$("[id^='price_']").each(function() {
		var id = $(this).attr('id');
		id = id.replace("price_",'');
		var price = $('#price_'+id).val();
		var quantity  = $('#quantity_'+id).val();
		if(!quantity) {
			quantity = 1;
		}
		var total = price*quantity;
		$('#total_'+id).val(parseFloat(total));
		totalAmount += total;			
	});
	$('#subTotal').val(parseFloat(totalAmount));	
	var taxRate = $("#taxRate").val();
	var subTotal = $('#subTotal').val();	
	if(subTotal) {
		var taxAmount = subTotal*taxRate/100;
		$('#taxAmount').val(taxAmount);
		subTotal = parseFloat(subTotal)+parseFloat(taxAmount);
		$('#totalAftertax').val(subTotal);		
		var amountPaid = $('#amountPaid').val();
		var totalAftertax = $('#totalAftertax').val();	
		if(amountPaid && totalAftertax) {
			totalAftertax = totalAftertax-amountPaid;			
			$('#amountDue').val(totalAftertax);
		} else {		
			$('#amountDue').val(subTotal);
		}
	}
}

  */

$(document).ready(function() {
	$(document).on('click', '#checkAll', function() {
	  $(".itemRow").prop("checked", this.checked);
	});
  
	$(document).on('click', '.itemRow', function() {
	  if ($('.itemRow:checked').length == $('.itemRow').length) {
		$('#checkAll').prop('checked', true);
	  } else {
		$('#checkAll').prop('checked', false);
	  }
	});
  
	var count = $(".itemRow").length;
  
	$(document).on('click', '#addRows', function() {
		count++;
		var htmlRows = '';
		htmlRows += '<tr>';
		htmlRows += '<td style="padding: 0;"><input class="itemRow" type="checkbox"></td>';
		htmlRows += '<td style="padding: 0;"><input type="text" name="productCode[]" id="productCode_' + count + '" class="form-control form-control-sm" autocomplete="off"></td>';
		
		htmlRows += '<td style="padding: 0;"><select name="productName[]" id="productName_' + count + '" class="form-control form-control-sm productSelect" onchange="getProductPrice(' + count + ')"><option value="">Seleccione un producto</option></select></td>';
		htmlRows += '<td style="padding: 0;"><input type="text" name="marca[]" id="marca_' + count + '" class="form-control form-control-sm marca" autocomplete="off"></td>';
		htmlRows += '<td style="padding: 0;"><input type="text" name="unidad[]" id="unidad_' + count + '" class="form-control form-control-sm unidad" autocomplete="off"></td>';
		htmlRows += '<td style="padding: 0;"><input type="number" name="quantity[]" id="quantity_' + count + '" class="form-control form-control-sm quantity" autocomplete="off"></td>';
		htmlRows += '<td style="padding: 0;"><input type="number" name="price[]" id="price_' + count + '" class="form-control form-control-sm price" autocomplete="off"></td>';
		htmlRows += '<td style="padding: 0;"><input type="number" name="total[]" id="total_' + count + '" class="form-control form-control-sm total" autocomplete="off"></td>';
		htmlRows += '<td style="padding: 0;"><input type="number" name="pricec[]" id="pricec_' + count + '" class="form-control form-control-sm pricec" autocomplete="off"></td>';
		htmlRows += '<td style="padding: 0;"><input type="number" name="totalc[]" id="totalc_' + count + '" class="form-control form-control-sm totalc" autocomplete="off"></td>';
		htmlRows += '</tr>';
		$('#invoiceItem').append(htmlRows);
		
		// Cargar la lista de productos en el select recién creado
		loadItems(count);
	  });

	  $(document).on('click', '#addtext', function() {
		count++;
		var htmlRows = '';
		htmlRows += '<tr>';
		htmlRows += '<td style="padding: 0;"><input class="itemRow" type="checkbox"></td>';
		htmlRows += '<td style="padding: 0;"><input type="text" name="productCode[]" id="productCode_' + count + '" class="form-control form-control-sm" autocomplete="off"></td>';
		
		//htmlRows += '<td><select name="productName[]" id="productName_' + count + '" class="form-control productSelect" onchange="getProductPrice(' + count + ')"><option value="">Seleccione un producto</option></select></td>';
		htmlRows += '<td style="padding: 0;"><input type="text" name="productName[]" id="productName_' + count + '" class="form-control form-control-sm" autocomplete="off"></td>';
		htmlRows += '<td style="padding: 0;"><input type="text" name="marca[]" id="marca_' + count + '" class="form-control form-control-sm marca" autocomplete="off"></td>';
		htmlRows += '<td style="padding: 0;"><input type="text" name="unidad[]" id="unidad_' + count + '" class="form-control form-control-sm unidad" autocomplete="off"></td>';

		htmlRows += '<td style="padding: 0;"><input type="number" name="quantity[]" id="quantity_' + count + '" class="form-control form-control-sm quantity" autocomplete="off"></td>';
		htmlRows += '<td style="padding: 0;"><input type="number" name="price[]" id="price_' + count + '" class="form-control form-control-sm price" autocomplete="off"></td>';
		htmlRows += '<td style="padding: 0;"><input type="number" name="total[]" id="total_' + count + '" class="form-control form-control-sm total" autocomplete="off"></td>';
		htmlRows += '<td style="padding: 0;"><input type="number" name="pricec[]" id="pricec_' + count + '" class="form-control form-control-sm pricec" autocomplete="off"></td>';
		htmlRows += '<td style="padding: 0;"><input type="number" name="totalc[]" id="totalc_' + count + '" class="form-control form-control-sm totalc" autocomplete="off"></td>';
		htmlRows += '</tr>';
		$('#invoiceItem').append(htmlRows);
		
		
	  });


	  
	  function loadItems(id) {
		$.ajax({
			url: "invoice_action.php",
			method: "POST",
			data: { action: 'loadItemsList' },
			success: function(data) {
				$('#productName_' + id).html(data);
	
				// Aplicar Select2 al select de productos
				$('#productName_' + id).select2({
					placeholder: "Seleccione un producto",
					allowClear: true
				});
	
				// Obtener el precio del producto seleccionado
				var selectedOption = $('#productName_' + id + ' option:selected');
				var priceInput = $('#price_' + id);
				if (selectedOption.val() !== "") {
					var productDescription = selectedOption.val(); // Obtener la descripción del producto
					$.ajax({
						url: "invoice_action.php",
						method: "POST",
						data: { action: 'loadItems', p_descripcion: productDescription }, // Enviar la descripción del producto
						dataType: 'json',
						success: function(response) {
							if (response.p_precioc) {
								priceInput.val(response.p_precioc);
							} else {
								priceInput.val("");
							}
						}
					});
				} else {
					priceInput.val("");
				}
			}
		});
	
	  
// Actualizar el precio cuando se seleccione otro producto
$(document).on('change', '#productName_' + id, function() {
	var selectedOption = $(this).find('option:selected');
	var priceInput = $('#price_' + id);
	var pricecInput = $('#pricec_' + id);
	var marcaInput = $('#marca_' + id);
	var unidadInput = $('#unidad_' + id);
	var idInput = $('#productCode_' + id);

	if (selectedOption.val() !== "") {
	  var productDescription = selectedOption.val();
	  $.ajax({
		url: "invoice_action.php",
		method: "POST",
		data: { action: 'loadItems', p_descripcion: productDescription }, // Cambio aquí: enviar p_descripcion en lugar de id_producto
		dataType: 'json',
		success: function(response) {
		  if (response.p_preciov) {
			priceInput.val(response.p_preciov);
		  } else {
			priceInput.val("");
		  }

		  if (response.p_precioc) {
			pricecInput.val(response.p_precioc);
		  } else {
			pricecInput.val("");
		  }

		  if (response.p_marca) {
			marcaInput.val(response.p_marca);
		  } else {
			marcaInput.val("");
		  }

		  if (response.p_unidad) {
			unidadInput.val(response.p_unidad);
		  } else {
			unidadInput.val("");
		  }

		  if (response.id_producto) {
			idInput.val(response.id_producto);
		  } else {
			idInput.val("");
		  }

		  
		}
	  });
	} else {
			  priceInput.val("");
			  pricecInput.val("");
	  marcaInput.val("");
	  unidadInput.val("");
	  idInput.val("");

	}
  });
  
	  }
	  
	  
	  
  
	$(document).on('click', '#removeRows', function() {
	  $(".itemRow:checked").each(function() {
		$(this).closest('tr').remove();
	  });
	  $('#checkAll').prop('checked', false);
	  calculateTotal();
	});
  
	$(document).on('blur', "[id^=quantity_]", function() {
	  calculateTotal();
	});
  
	$(document).on('blur', "[id^=price_]", function() {
	  calculateTotal();
	});

	$(document).on('blur', "[id^=pricec_]", function() {
		calculateTotal();
	  });

  
	$(document).on('blur', "#taxRate", function() {
	  calculateTotal();
	});

	$(document).on('blur', "#transporte", function() {
		calculateTotal();
	  });

	  
  
	$(document).on('blur', "#amountPaid", function() {
	  var amountPaid = $(this).val();
	  var totalAftertax = $('#totalAftertax').val();
	  if (amountPaid && totalAftertax) {
		totalAftertax = totalAftertax - amountPaid;
		$('#amountDue').val(totalAftertax);
	  } else {
		$('#amountDue').val(totalAftertax);
	  }
	});
  
	$(document).on('click', '.deleteInvoice', function() {
	  var id = $(this).attr("id");
	  if (confirm("¿Deseas eliminar este registro?")) {
		$.ajax({
		  url: "action.php",
		  method: "POST",
		  dataType: "json",
		  data: { id: id, action: 'delete_invoice' },
		  success: function(response) {
			if (response.status == 1) {
			  $('#' + id).closest("tr").remove();
			}
		  }
		});
	  } else {
		return false;
	  }
	});
  });
  
function calculateTotal() {
  // Variable para almacenar la suma total de los elementos calculados
  var totalAmount = 0;
  var totalAmount2 = 0;

  // Seleccionar todos los elementos cuyo atributo 'id' comienza con 'price_'
  $("[id^='price_']").each(function() {
    // Obtener el 'id' del elemento actual y eliminar 'price_' para obtener el número de identificación único
    var id = $(this).attr('id');
    id = id.replace("price_", '');

    // Obtener el precio y la cantidad de los elementos correspondientes
    var price = $('#price_' + id).val();
    var quantity = $('#quantity_' + id).val();

    // Si no se proporciona una cantidad, se establece en 1 por defecto
    if (!quantity) {
      quantity = 1;
    }

    // Calcular el total multiplicando el precio por la cantidad
    var total = price * quantity;

    // Establecer el valor del campo 'total_{id}' con el total calculado
    $('#total_' + id).val(parseFloat(total));

    // Agregar el total calculado al 'totalAmount' para obtener la suma total
    totalAmount += total;
  });

  // Seleccionar todos los elementos cuyo atributo 'id' comienza con 'pricec_'
  $("[id^='pricec_']").each(function() {
    // Obtener el 'id' del elemento actual y eliminar 'price_' para obtener el número de identificación único
    var id = $(this).attr('id');
    id = id.replace("pricec_", '');

    // Obtener el precio y la cantidad de los elementos correspondientes
    var pricec = $('#pricec_' + id).val();
    var quantity = $('#quantity_' + id).val();

    // Si no se proporciona una cantidad, se establece en 1 por defecto
    if (!quantity) {
      quantity = 1;
    }

    // Calcular el total multiplicando el precio por la cantidad
    var totalc = pricec * quantity;

    // Establecer el valor del campo 'total_{id}' con el total calculado
    $('#totalc_' + id).val(parseFloat(totalc));

    // Agregar el total calculado al 'totalAmount' para obtener la suma total
    totalAmount2 += totalc;
	
  });


  // Establecer el valor del campo 'subTotal' con la suma total calculada
  $('#subTotal').val(parseFloat(totalAmount));
  $('#subtotal_c').val(parseFloat(totalAmount2));

  // Obtener la tasa de impuesto
  var taxRate = $("#taxRate").val();

  // Obtener nuevamente el valor de 'subTotal'
  var subTotal = $('#subTotal').val();
  var subTotalc = $('#subtotal_c').val();

  // Calcular el monto de impuesto y el total después de impuestos
  if (subTotal) {
    // Calcular el monto de impuesto multiplicando 'subTotal' por 'taxRate' y dividiendo entre 100
    var taxAmount = subTotal * taxRate / 100;
    
    // Establecer el valor del campo 'taxAmount' con el monto de impuesto calculado
    $('#taxAmount').val(taxAmount);
	
    // Sumar 'subTotal' y 'taxAmount' para obtener el total después de impuestos + transporte
    subTotal = parseFloat(subTotal) + parseFloat(taxAmount);
    $('#totalAftertax').val(subTotal);

	


	// Obtener el valor del campo de transporte
    var transporte = $('#transporte').val();
    
    if (transporte) {
      // Sumar el valor del transporte al total
      subTotal = parseFloat(subTotal) + parseFloat(transporte);
      $('#totalAftertax').val(subTotal);

	  // calcular total gastos
	  subTotalc = parseFloat(subTotalc) + parseFloat(transporte) + parseFloat(taxAmount);
	  $('#total_gastos').val(subTotalc);


		// calcular total ganacias
	    ganancia = parseFloat(totalAmount) - subTotalc;
		ganancia = ganancia.toFixed(2);
		$('#total_ganancia').val(ganancia);

		// calcular porcentaje de ganancia

		var porcentaje_ganancia = (parseFloat(totalAmount) - subTotalc) * 100 / parseFloat(totalAmount);
		porcentaje_ganancia = porcentaje_ganancia.toFixed(2);
		$('#porcentaje_ganancia').val(porcentaje_ganancia);


    }

	

    // Obtener los valores de 'amountPaid' y 'totalAftertax'
    var amountPaid = $('#amountPaid').val();
    var totalAftertax = $('#totalAftertax').val();

    // Calcular el monto adeudado
    if (amountPaid && totalAftertax) {
      // Restar 'amountPaid' de 'totalAftertax' para obtener el monto adeudado
      totalAftertax = totalAftertax - amountPaid;
      $('#amountDue').val(totalAftertax);
    } else {
      // Si no se proporcionan los valores, establecer 'amountDue' como 'subTotal'
      $('#amountDue').val(subTotal);
    }
  }
}

  
  function getProductPrice(rowId) {
	var select = $('#productName_' + rowId);
	var selectedOption = select.find('option:selected');
	var priceInput = $('#price_' + rowId);
  
	if (selectedOption.val() !== "") {
	  var price = selectedOption.attr("data-price");
	  priceInput.val(price);
	} else {
	  priceInput.val("");
	}
  }
  