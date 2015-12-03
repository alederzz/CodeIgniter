$(document).on("ready", function(){

	function sumarTotales(){
		// Suma los precios totales
		$("#valorSumado").val("0");
		var primerprecio=$("#inputPrecio").val();//obtiene el valor del primer campo de precio
		if (inputstotal > 0 && primerprecio!='') {
			$(".row #inputPrecio").each(function(index, value){
				monto=parseFloat($(this).val()) + parseFloat($("#valorSumado").val());
				$("#valorSumado").val(monto.toFixed(2));
			});
		}
		// ./ Suma los precio finales en Total
	}

	function crearIgv(){
		//se obtiene en valor de todos los campos sumados
		var valorSumado = $('#valorSumado').val();
		//definimos la variable subtotal y total
		var subtotal,igv,total;

		if($("#incluyeIGV").prop("checked")){
			subtotal = valorSumado/1.18;
			igv = parseFloat(valorSumado) - parseFloat(subtotal);
			$('#inputSubtotal').val(subtotal.toFixed(2));
			$('#inputIgv').val(igv.toFixed(2));
			$('#inputTotal').val(valorSumado);
		}else{
			igv = parseFloat(valorSumado) * 0.18;
			total = parseFloat(valorSumado) + parseFloat(igv);
			$('#inputSubtotal').val(valorSumado);
			$('#inputIgv').val(igv.toFixed(2));
			$('#inputTotal').val(total.toFixed(2));
		}
	}


	//  Autocompletar campos

	//Campo de Cliente
	$("#inputCliente").devbridgeAutocomplete({
		showNoSuggestionNotice: true,
		serviceUrl: '/CodeIgniter/clientes/leer_clientes',
		noSuggestionNotice: 'No se encontraron datos',
		onSelect: function (suggestion) {
			$('#inputIdCliente').val(suggestion.data)
			$('#inputRuc').val(suggestion.nro_documento);
			$('#inputDireccion').val(suggestion.direccion)
		}
	});

	//./ Autocompletar campos

	// Repetidor de campos de Productos
		$('.repeater').repeater({
            hide: function (deleteElement) {
            	var elemento=$(this);
            	swal({   
                    title: "Estas Seguro?",   
                    text: "Se borrará toda la fila!",   
                    type: "warning",   
                    showCancelButton: true,   
                    confirmButtonColor: "#DD6B55",   
                    confirmButtonText: "Si, bórralo!",
                    cancelButtonText: 'Cancelar',   
                    closeOnConfirm: false
            	}, function(){   
                    swal("Producto Borrado!", "Se ha eliminado el Producto.", "success"); 
                	elemento.remove();
                	sumarTotales();
                	crearIgv();
            	});
            },
            isFirstItemUndeletable: true
        });
	// ./ Repetidor de campos de Productos

	// Sumar Precios

	var precio,cantidad,precioUnidad;
	var monto, inputstotal=$(".row #inputPrecio").length;//obtiene el numero de campos de precio
		
	//sí, cambia los valores de Cantidad y Precio
	$(".producto-container").on("load keyup","#inputPrecioUnidad,#inputCantidad",function(){

		$("div[data-repeater-item]").each(function(index,valor){
			
			cantidad=$(this).find("#inputCantidad").val();
			precioUnidad=$(this).find("#inputPrecioUnidad").val();

			// Introduce el costo total del producto
			if(precioUnidad!=''){

				precio=cantidad*precioUnidad;
				$(this).find("#inputPrecio").val(precio.toFixed(2));
				// calcular_total();

				sumarTotales();
				crearIgv();
			}

		});

	});
	
	sumarTotales();
	crearIgv();

	//incluir IGV
	$("#incluyeIGV").on("click",function(){
		sumarTotales();
		crearIgv();
	});

	//Comprobar campos antes de guardar
	$("#enviarDatos,#actualizarDatos").click(function(e){
	    var camposVacios=0;
	    $('#content input:not([type="hidden"]):not([type="checkbox"]):not([class="checkbox"])').each(function(index,value){
	    	// Si los campos son diferentes de vacios
	    	// y diferentes de 0 y si tiene la clase "has-error"
	    	// le qita el marco rojo de error
	        if($(this).val()!="" && $(this).val() != "0" && $(this).parents(".form-group").hasClass("has-error")){
	            $(this).parents(".form-group").removeClass("has-error");//elimina la clase "has-error"
	        }else{// de lo contrario
	        	// Si los campos estan vacios
	        	// y sin son iguales a 0 se añade la clase has error
	            if($(this).val() === "" || $(this).val() == "0"){
	            	//agregar la clase has error al contenedor
	                $(this).parents(".form-group").addClass("has-error");
	                camposVacios++
	            }
	        }
	    });
		//Si hay campos vacios emite alerta
	    if(camposVacios>0){
	    	notify("Debes llenar todos los campos", "danger", 2500)// ./ Si hay campos vacios emite alert
	    }else if($(this).attr("id")=="enviarDatos"){
			// comprueba el correlativo
	    	var serie=$("#inputSerie").val();
	    	var correlativo=$("#inputCorrelativo").val();
    	    var datos = {
    	        "serie" : serie,
    	        "correlativo" : correlativo
    	    };

    	    $.ajax({
    	        data:  datos,
    	        url:   '../ajax/comprobar_correlativo',
    	        method:  'POST',
    	        success:  function (response) {
    	        		if(response === "true"){
    	        			$("#inputCorrelativo").val(" ");
    	        			$("#enviarDatos").attr("status","false")//agrega un atributo a el boton enviar
    	        			notify('Ya se registro este número de factura', 'danger');
    	        		}else if(response === "false"){
    	        			$("#formDocument").submit();
    	        		}
    	        }
    	    });
		    // ./ comprueba el correlativo
		    
	    }else if($(this).attr("id")=="actualizarDatos"){
	    	$("#formDocument").submit();
	    }
		
	});
	//./ Comprobar campos antes de guardar
});