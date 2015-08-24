$(document).on('ready',function(){
	function sumarTotales(){
		// Suma los precios totales
					$("#inputTotal").val("0");
					if (inputstotal > 0) {
						$(".row #inputPrecio").each(function(index, value){
							monto=parseFloat($(this).val()) + parseFloat($("#inputTotal").val());
							$("#inputTotal").val(monto.toFixed(2));
						});
					}
					// ./ Suma los precio finales en Total
	}

	//Welcome Message (not for login page)
	function notify(message, type){
	    $.growl({
	        message: message
	    },{
	        type: type,
	        allow_dismiss: false,
	        label: 'Cancel',
	        className: 'btn-xs btn-inverse',
	        placement: {
	            from: 'top',
	            align: 'right'
	        },
	        delay: 2500,
	        animate: {
	                enter: 'animated bounceIn',
	                exit: 'animated bounceOut'
	        },
	        offset: {
	            x: 20,
	            y: 85
	        }
	    });
	};
	
	if (!$('.login-content')[0]) {
	    notify('Welcome back Mallinda Hollaway', 'inverse');
	} 

	//./ Welcome Message (not for login page)


	//Agrega las clases ACTIVE al Menu
	var enlaceActivo = $(".main-menu li a").hasClass('active');
	var pgurl = window.location.href;
	$(".main-menu li a").each(function(){
		if($(this).attr("href") == pgurl ){
			$(this).parent().parent().parent().addClass("active")
			$(this).addClass("active");
		}
	})
	//./ Agrega las clases ACTIVE al Menu

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
		            	});
		            },
		            isFirstItemUndeletable: true
		        })
	// ./ Repetidor de campos de Productos

	//Command Buttons
	$("#data-table-command").bootgrid({
		caseSensitive: false,
		labels: {
		        search: "Buscar",
		        infos: "Mostrando {{ctx.start}} a {{ctx.end}} de {{ctx.total}} elementos",
		        all: "Todos"
		},
		css: {
			icon: 'md icon',
			iconColumns: 'md-view-module',
			iconDown: 'md-expand-more',
			iconRefresh: 'md-refresh',
			iconUp: 'md-expand-less'
		},
		formatters: {
			"comandos": function(column, row) {
				return "<button type=\"button\" class=\"btn btn-icon command-edit\" data-row-id=\"" + row.ruc + "\"><span class=\"md md-edit\"></span></button> " + 
	            "<button type=\"button\" class=\"btn btn-icon command-delete\" data-row-id=\"" + row.ruc + "\"><span class=\"md md-delete\"></span></button> " + 
	            "<button type=\"button\" class=\"btn btn-icon command-create\" data-row-id=\"" + row.ruc + "\"><span class=\"md md-check\"></span></button>";
	          }
	    }
	});

	//Comandos para Tabla Documentos
	//Command Buttons
	$("#data-table-command-docs").bootgrid({
		caseSensitive: false,
		rowCount: 15,
		labels: {
		        search: "Buscar",
		        infos: "Mostrando {{ctx.start}} a {{ctx.end}} de {{ctx.total}} elementos",
		        all: "Todos"
		},
		css: {
			icon: 'md icon',
			iconColumns: 'md-view-module',
			iconDown: 'md-expand-more',
			iconRefresh: 'md-refresh',
			iconUp: 'md-expand-less'
		},
		formatters: {
			"comandos": function(column, row) {
				return "<a href=\"editar/documento/"+row.id+"\" class=\"btn btn-icon command-edit\" data-toggle=\"modal\" data-target=\"#modalWider\" data-row-id=\"" + row.idunico + "\"><span class=\"md md-edit\"></span></a> " + 
	            "<a class=\"btn btn-icon command-delete"+row.comandos+"\" data-row-id=\"" + row.id + "\"><span class=\"md md-block\"></span></a> " + 
	            "<a class=\"btn btn-icon command-create\" data-row-id=\"" + row.idunico + "\"><span class=\"md md-remove-red-eye\"></span></a> " +
	            "<a href=\"reportes\" class=\"btn btn-icon command-print\" data-row-id=\"" + row.idunico + "\"><span class=\"md md-print\"></span></a> ";
	          }
	    }
	});
	$("#data-table-command-docs tbody").on("click","a.command-delete",function(){
		var btn=$(this);
		$.ajax({
		  url: 'facturar/anular_doc',
		  type: 'POST',
		  async: true,
		  data: 'id=' + $(this).attr("data-row-id")+'&estado=0',
		  success: function(){
		  	//si la clase command-delete existe
		  	//la elimina y agrega la nueva
		  	if (btn.hasClass("command-delete")==true) {
		  		btn.removeClass("command-delete");
		  		btn.addClass("command-delete-active");
		  	};
		  },
		  error: function(){
		  	alert("Hubo un error enviando la petición al servidor, contactar al administrador")
		  }
		});
	});
	$("#data-table-command-docs tbody").on("click","a.command-delete-active",function(){
		var btn=$(this);
		$.ajax({
		  url: 'facturar/anular_doc',
		  type: 'POST',
		  async: true,
		  data: 'id=' + $(this).attr("data-row-id")+'&estado=1',
		  success: function(){
		  	//si la clase command-delete-active existe
		  	//la elimina y agrega la nueva
		  	if (btn.hasClass("command-delete-active")==true) {
		  		btn.removeClass("command-delete-active");
		  		btn.addClass("command-delete");
		  	};
		  },
		  error: function(){
		  	alert("Hubo un error enviando la petición al servidor, contactar al administrador")
		  }
		});
	});

	// ./ Comandos para Tabla Documentos

	// Sumar Precios

		var precio,cantidad,precioUnidad;
		var monto, total, inputstotal=$(".row #inputPrecio").length;//obtiene el numero de campos de precio

		
		sumarTotales();

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
				}

				//alert("Index: "+index+" contiene "+$(this).find("input#inputPrecio").val() );
			});

		});


});//fin document on ready