$(document).on('ready',function(){


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
    	                	elemento.slideUp(deleteElement);
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
	            "<a class=\"btn btn-icon command-delete"+row.comandos+"\" data-row-id=\"" + row.idunico + "\"><span class=\"md md-block\"></span></a> " + 
	            "<a class=\"btn btn-icon command-create\" data-row-id=\"" + row.idunico + "\"><span class=\"md md-remove-red-eye\"></span></a>";
	          }
	    }
	});
	// ./ Comandos para Tabla Documentos

	// Sumar Precios

	var precio,cantidad,precioUnidad;

		$(".producto-container").on("change","#inputPrecioUnidad,#inputCantidad",function(){
			cantidad=$("#inputCantidad").val();
			precioUnidad=$("#inputPrecioUnidad").val();

			if(precioUnidad!=''){
				precio=cantidad*precioUnidad;
				$("#inputPrecio").val(precio);
			}
		});

});//fin document on ready